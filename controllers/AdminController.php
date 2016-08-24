<?php
class AdminController extends ControllerCore{
	
	protected static $assign = array();
	
	public $chncode;
	
	public function __construct(){
		global $arr_node_type , $arr_order_status , $arr_chncode;
		
		$this->assign("session" , $_SESSION);
		$this->assign('arr_node_type', $arr_node_type);
		$this->assign('arr_order_status', $arr_order_status);
		$this->assign('arr_chncode', $arr_chncode);
		
		$this->chncode = $_SESSION['chncode'] ? $_SESSION['chncode'] : '10000';
		
		parent::__construct();
	}
	
	public function action() {
		$action = $_REQUEST['action'];
		if ($action == '') {
			$action = 'initAction';
		}
		$this->$action();
	}
	
	public function assign($key, $value) {
		$this->assign[$key] = $value;
	}
	
	public function get($key, $default=null) {
		return $this->assign[$key];
	}
	
	public function view($tp_tpl_page, $tp_tpl_layout='layout.html') {
		global $tp_tpl_assign,$tp_tpl_instance;
		
		$this->assign['tp_tpl_page'] = $tp_tpl_page;
		$this->assign['tp_tpl_layout'] = $tp_tpl_layout;
		
		foreach ($this->assign as $key => $value){
			$tp_tpl_assign[$key] = $value;
		}
		tp_tpl_display($tp_tpl_instance, $tp_tpl_page, $tp_tpl_layout, $tp_tpl_assign, $tp_tpl_page_plugin);
		
		if(true == $this->template_info){
			echo "<pre>";
			echo '<div style="background-color:#EEEEEC;color:#666;font-size:14px;font-weight:800;">';
			print_r($tp_tpl_assign);
			echo "</div>";
			echo "</pre>";
		}
	}
}