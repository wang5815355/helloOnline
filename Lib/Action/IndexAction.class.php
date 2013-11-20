<?php
class IndexAction extends GlobalAction {
    
	/**
	 * 首页显示方法
	 * @author wangkai
	 */
	public function index(){
    	//如果cookie中存在邮件账号则直接显示首页
    	if(cookie('username')!=null){
    		//查询当前用户的账号验证状态
    		$userModel = M('user');//用户表
    		$map['email'] = cookie('username');
    		$listRow = $userModel->where($map)->find();
    		$faceimage = $listRow['faceimage'];
    		$auth = $listRow['auth'];
    		
    		if($auth == '1' || $auth == '0'){ //0:邮箱未认证首次登陆 1：已邮箱认证，且首次登陆
    			//当首次登录时 才显示slide1
    			$this->assign('slide1','slide1');
    		}else{//非首次登陆
    			$friendModel = M('friend');
    			$friendList = $friendModel->where($map)->getField('femail',true);//查询用户的所有好友
    			//根据用户的好友email查询这些好友的具体信息
    			$map['email'] = array('in',$friendList);
    			$friendMsgList = $userModel->where($map)->select();
    			$this->assign('friendMsgList',$friendMsgList);
    			
	    		//查询前面7条圈子记录
    			$circleModle = M('group');//圈子表
    			$grModel = M('grouprelationship');//圈子关系表
    			//获取当前用户登录email账号 
    			$uEmail = $this->getUserName();
	    		$circleList = $circleModle->order('id desc')->limit(7)->select();
	    		//查询当前圈子是否已经加入
	    		foreach($circleList as $k=>$v){
	    			$circleId = $circleList[$k]['id'];
	    			$mapGr['circleid'] = $circleId;
	    			$mapGr['uemail'] = $uEmail;
	    			$resultGr = $grModel->where($mapGr)->find();
		    		
	    			$circleList[$k]['time'] = substr(date('Y年m月d日 ',time()),2);
	    			
	    			
		    		if($circleList[$k]['password'] != null){//将存在密码的圈子密码隐藏为000
	    				$circleList[$k]['password'] = '000';
	    			}
	    			
	    			if($resultGr != null){
	    				$circleList[$k]['isJo'] = 1;//是否已加入圈子标记 1代表已加入 0代表未加入
	    			}else{
	    				$circleList[$k]['isJo'] = 0;//是否已加入圈子标记0
	    			}
	    		}
	    		$this->assign('circlelist',$circleList); // 输出模板
    		}
    		$this->display();
    	}else{//如果cookie中不存在用户账号则跳转到登录页面上
    		$this->redirect('Public/login');
    		$this->display();
    	}
    }
    
    public function requestMyInfo(){
    	if(cookie('username')!=null){
    		$data = $this->getUinfo();
    		$this->ajaxReturn($data,'JSON');
    	}
    }
    
    /**
     * 退出系统
     * @author wangkai
     */
    public function loginout(){
    	cookie('username',null);//清空cookie
    	$this->redirect('Public/login');//跳转到登陆页面
    }
    
    /**
     * 用户资料修改
     * @author wangkai
     */
    public function alterUserMsg(){
    	$uemail = $this->getUserName();//当前登录用户email
    	$uinfo = $this->getUinfo();
    	$phonenumber = $_POST['phonenumber'];//手机号
    	$matchPhone = '/^1[3458]\d{9}$/';//手机号验证正则表达式
    	$matchArea = '0086'; //区号验证正则表达式(目前必须为中国0086) 暂时直接插入数据库不验证
    	
    	if(preg_match($matchPhone,$phonenumber)){
    		if($uinfo['phonenumber'].'' != $matchArea.$phonenumber.''){
    			$userModel = M('user');
    			$userRModel = M('userrelationship');
    			$grModel = M('grouprelationship');
    			$userModel->startTrans();
    			
    			$data['phonenumber'] = $matchArea.$phonenumber;
    			$data2['phonenumber'] = $matchArea.$phonenumber;
    			$map['email'] = $uemail;
    			$map2['uemail'] = $uemail;
    			$map3['uemail1|uemail2'] = $uemail;
    			
    			$result = $userModel->where($map)->save($data);
    			$result2 = $grModel->where($map2)->save($data2);
    			
    			$resultEmail = $userRModel->where($map3)->find();
    			if($resultEmail['uemail1'] == $uemail){
    				$data3['uphonenumber1'] = $matchArea.$phonenumber;
    				$result3 = $userRModel->where($map3)-save($data3);
    			}
    			if($resultEmail['uemail2'] == $uemail){
    				$data3['uphonenumber2'] = $matchArea.$phonenumber;
    				$result3 = $userRModel->where($map3)-save($data3);
    			}
    			
    			//查询好友关系表中自己的手机号
//     			$result3 = $userModel->where($map)->save($data);
    			 
    			if($result != false){
    				$dataInfo['info'] = '手机号修改成功';
    				$userModel->commit();
    			}else{
    				$userModel->rollback();
    				$dataInfo['info'] = $uinfo['phonenumber'].'手机号未被修改';
    			}
    		}else{
    			$dataInfo['info'] = '该手机号与已存在的手机号相同';
    		}
    	}else{
    		$dataInfo['info'] = '请输入正确的11位手机号';
    	}
    	
    	$this->ajaxReturn($dataInfo,'JSON');
    }
    
