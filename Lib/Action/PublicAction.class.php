<?php
//登录注册等功能实现Action
class PublicAction extends GlobalAction {
	/**
	 * 注册页面以及登陆页面模板显示
	 * @author wangkai
	 * */
	public function login(){
		$this->display();
	}

	/**
	 *接收ajax登录数据 并且验证。 
	 *@author wangkai2013716
	 */
	public function register(){
		$userModel = M('user');
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$matchEmail = "/^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/"; //email正则表达式
		$matchPassword = '/^[A-Za-z0-9]{6,20}$/';//密码验证， 6至20位数字字母下划线正则表达式
		$isPattern = false;//正则验证是否通过标记
		
		//邮件账号正则验证
		$resultEmail = preg_match($matchEmail,$username);
		if($resultEmail){
			$isPattern = true;
		}else{
			$isPattern = false;
			$data['info'] = "账号格式不正确，请输入正确的邮箱地址！";
		}
		
		//密码正则表达式验证
		$resultPassword = preg_match($matchPassword,$password);
		if($resultPassword && ($password != null or $password != '')){//密码不为空的时候，判断密码
			$isPattern = true;
		}else if($password != null or $password != ''){
			$isPattern = false;
			$data['info'] = "密码格式不正确，密码只能由6至20位数字,字母组成。";
		}
		
		//当用户仅提交账号时
		if($username != null && $password == null && $isPattern){
			$map['email'] = $username;
			$uname = $userModel->where($map)->getField('uname');
			
			if($uname != null && $password == null){
				$data['info'] = "你好".$uname."，请输入登录密码";
				$data['status'] = 1;//账号验证正确
			}else if($uname == null && $password == null){
				$data['info'] = "该账号未注册,请重新输入！";
				$data['status'] = 2;//账号验证错误
			}
		}
		
		//当用户同时提交账号和密码时
		if($username != null && $password != null && $isPattern){
			$map['email'] = $username;
			$map['password'] = sha1(md5($password))+'';
			$result = $userModel->where($map)->select();
			
			if($result != null){
				//账号和密码同时验证成功时将邮箱账号加入cookie 保存七天
				cookie('username',$username,604800);
				$data['info'] = "登录成功！";
				$data['status'] = 3;//登陆成功
			}else{
				$data['info'] = "密码错误，请重新输入！";
				$data['status'] = 4;//密码输入错误
			}
		}
		
		$this->ajaxReturn($data,'JSON');
	}
	
