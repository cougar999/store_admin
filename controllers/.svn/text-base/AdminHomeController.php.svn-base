<?php
class AdminHomeController extends AdminControllerCore{
		
	public function __construct(){
		$this->errors = array();
		
		parent::__construct();
	}
	
	public function goto() {
		$action = $_REQUEST['action'];
		if ($action == '') {
			$action = 'list';
		}
		$this->$action();
	}
}