    /**
     * 首页查询全部好友
     * @author wangkai
     */
    public function queryMyFriend(){
    	$urModel = M('userrelationship');
    	$uemail = $this->getUserName();//当前登录用户账号
    	$uinfo = $this->getUinfo();//获取当前登录用户信息
    	$uphone = $uinfo['phonenumber']; //当前登录用户手机号 
    	$uname = $uinfo['uname'];//当前登录用户姓名
    	$pagenum = $_POST['pagenum'];//当前页数
    	
    	if($_POST['condition'] != null){//好友查询条件赋值
    		$condition = trim($_POST['condition']);
    	}
    	
    	$pagecount = 7;//每页记录数
    	$matchCircleid = '/^[0-9]{1,50}$/';//ID号只能为1至50位纯数字
		
    	if(preg_match($matchCircleid,$pagenum)){
    		
	    	//查询好友关系表查看当前登录用户所有好友
	    	$map['uemail1|uemail2'] = $uemail;
	    	$urList = $urModel->where($map)->select();
	    	
	    	if($pagenum>1){
	    		$pageFirst = ($pagenum - 1) * $pagecount ;//当前页其实记录id
	    	}else{
	    		$pageFirst = 0;
	    	}
	    	
	    	if($_POST['condition'] != null){//好友查询条件赋值
	    		//如果当前登录用户的手机号和姓名中有匹配查询条件的情况 则需要两个用户同时匹配条件
	    		if(stripos($uname,$condition) !== false && stripos($uphone,$condition) === false){
	    			$map['_string'] = "(uname1 like '%".$condition."%' and uname2 like '%".$condition."%') or (uphonenumber1 like '%".$condition."%' or uphonenumber2 like '%".$condition."%')";
	    		}else if(stripos($uname,$condition) === false && stripos($uphone,$condition) !== false){
	    			$map['_string'] = "(uphonenumber1 like '%".$condition."%' and uphonenumber2 like '%".$condition."%') or (uname1 like '%".$condition."%' or uname1 like '%".$condition."%')";
	    		}else if(stripos($uname,$condition) !== false && stripos($uphone,$condition) !== false){
	    			$map['_string'] = "(uphonenumber1 like '%".$condition."%' and uphonenumber2 like '%".$condition."%') or (uname1 like '%".$condition."%' and uname1 like '%".$condition."%')";
	    		}else if(stripos($uname,$condition) === false && stripos($uphone,$condition) === false){
	    			$map['uname1|uname2|uphonenumber1|uphonenumber2'] = array("like","%".$condition."%");
	    		}
	    	}
	    	
	    	$count = $urModel->where($map)->count();// 查询满足要求的总记录数
	    	$urList = $urModel->limit($pageFirst,$pagecount)->where($map)->select();
	    	$pagenumCount = ceil($count/$pagecount);//总页数
	    		
	    	if($pagenum < $pagenumCount){//若当前页数比总页数小 则显示下一页按钮
	    		$dataInfo['pagenext'] = '1';
	    	}else{
	    		$dataInfo['pagenext'] = '-1';
	    	}
	    		
	    	if($pagenum > 1){//若当前页面大于1 则显示上一页按钮
	    		$dataInfo['pageold'] = '1';
	    	}else{
	    		$dataInfo['pageold'] = '-1';
	    	}
	    		
	    	if($pagenumCount <= 1){//若总页数小于2页则不显示翻页组件
	    		$dataInfo['pageif'] = '-1';
	    	}else{
	    		$dataInfo['pageif'] = '1';
	    	}
	    	$dataInfo['pagenumCount'] = $pagenumCount;//总页数
	    	
	    	if($urList != null){
	    		foreach($urList as $k=>$v){
	    			if($urList[$k]['uemail1'] = $uemail){
	    				$urList[$k]['uemail1'] = $urList[$k]['uemail2'];
	    				$urList[$k]['uname1'] = $urList[$k]['uname2'];
	    				$urList[$k]['uphonenumber1'] = $urList[$k]['uphonenumber2'];
	    				$urList[$k]['uphonenumber1'] = substr($urList[$k]['uphonenumber1'],4,11);
	    				$urList[$k]['faceimage1'] = $urList[$k]['faceimage2'];
	    			}
	    		}
	    		$dataInfo['info'] = $urList;
	    	}
    	}	
    	
    	$this->ajaxReturn($dataInfo,'JSON');
    }
    