	/**
	 * 接收并且验证注册数据
	 * @author wangkai
	 */
	public function registerIn(){
		$userModel = M('user');
		$Email = $_POST['Email'];//邮箱
		$Password = $_POST['Password'];//密码
		$Phone = $_POST['Phone'];//手机
		$Name = $_POST['Name'];//姓名
		$Verify = $_POST['Verify'];//验证码
		
		$matchEmail = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/'; //email正则表达式
		$matchPassword = '/^[A-Za-z0-9]{6,20}$/';//密码验证， 6至20位数字字母下划线正则表达式
		$matchArea = '0086'; //区号验证正则表达式(目前必须为中国0086) 暂时直接插入数据库不验证
		$matchPhone = '/^1[3458]\d{9}$/';//手机号验证正则表达式
		$matchName = '/^[\x{4e00}-\x{9fa5}]{2,4}$/u';//中文姓名验证正则表达式
		$verify = session('verify');//session中的验证码号
		
		//注册邮箱验证
		if((!preg_match($matchEmail,$Email)) || strlen($Email) > 46){//邮箱地址不能大于46位
			$data['info'] = "邮箱地址格式填写错误！";
		}else{
			$map['email'] = $Email;
			$resultEmail = $userModel->where($map)->find();
			if($resultEmail != null){
				$data['info'] = "该邮箱已注册，请更换注册邮箱！";
				$this->error($data['info']);
			}
		}
		
		//其他注册信息验证
		if(!preg_match($matchPassword,$Password)){
			$data['info'] = "密码只能由6至20位数字,字母组成！";
		}else if(!preg_match($matchName,$Name)){
			$data['info'] = "请填写你的真实姓名！";
		}else if(!preg_match($matchPhone,$Phone)){
			$data['info'] = "请正确填写11位手机号码！";
		}else if($verify != md5($Verify)){
			$data['info'] = "验证码填写错误！";
		}else{
			$dataIn['uname'] = $Name;//姓名
			$dataIn['email'] = $Email;//账号email
			$dataIn['password'] = sha1(md5($Password));//登录密码
			$dataIn['phonenumber'] = $matchArea.$Phone;//手机号
			$dataIn['regtime'] = time();
			
			$resultIn = $userModel->add($dataIn);
			if($resultIn != false){
				cookie('username',$Email,604800);//将用户email存入cookie
				cookie('uid',$resultIn,604800);//将用户主键id号存入cookie
				
				//注册成功后发送账号激活邮件
				$address = $Email;
				$subject = "Hello注册账号激活邮件";
				$verifyCode = sha1(md5($Email*"5815355"));//sha1(md5(邮箱地址*5815355))邮箱验证加密;
				$body = "<heml><body>ok&nbsp&nbsp".$Name."，点一下
						<a href='http://localhost/hello/index.php/Public/emailVerify?verifyCode=".$verifyCode."'>激活账号</a>
						完成注册账号激活。<body/></html>";
				$this->sendEmail($address,$subject,$body);
				
				$data['info'] = "注册成功！";
				$data['status'] = 5;//注册成功
			}else{
				$data['info'] = "注册失败";
				$data['status'] = 6;//注册失败
			}
		}
		
		$this->ajaxReturn($data,'JSON');
	}
	
	/**
	 * 发送邮件方法
	 * @param string $address 收件人邮箱地址
	 * @param string $subject 邮件标题
	 * @param string $body 邮件内容 
	 * @author wangkai201386
	 */
	public function sendEmail($address,$subject,$body){
		$this->gloIncludes();//包含邮件发送类
		$result = 0;
		
		$mail = new PHPMailer(); //建立邮件发送类
		$address = $address;//收件人地址
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->CharSet='UTF-8';// 设置邮件的字符编码
		$mail->Host = "smtp.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = "393867916@163.com"; // 邮局用户名(请填写完整的email地址)
		$mail->Password = "5815355"; // 邮局密码
		$mail->From = "393867916@163.com"; //邮件发送者email地址
		$mail->FromName = "captain";
		$mail->AddAddress($address,"");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		//$mail->AddReplyTo("", "");
		//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		$mail->Subject = $subject; //邮件标题
		$mail->Body = $body; //邮件内容
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
		
		if(!$mail->Send())
		{
			trace("邮件发送失败",'提示');
			trace($mail->ErrorInfo,'邮件发送失败原因');
		}else{
			trace("邮件发送成功",'提示');
			$result = 1;
		}
		return $result;
	}
	
	/**
	 * 邮箱验证账号激活
	 * @author wangkai2013820
	 */
	public function emailVerify(){
		$userModel = M('user');
		$verifyCode = $_GET['verifyCode'];
		$email = cookie('username');//用户注册邮箱
		$uid = cookie('uid');//用户主键id
		$rule = sha1(md5($email*"5815355"));//邮箱验证规则
		
		if($verifyCode == $rule){//如果激活验证码正确则将账号设置未激活状态
			$data['uid'] = $uid;
			$data['auth'] = "1";//将用户设置成已认证，且首次登录的账号类型
			$userModel->save($data);
			redirect('../Index/index');//激活账号成功后跳转到index.php
		}else{
			$this->error('激活失败请重新完成激活(原因：激活码不正确或者已过期。)','__APP__/Index/index');
		}
	}
	
