<?php
class GlobalAction extends Action {

	/**
	 * 包含邮件发送类
	 * @author wangkai2013820
	 */
	public function gloIncludes(){
		require ('PHPMailer/class.phpmailer.php');//包含邮件发送类
	}

	/**
	 * 从cookie中获取用户登录账号
	 * @return string $username 当前登录用户的email账号
	 * @author wangkai
	 */
	public function getUserName(){
		$username = cookie('username');
		if($username == null){
			$username = session('username');
		}
		return $username;
	}

	/**
	 * 查询当前登录用户的注册记录信息
	 * @return array $userInfo 登录用户的注册信息
	 * @author wangkai
	 */
	public function getUinfo(){
		$userModel = M('user');
		$username = $this->getUserName();
		$map['email'] = $username;

		$userInfo = $userModel->where($map)->find();
		return $userInfo;
	}

	/** 发送邮件方法
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
}
?>