    /**
     * 用户消息提示中心每隔5到10秒实时更新（好友申请信息等信息数量）
     * @author wangkai
     */
    public function getNewMsgNum(){
    	$uemail = $this->getUserName();//获取当前登录用户的email账号 
    	//查询是否有新的好友申请信息并且统计新信息数目
    	$faModel = M('friendapply');
    	$mapFa['uemail1'] = $uemail;//被申请人为当前登录用户自己的信息
    	$mapFa['msgreadstatus'] = '0';//还未被阅读过的信息
    	$resultFaNum = $faModel->where($mapFa)->count();
    	if($resultFaNum != null){
    		$dataInFo['info'] = $resultFaNum;//新申请数目
    	}
    	$this->ajaxReturn($dataInFo,'JSON');
    }
    
    /**
     * 更新好友申请信息表 将所有信息查看状态为0的信息改为1（已查看）并且查询新好友信息
     * @author wangkai
     */
    public function upAppMsgStatus(){
    	$uemail = $this->getUserName();//获取当前登录用户的email账号
    	$msgreadstatus = $_POST['status'];
    	$faModel = M('friendapply');
    	
    	if($msgreadstatus == '1'){
    		$dataFa['msgreadstatus'] = '1';
    		$mapFa['uemail1'] = $uemail;
    		$mapFa['msgreadstatus'] = '0';
    		$faModel->where($mapFa)->save($dataFa);
    	}
    	
    	//查询头五条未处理好友信息
    	$mapFa2['uemail1'] = $uemail;
    	$mapFa2['status'] = '0';
    	$faList = $faModel->limit(5)->where($mapFa2)->select();
    	if($faList != null){
    		$dataInfo['info'] = $faList;
    		$dataInfo['status'] = '1';// 查询成功
    	}else{
    		$dataInfo['status'] = '-1';//查询失败
    	}
    	
		$this->ajaxReturn($dataInfo,'JSON');    	
    }
    
    /**
     * 用户提交加好友申请
     * @author wangkai
     */
    public function applyFriend(){
    	$uemail1 = $this->getUserName();//登录用户email
    	$uemail2 = $_POST['uemail2'];//被申请好友
    	$circleId = $_POST['circleid']; //提交申请的圈子id
    	$matchCircleid = '/^[0-9]{1,50}$/';//ID号只能为1至50位纯数字
    	//圈子id正则表达式
    	
    	//获取当前登录用户姓名
    	$uInfo = $this->getUinfo();
    	$uname = $uInfo['uname'];
    	
    	if(preg_match($matchCircleid,$circleId) && $uname != null){//圈子id格式正确 且申请好友信息正确
    		//查询当前登录用户是否和被申请用户在同一个圈子
    		$grModel = M('grouprelationship');
    		$mapGr['uemail'] = array('in',array($uemail1,$uemail2));
    		$mapGr['circleid'] = $circleId;
    		$resultIsCount = $grModel->where($mapGr)->count();
    		
    		if($resultIsCount >= 2){//当存在两条记录说明申请人和被申请人在同一个圈子当中
    			
    			//查询是否存在相同的申请人和被申请人记录 若存在且申请处理情况且status为2（申请未通过） 时不必添加新纪录 直接将status改为0（未处理）
    			$faModel = M('friendapply');
    			$mapFa['uemail1'] = $uemail2;//被申请好友email
    			$mapFa['uemail2'] = $uemail1;//当前登录用户
    			$resultIsFa = $faModel->where($mapFa)->find();
    			
    			if($resultIsFa != null && $resultIsFa['status'] == '2'){
    				$dataFa['status'] = '0';
    				$resultSave = $faModel->where($mapFa)->save($dataFa);
    				if($resultSave != false){
    					$dataInfo['info'] = '1';
    				}
    			}else if($resultIsFa == null){//还未存在该申请记录
    				$grModel = M('group');
    				//查询当前圈子名称
    				$mapGr['id'] = $circleId;
    				$grReName = $grModel->where($mapGr)->getField('name');
    				
    				$dataF['uemail1'] = $uemail2;
    				$dataF['uemail2'] = $uemail1;
    				$dataF['uname2'] = $uname;
    				$dataF['ufaceimg2'] = $uInfo['faceimage'];
    				$dataF['info'] = '';
    				$dataF['status'] = '0';
    				$dataF['circleid'] = $circleId;
    				$dataF['circlename'] = $grReName;                                       
    				$dataF['time'] = time();
    				$resultAdd = $faModel->add($dataF); 
    				if($resultAdd != false){
    					$dataInfo['info'] = '1';//好友申请提交成功
    				}else{
    					$dataInfo['info'] = '-1';//好友申请提交失败
    				}
    			}else{
    				$dataInfo['info'] = '-2';//已存在相同申请人与被申请人记录
    			}
    		}
    	}
    	
    	$this->ajaxReturn($dataInfo,'JSON');
    }
    