	/**
	 * 点击邮件链接重新设置密码功能界面显示
	 * @author wangkai2013820
	 */
	public function resetPassword(){
		//用户点击链接时判断链接是否合法
		$email = $_GET['email'];
		$verifyCode = $_GET['verifyCode'];
		$rule = sha1(md5($email*"5815355"/"wang5815355"));//sha1(md5(邮箱地址*5815355/"wang5815355"))找回密码链接加密规则;
		
		if($verifyCode == $rule){//如果验证合法则将用户的email作为账户存入cookie 并且显示重设界面
			cookie('username',$email,604800);
			$this->display();
		}else{
			$this->error("密码重设链接不合法或已过期",'__APP__/Public/login');
		}
	}
	
	/**
	 * 重设密码更新至数据库
	 */
	public function doResetPassword(){
		$userModel = M('user');
		//获取需要重设密码的email账号和新密码
		$email = $this->getUserName();
		$password = trim($_POST['password']);
		$matchPassword = '/^[A-Za-z0-9]{6,20}$/';//密码验证， 6至20位数字字母下划线正则表达式
		
		//如果email不等于空 且密码正则表达式通过 则更新密码 
		if($email != null && preg_match($matchPassword,$password)){
			$map['email'] = $email;
			$data['password'] = sha1(md5($password));
			$result = $userModel->where($map)->save($data);
			if($result != false){//更新成功
				$dataInfo['info'] = "更新成功";
			}else{//失败
				$dataInfo['status'] = "-2";
				$dataInfo['info'] = "可能由于网络问题，密码更新失败请重试";
			}
		}else if($email != null && !preg_match($matchPassword,$password)){
			$dataInfo['status'] = "-1";
			$dataInfo['info'] = "密码只能由6至20位数字,字母组成!请重新输入";
		}else{
			$dataInfo["status"] = "-3";
			$dataInfo['info'] = "恶意更新失败，已获取你的ip地址";
		}
		
		$this->ajaxReturn($dataInfo,'JSON');
	}
	
	/**
	 * 发送找回密码链接邮件方法
	 */
	public function findPassword(){
		$email = $_POST['Email'];
		$data['rightinfo'] = "重发邮件";
		
		//发送找回密码链接邮件
		$address = $email;
		$subject = "Hello密码找回邮件";
		$verifyCode = sha1(md5($email*"5815355"/"wang5815355"));//sha1(md5(邮箱地址*5815355/"wang5815355"))找回密码链接加密规则;
		$body = "<heml><body>ok&nbsp&nbsp! 点一下
						<a href='http://localhost/hello/index.php/Public/resetPassword?verifyCode=".$verifyCode."&email=".$email."'>重设密码</a>
						进入密码设置页面重新设置登录密码。<body/></html>";
		
		$result = $this->sendEmail($address,$subject,$body);
		if($result == 1){
			$data['talkinfo'] = "密码重设邮件已发送至你的注册邮箱，你也可以继续尝试输入密码登录。";
		}else{
			$data['talkinfo'] = "邮件发送失败，请点击'重发邮件'";
		}
		$this->ajaxReturn($data,'JSON');
	}
	
	/**
	 * 验证码图片方法
	 * @author wangkai201381
	 */
	public function verify(){
		$length = 5;//验证码的长度，默认为4位数
		$model = 1;//验证字符串的类型，默认为数字，其他支持类型有0 字母 1 数字 2 大写字母 3 小写字母 4中文 5混合
		$type = 'png';//验证码的图片类型，默认为png
		$width = 20;//验证码的宽度，默认会自动根据验证码长度自动计算
		$height = 29;//验证码的高度，默认为22
		$verifyName = "verify";//验证码的SESSION记录名称，默认为verify
		
		import('ORG.Util.Image');
		Image::buildImageVerify($length,$model,$type,$width,$height,$verifyName);
	}
	
}
