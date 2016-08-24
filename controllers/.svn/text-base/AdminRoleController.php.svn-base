<?php
class AdminRoleController extends AdminController{
	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		
		$this->assign('page', Role::getPageList($pageno));
		$this->view('role/index.html');
	}
	
	public function addAction(){
		if(!isSubmit('isRoleSubmit')){
			$this->view('role/add.html');
		} else {
			$name = trim(getValue('name'));
			$arr_input = array();
			$arr_input['name'] = $name;
				
			$result = Role::addRole($arr_input);
			
			if($result){
				header("Location:/role");
			}
		}
	}
	
	public function modifyAction(){
	if(!isSubmit('isRoleSubmit')){
			$id = intval(getValue("id"));
			$this->assign("page", Role::viewRole($id));
			$this->view('role/edit.html');
		} else {
			$id = intval(getValue("id"));
			$name = trim(getValue('name'));
			$arr_input = array();
			$arr_input['id'] = $id;
			$arr_input['name'] = $name;
			
			$result = Role::modifyRole($arr_input);
			
			if($result){
				header("Location:/role");
			}
		}
	}
	
	public function delAction(){
		$id = intval(getValue("id"));
		
		$result = Role::delRole($id);
			
		if($result){
			header("Location:" . $_SERVER["HTTP_REFERER"]);
		}
	}
}