    /**
     * 拒绝好友申请
     * @author wangkai
     */
    public function applyCancel(){
    	$uemail2 = $_POST['uemail'];//申请人的email
    	$uemail1 = $this->getUserName();//被申请人的email
    	$matchEmail = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/"; //email正则表达式
    	 
    	//email通过正则表达式验证
    	if(preg_match($matchEmail,$uemail1)){
    		$faModel = M('friendapply');//好友申请 信息表
    		$map['uemail1'] = $uemail1;
    		$map['uemail2'] = $uemail2;
    		$resultUf = $faModel->where($map)->delete(); 
    		
    		if($resultUf != false){
    			$dataInfo['status'] = '1';//删除好友申请记录成功
    		}else{
    			$dataInfo['status'] = '-1';//删除好友申请记录失败
    		}
    			 
    		$this->ajaxReturn($dataInfo,'JSON');
    	}
    	
    }
     
    /**
     * 同意用户申请自己成为好友
     * @author wangkai
     */
    public function applyAgree(){
    	$uemail2 = $_POST['uemail'];//申请人的email
    	$uemail1 = $this->getUserName();//被申请人的email
    	$matchEmail = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/"; //email正则表达式
    	
    	//email通过正则表达式验证
    	if(preg_match($matchEmail,$uemail1)){
    		$faModel = M('friendapply');//好友申请 信息表
    		$ufModel = M('userrelationship');//好友关系表
    		$faModel->startTrans();
    		
    		//将好友申请信息表中的申请处理状态status设为1 （申请通过）
    		$mapFa['uemail1'] = $uemail1;
    		$mapFa['uemail2'] = $uemail2;
    		$dataFa['status'] = '1';
    		$faModel->where($mapFa)->save($dataFa);
    		
    		//查询是否存在相同关系记录
    		$mapUf['uemail1'] = array('in',array($uemail1,$uemail2));
    		$mapUf['uemail2'] = array('in',array($uemail1,$uemail2));
    		$ufIsRe = $ufModel->where($mapUf)->find();
    		
    		if($ufIsRe == null){
    			//获取当前登录用户信息
    			$uinfo = $this->getUinfo();
    			//查询申请人用户信息
    			$uModel = M('user');
    			$mapU['email'] = $uemail2;
    			$uinfo2 = $uModel->where($mapU)->find();
    			
    			//添加申请人与被申请人好友关系记录
    			$dataUf['id'] = '0';
    			$dataUf['uemail1'] = $uinfo['email'];//当前登录用户的信息
    			$dataUf['uname1'] = $uinfo['uname'];//当前登录用户的姓名
    			$dataUf['uphonenumber1'] = $uinfo['phonenumber'];
    			$dataUf['faceimage1'] = $uinfo['faceimage'];
    			$dataUf['uemail2'] = $uinfo2['email'];
    			$dataUf['uname2'] = $uinfo2['uname'];
    			$dataUf['uphonenumber2'] = $uinfo2['phonenumber'];
    			$dataUf['faceimage2'] = $uinfo2['faceimage'];
    			$dataUf['time'] = time();
    			
    			$resultUf = $ufModel->add($dataUf);
    			if($resultUf != false){
    				$faModel->commit();//事务提交
    				$dataInfo['status'] = '1';//添加好友记录成功
    			}else{
    				$dataInfo['status'] = '-1';//添加好友记录失败  
    				$faModel->rollback();//事务回滚 
    			}
    			
    			$this->ajaxReturn($dataInfo,'JSON');
    		}
		    		
    	}
    }
    
