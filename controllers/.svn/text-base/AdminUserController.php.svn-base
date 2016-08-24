<?php
class AdminUserController extends AdminController{
	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		
		$arr_role = Role::getRoleList();
		unset($arr_hash_role);
		foreach ($arr_role as $row){
			$arr_hash_role[$row['id']] = $row['name']; 
		}
		$this->assign('role', $arr_hash_role);
		$this->assign('page', AdminUser::getPageList($pageno));
		$this->view('admin/index.html');
	}
	
	public function addAction(){
		if(!isSubmit('isAdminUserSubmit')){
			$arr_role = Role::getRoleList();
			unset($arr_hash_role);
			foreach ($arr_role as $row){
				$arr_hash_role[$row['id']] = $row['name']; 
			}
			$this->assign('role', $arr_hash_role);
			$this->view('admin/add.html');
		} else {
			$name = trim(getValue('name'));
			$arr_input = array();
			$arr_input['role_id'] = intval(getValue("role_id"));
			$arr_input['name'] = $name;
			$arr_input['email'] = trim(getValue("email"));
			$arr_input['passwd'] = encrypt(trim(getValue("passwd")));
			$arr_input['status']	 = intval(getValue('status'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
				
			$result = AdminUser::addAdminUser($arr_input);
			
			if($result){
				header("Location:/user");
			}
		}
	}
	
	public function modifyAction(){
	if(!isSubmit('isAdminUserSubmit')){
			$id = intval(getValue("id"));
			if($_SESSION['admin_userid'] != DEFAULT_ADMIN_USER && $id == DEFAULT_ADMIN_USER){
				echo $this->errors[] = displayError('默认超级管理员无法对其编辑，如有问题请联系技术人员！');
				return false;
			}
			$arr_role = Role::getRoleList();
			unset($arr_hash_role);
			foreach ($arr_role as $row){
				$arr_hash_role[$row['id']] = $row['name']; 
			}
			$this->assign('role', $arr_hash_role);
			$this->assign("page", AdminUser::viewAdminUser($id));
			$this->view('admin/edit.html');
		} else {
			$id = intval(getValue("id"));
			$passwd = trim(getValue('passwd'));
			
			if($_SESSION['admin_userid'] !=1 && $id == 1){
				echo $this->errors[] = displayError('默认超级管理员无法对其编辑，如有问题请联系技术人员！');
				return false;
			}
			unset($arr_input);
			
			$arr_input['id']		 = $id;
			$arr_input['role_id']	 = trim(getValue('role_id'));
			$arr_input['name']		 = trim(getValue('name'));
			$arr_input['email']		 = trim(getValue('email'));
			if(!empty($passwd)){
				$arr_input['passwd'] = encrypt($passwd);
			}
			$arr_input['status']	 = intval(getValue('status'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			
			$result = AdminUser::modifyAdminUser($arr_input);
			
			if($result){
				header("Location:/user");
			}
		}
	}
	
	public function delAction(){
		$id = intval(getValue("id"));
		
		$result = AdminUser::delAdminUser($id);
			
		if($result){
			header("Location:" . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	public function changeChncode(){
		$chncode = trim(getValue("chncode"));
		$result = AdminUser::changeChncode($chncode);
		
		echo $result;
	}
}