<?php
class GlobalAction extends Action {
	
	/**
	 * 包含邮件发送类
	 * @author wangkai2013820
	 */
	public function gloIncludes(){
		require_once ('/PHPMailer/class.phpmailer.php');//包含邮件发送类
	}
	
	/**
	 * 从cookie中获取用户登录账号
	 * @return string $username 当前登录用户的email账号
	 * @author wangkai
	 */
	public function getUserName(){
		$username = cookie('username');
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
}
?>