	/**
	 * 查询当前用户点击自己所加入或者创建的圈子的所有成员
	 * @author wangkai
	 */
    public function serchCirclePersion(){
    	//根据用户email账号查询用户是否加入该圈子 若加入才可以查询
    	$uemail = $this->getUserName();
    	$circleid = $_POST['circleId'];//获取需要查询的圈子id号
    	$pagenum = $_POST['pagenum'];//当前页数
    	$pagecount = 7;//每页记录数
    	$matchCircleid = '/^[0-9]{1,50}$/';//ID号只能为1至50位纯数字
		    	
    	if(preg_match($matchCircleid,$circleid) && preg_match($matchCircleid,$pagenum)){//圈子id格式正确
    		$grModel = M('grouprelationship');
    		$map['uemail'] = $uemail;
    		$map['circleid'] = $circleid;
    		
    		$grResult = $grModel->where($map)->find();//验证所查询圈子是否为自己已加入的圈子
    		if($grResult != null){
    			//查询该圈子的成员
    			$mapCirid['circleid'] = $circleid;
    			if($pagenum>1){
    				$pageFirst = ($pagenum - 1) * $pagecount ;//当前页其实记录id
    			}else{
    				$pageFirst = 0;
    			}
    			$count = $grModel->where($mapCirid)->count();// 查询满足要求的总记录数
   				$list = $grModel->limit($pageFirst,$pagecount)->where($mapCirid)->select();
   				$pagenumCount = ceil($count/$pagecount);//总页数
   				
   				if($pagenum < $pagenumCount){//若当前页数比总页数小 则显示下一页按钮
   					$dataInfo['pagenext'] = '1'; 
   				}else{
   					$dataInfo['pagenext'] = '-1';
   				}
   				
   				if($pagenum > 1){//若当前页面大于1 则显示上一页按钮
   					$dataInfo['pageold'] = '1';
   				}else{
   					$dataInfo['pageold'] = '-1';
   				}
   				
   				if($pagenumCount <= 1){//若总页数小于2页则不显示翻页组件
   					$dataInfo['pageif'] = '-1';
   				}else{
   					$dataInfo['pageif'] = '1';
   				}
   				$dataInfo['pagenumCount'] = $pagenumCount;//总页数
   				$dataInfo['data2'] = '你';
   				//查询该用户是否为你的好友
   				foreach($list as $k=>$v){
   					//查询所有的好友申请记录
//    				$mapAf['uemail1|uemail2'] = $list[$k]['uemail'];//圈子中的所有用户
//    				$mapAf['uemail1|uemail2'] = $uemail;//当前登录用户
   					
//    				$mapAf['uemail1'] = $list[$k]['uemail'];//其他用户
//    				$mapAf['uemail2'] = $uemail;//当前登录用户
   					$appInfoModel = M('friendapply');
   					$isFriend = $appInfoModel->query("select `status` from `hello_friendapply` where (`uemail1` = '".$list[$k]['uemail']."' or `uemail2` = '".$list[$k]['uemail']."') and (`uemail1` = '".$uemail."' or `uemail2` = '".$uemail."') limit 1");
//    					where($mapAf)->getField('status');
   					$isFriend = $isFriend[0]['status'];
   					$dataInfo['data2'] = $dataInfo['data2'].$isFriend;
   					
   					if($isFriend == null && $list[$k]['uemail'] != $uemail){//1代表已成为好友
   						$list[$k]['appstatus'] = '-1';//还未提交好友申请
   					}else if($list[$k]['uemail'] == $uemail){
   						$list[$k]['appstatus'] = '-2';//该用户是登录用户自己
   						$list[$k]['phonenumber'] = substr($list[$k]['phonenumber'],4,11);
   					}else{
   						$list[$k]['appstatus'] = $isFriend;
   						//当uemail1为登录用户的时候
   						if($isFriend == '0' && $list[$k]['uemail1'] == $uemail){
   							$list[$k]['appstatus'] == '3'; //3代表对方向登陆用户为被申请人  该好友已经像你提交申请
   						}else if($isFriend == '0' && $list[$k]['uemail2'] == $uemail){//0 代表 未处理信息 且为你已向对方提交申请
   							$list[$k]['appstatus'] == '0';
   						}
   					}
   					
   					if($list[$k]['appstatus'] != '1' && $list[$k]['appstatus'] != '-2'){
   						$list[$k]['phonenumber'] = substr($list[$k]['phonenumber'],4,2)."*******".substr($list[$k]['phonenumber'],13,2);
   					}
   					if($list[$k]['appstatus'] == '1'){
   						$list[$k]['phonenumber'] = substr($list[$k]['phonenumber'],4,11);
   					}
   				}
   				
    		}
    		
    	}
    	$dataInfo['data'] = $list;
    	
    	$this->ajaxReturn($dataInfo,'JSON');
    }     
    
