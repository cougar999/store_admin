<?php
class LoginController extends AdminController{
		
	public function __construct(){
		$this->errors = array();
		
		parent::__construct();
	}
	
	public function initAction(){
		$this->view('login.html');
	}
	
	
	public function postProcess()
	{
		if (isSubmit('submitLogin'))
			$this->processLogin();
		elseif (isSubmit('submitForgot'))
			$this->processForgot();
	}
	
	/**
	 * 
	 * 登录程序
	 */
	public function processLogin(){
		/* Check fields validity */
		$passwd = trim(getValue('passwd'));
		$email = trim(getValue('email'));
		
		if (empty($email))
			$this->errors[] = displayError('E-mail是空的');
		elseif (!Validate::isEmail($email))
			$this->errors[] = displayError('错误的e-mail地址');

		if (empty($passwd))
			$this->errors[] = displayError('密码是空的');
		elseif (!Validate::isPasswd($passwd))
			$this->errors[] = displayError('无效的密码');
			
		if (!count($this->errors)){
			
			unset($arr_input);
			$arr_input['email'] = $email;
			$arr_input['passwd'] = $passwd;
			$obj_adminuser = new AdminUser();
			$arr_userinfo = $obj_adminuser->checkLogin($arr_input);
			if(!$arr_userinfo){
				$this->errors[] = displayError('账户不存在或密码错误.');
			}else{
				$_SESSION['admin_userid'] = $arr_userinfo['id'];
				$_SESSION['admin_username'] = $arr_userinfo['name'];
				$_SESSION['email'] = $arr_userinfo['email'];
				$_SESSION['role'] = $arr_userinfo['role_id'];
				$_SESSION['chncode'] = $arr_userinfo['chncode'];
				$_SESSION['remote_addr'] = getRemoteAddr();
				if (isset($_POST['redirect']) && Validate::isControllerName($_POST['redirect']))
					$url = $_POST['redirect'];
				else
					$url = 'node';
			
			if (isSubmit('ajax'))
					die(json_encode(array('hasErrors' => false, 'redirect' => $url)));
				else
					$this->redirect_after = $url;
			}
		}
		if (isSubmit('ajax'))
			die(json_encode(array('hasErrors' => true, 'errors' => $this->errors)));
		
	}
	
	
	public function processForgot()	{
		
	}
}