    /**
     * 查询圈子密码 
     * @author wangkai
     */
    public function upCirpass(){
    	$password = trim($_POST['cirpassword']);//用户设置的圈子密码
    	$circlrid =	trim($_POST['circleid']);
    	$matchPassword = '/^[A-Za-z0-9]{6,20}$/';//密码验证， 6至20位数字字母下划线正则表达式
    	$matchCircleid = '/^[0-9]{1,50}$/';//ID号只能为1至50位纯数字
    	$gModel = M('group');
    	$competence = false;
    	
    	if(preg_match($matchCircleid,$circlrid) && (preg_match($matchPassword,$password) || $password == null || $password == '') ){
    		//检测当前圈子id是否当前登录用户创建的圈子 若是才可以修改密码
    		$map['id'] = $circlrid;
    		$map['createuser'] = $this->getUserName(); 
    		
    		if($password == '' || $password == null){
    			$password = null;
    		}
    		$data['password'] = $password;
    		$gModelUpRe = $gModel->where($map)->save($data);
    		
    		if($gModelUpRe != false){
    			if($password == null){
    				$dataInfo['info'] = '密码取消成功，他人不再需要密码加入';
    			}else{
    				$dataInfo['info'] = '密码设置成功，他人需要密码才可加入(若想取消密码 提交空密码即可)'; 
    			}
    		}else{
    			if($password == null){
    				$dataInfo['info'] = '该圈子现在无密码，他人不再需要密码即可加入';
    			}else{
    				$dataInfo['info'] = "修改失败（新密码与原密码值不能相同）";
    			}
    		}
    	}else{
    		$dataInfo['info'] = '密码只能由6至20位数字字母下划线组成';
    	}
    	
    	$this->ajaxReturn($dataInfo,'JSON');
    }
        
    /**
     * 查询当前登录账号创建以及加入的圈子
     * @author wangkai
     */
    public function myCircle(){
    	//查询我已加入的圈子 
    	$grModel = M('grouprelationship');
    	$groupModel = M('group');
    	$userName = $this->getUserName();
    	$map['uemail'] = $userName;
    	$list = $grModel->order('isCreater desc ,id asc')->where($map)->select();
    	
    	//跟据圈子id查找圈子名称
    	if($list != null){
    		foreach ($list as $k => $v){
    			$circleid = $list[$k]['circleid'];
    			$mapG['id'] = $circleid;
    			$circleName = $groupModel->where($mapG)->find();
    			$list[$k]['circlename'] = $circleName['name'];
    			$list[$k]['count'] = $circleName['count'];
    			$list[$k]['time'] = date("Y年m月d日  H:i:s",$circleName['time']);
    			
    		}
    		$data = $list;
    	}else{
    		$data['status'] = '0';//不存在数据
    	}
    	
    	$this->ajaxReturn($data,'JSON');
    }
    
    /**
     * 加入圈子
     * @author wangkai
     */
    public function doJoinCircle(){
    	 $circleId = trim($_POST['circleId']);//要加入的圈子id
    	 $passWord = trim($_POST['passWord']);
    	 $uEmail = $this->getUserName();//获取当前登录用户邮箱 
    	 $grModel = M('grouprelationship');
    	 $circleModel = M('group');
    	 $data['circleid'] = $circleId;
    	 $data['uemail'] = $uEmail;
    	 $data['time'] = time()."";
    	 
    	 //检测是否已加入该圈子 
    	 $map['circleid'] = $circleId;
    	 $map['uemail'] = $uEmail;
    	 $resultIsJo = $grModel->where($map)->find();
    	 
    	 //检测已加入多少个别人创建的圈子
    	 $resultJoCount = $grModel->where("uemail = '".$uEmail."'and isCreater is NULL")->count();//返回已加入的圈子数
    	 $resultJoCount = $resultJoCount['tp_count'];
    	 
    	 if($resultIsJo == null && $resultJoCount < 8){//未加入该圈子
    	 	//检测圈子是否需要密码才能加入
    	 	$mapPaVe['id'] = $circleId;
    	 	$resultIfPass = $circleModel->where($mapPaVe)->getField('password');
    	 	if($resultIfPass != null && $resultIfPass != ''){//如果该圈子设有密码 
    	 		
    	 		if($resultIfPass == $passWord){//用户提交密码与圈子密码相符合 则加入该圈子
    	 			$mapC['circleid'] = $circleId;
    	 			//统计当前圈子一共有多少人
    	 			$count = $grModel->where($mapC)->count();
    	 			//获取当前需要加入圈子的用户姓名
    	 			$userInfo = $this->getUinfo();
    	 			$data['uname'] = $userInfo['uname'];
    	 			$data['phonenumber'] = $userInfo['phonenumber'];
    	 			
    	 			$result = $grModel->add($data);
    	 			$dataInfo['info'] = '2';
    	 			 
    	 			if($result != false){
    	 				//创建圈子成功之后 将圈子总人数+1
    	 				$dataCir['id'] = $circleId;
    	 				$dataCir['count'] = $count+1;//统计当前 圈子人数 加1
    	 				$circleModel->save($dataCir);
    	 				$dataInfo['info'] = '1'.$resultJoCount;//创建圈子成功返回1
    	 				
    	 			}else{
    	 				$dataInfo['info'] = '-1';//创建圈子失败返回-1
    	 			}
    	 		}else{
    	 			$dataInfo['info'] = '3';//圈子密码不正确
    	 		}
    	 	}else{
    	 		$mapC['circleid'] = $circleId;
    	 		//统计当前圈子一共有多少人
    	 		$count = $grModel->where($mapC)->count();
    	 		$userInfo = $this->getUinfo();
    	 		$data['uname'] = $userInfo['uname'];
    	 		$data['phonenumber'] = $userInfo['phonenumber'];
    	 		$data['faceimg'] = $userInfo['faceimage'];
    	 		
    	 		$result = $grModel->add($data);
    	 		$dataInfo['info'] = '2';
    	 		
    	 		if($result != false){
    	 			//创建圈子成功之后 将圈子总人数+1
    	 			$dataCir['id'] = $circleId;
    	 			$dataCir['count'] = $count+1;//统计当前 圈子人数 加1
    	 			$circleModel->save($dataCir);
    	 			$dataInfo['info'] = '1';//创建圈子成功返回1
    	 		}else{
    	 			$dataInfo['info'] = '-1';//创建圈子失败返回-1
    	 		}
    	 	}
    	 }else if($resultIsJo == null && $resultJoCount >= 8){
    	 	$dataInfo['info'] = '-200';//加入圈子数量暂时不能超过8个
    	 }else {
    	 	$dataInfo['info'] = '-100';//该圈子已加入不能重复加入 返回-100
    	 }
    	 
    	 $this->ajaxReturn($dataInfo,'JSON');  
    }
    
    /**
     * 异步查询圈子
     * @author wangkai
     */
    public function serchCircle(){
    	//根据用户提交的查询条件异步查询圈子
    	$circleModle = M('group');//圈子表
    	$circleName = trim($_POST['circleName']);//id 或者 名字
//     	$circleId = trim($_POST['circleId']);
//     	$map['id'] = $circleId;
    	
    	if($circleName != '' || $circleName != null){$map['name|id'] =  array('like',"%".$circleName."%");}
    	if($circleName == null || $circleName == ''){$map['name|id'] =  array('notlike',"%11111111111111111111111111%");}
    		
    		//查询前面8条圈子记录
    		$circleList = $circleModle->limit(7)->where($map)->select();
    		//查询当前圈子是否已经加入
    		foreach($circleList as $k=>$v){
    			$grModel = M('grouprelationship');
    			$circleId = $circleList[$k]['id'];
    			if($circleList[$k]['password'] != null){
    				$circleList[$k]['password'] = '000';
    			}
    			$uEmail = $this->getUserName();
    			$mapGr['circleid'] = $circleId;
    			$mapGr['uemail'] = $uEmail;
    			$resultGr = $grModel->where($mapGr)->find();
    			if($resultGr != null){
    				$circleList[$k]['isJo'] = 1;//是否已加入圈子标记 1代表已加入 0代表未加入
    			}else{
    				$circleList[$k]['isJo'] = 0;//是否已加入圈子标记0
    			}
    		}
    		$data = $circleList;
    		
    		$this->ajaxReturn($data,'JSON');
    	
    }
    
    /**
     * 上传用户头像图片
     * @author wangkai
     */
    public function doImageUp(){
    	$uEmail = $this->getUserName();//获取创建者email
    	$result = null;
    	if($uEmail != null){
	    	//获取分页类
	    	import('ORG.Net.UploadFile');
	    	$upload = new UploadFile();// 实例化上传类
	    	$upload->maxSize  = 3145728;// 设置附件上传大小
	    	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    	$upload->allowTypes = array('image/png','image/jpg','image/jpeg','image/gif');//检测mime类型
	    	$upload->savePath =  './Public/Uploads/';// 设置附件上传目录 条件上传目录 
	    	$upload->thumb = true;
	    	$upload->thumbMaxWidth = '50,200';
	    	$upload->thumbMaxHeight = '50,200';
	    	$upload->thumbRemoveOrigin = true;
	    	 
	    	if(!$upload->upload()) {// 上传错误提示错误信息
	    		$infoMsg = $upload->getErrorMsg();
	    	}else{// 上传成功 获取上传文件信息
	    		$info =  $upload->getUploadFileInfo();
	    		
	    		//图片保存成功之后  将用户登录状态auth改成 非首次登陆 若原来为0则改成3 原来为 1 则改成2
	    		$uInfo = $this->getUinfo();//获取当前登录用户信息
	    		$auth = $uInfo['auth'];
	    		if($auth == '1'){
	    			$data['auth'] = '2';
	    		}else if($auth == '0'){
	    			$data['auth'] = '3';
	    		}
	    		
	    		// 保存表单数据 包括附件数据
	    		$userModel = M('User'); // 实例化User对象
	    		$userModel->create(); // 创建数据对象
	    		$map['email'] = $uEmail;
	    		$data['faceimage'] = 'thumb_'.$info[0]['savename'];//缩略图文件名
	    		$result = $userModel->where($map)->save($data); // 写入用户数据到数据库
	    	}
	    	 
	    	
	    	 
	    	if($result != false){
	    		$infoMsg = '1';//数据保存成功
	    		echo "<script> parent.notice("."'".$infoMsg."'".");</script>";//执行提交页面的回调函数
	    	}else{
	    		$infoMsg = '2';//数据保存失败
	    		echo "<script> parent.notice("."'".$upload->getErrorMsg()."'".");</script>";
	    	}
    	}
    }
    
    /**
     * 用户创建圈子处理方法
     * @author wangkai
     */
    public function doCircle(){
    	$uEmail = $this->getUserName();//获取创建者email
    	$uInfo = $this->getUinfo();
    	if($uEmail != null){
	    	$circleGroup = M('group'); 
	    	$circleName = trim($_POST['circlename']).'';
// 	    	$matchCircleName = '/^[a-z0-9\x80-\xff]{1,}$/'; //正则表达式 匹配数字字母下划线以及中文 1`10位
	    	$matchCircleName = '/^[a-z0-9\x{4e00}-\x{9fa5}]{1,10}$/u'; //正则表达式 匹配数字字母下划线以及中文 1`10位
	    	$len = mb_strlen($circleName,"utf-8");//验证圈子名称长度
	    	
	    //检测当前用户创建圈子个数 若超过八个则不能创建
	    	$mapGC['createuser']  =  $uEmail;
	    	$resultGC = $circleGroup->where($mapGC)->count();
	    	$resultGC = $resultGC['tp_count'];
	    	
	    	if(preg_match($matchCircleName,$circleName) && $len<=10 && $resultGC < 8){//当数据正则验证通过插入数据库
	    		$map['name'] = $circleName;
	    		$resultFind = $circleGroup->where($map)->find();
	    		
	    		if($resultFind!=null){//查询是否有相同名称的圈子 若存在则创建失败
	    			$dataInfo['info'] = '这个名称已经存在，换个名吧！';
	    		}else{
	    			$data['name'] = $circleName;//圈子名称
	    			$data['count'] = 1;//圈子总人数 创建时默认1
	    			$data['type'] = '0';//圈子类型 默认为0  (公司或者学校类型的圈子 0 即为 无类型)
	    			$data['createuser'] = $uEmail; //圈子创建人 当前登录创建人（email账号）
	    			$data['createname'] = $uInfo['uname'];
	    			$data['location'] = null;//圈子所在地（例如公司或者学校类型的圈子） 默认传null
	    			$data['fcircle'] = 0;//圈子所属（父圈子）
	    			$data['time'] = time();//时间
	    			
	    			$result = $circleGroup->add($data);
	    			if($result!=false){
	    				//圈子创建成功同时在圈子所属关系当中 将圈子创始人email账号加入
	    				$grModel = M('grouprelationship');
	    				$dataGr['circleid'] = $result;
	    				$dataGr['uemail'] = $uEmail;
	    				$dataGr['time'] = time();
	    				$dataGr['isCreater'] = '1';
	    				$dataGr['uname'] = $uInfo['uname'];
	    				$dataGr['phonenumber'] = $uInfo['phonenumber'];
	    				$dataGr['faceimg'] = $uInfo['faceimage'];
// 	    				$dataGr['status '] = '1';
	    				$grModel->add($dataGr);
	    				$dataInfo['info'] = "圈子'".$circleName."'创建成功.";
	    				$dataInfo['status'] = 1;//创建成功状态为1
	    			}else{
	    				$dataInfo['info'] = '圈子创建失败请重试';
	    			}
	    		}
	    	}else if(preg_match($matchCircleName,$circleName) && $len<=10 && $resultGC >= 8){
	    		$dataInfo['info'] = "创建失败,暂时不能创建8个以上的圈子";
	    	}else{
	    		$dataInfo['info'] = "圈子名称只能由小于10位的数字子母以及中文组成,请重新输入.";
	    	}
    	}
    	
    	$this->ajaxReturn($dataInfo,'JSON');
    }
    
    
}
 
