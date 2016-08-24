<?php
class AdminAttributeController extends AdminController{
		
	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction() {
		$pageno = intval(getValue('pageno',1));
		$page = Attribute::getPageList($pageno);
		$this->assign('page', $page);
		$this->view('attribute/index.html');
	}
	
	public function addAction() {
		if(!isSubmit('isAttrSubmit')) {
			
			$this->view('attribute/add.html');
			
		} else {
			
			$arr_input = array();
			$arr_input['name'] = trim(getValue('name'));
			
			$obj_attr = new Attribute();
			$result = $obj_attr->addAttribute($arr_input);
			if($result) {
				header("Location:/attribute");
			}
			
		}
	}
	
	public function modifyAction () {
		if(!isSubmit('isAttrSubmit')){
			
			$id = trim(getValue('id'));
			$this->assign('page', Attribute::viewAttribute($id));
			$this->view('attribute/edit.html');
			
		} else {
			
			$arr_input = array();
			$arr_input['id'] = trim(getValue('id'));
			$arr_input['name'] = trim(getValue('name'));
			
			$obj_attr = new Attribute();
			$result = $obj_attr->modifyAttribute($arr_input);
			
			if($result){
				header("Location:/attribute?action=modifyAction&id=" . $arr_input['id']);
			}
		}
	}

	public function delAction() {
			
		$id = trim(getValue('id'));
		
		$obj_attr = new Attribute();
		$result = $obj_attr->deleteAttribute($id);
		
		if($result){
			header("Location:/attribute");
		}
	}
	
	public function addAttriValueAjax() {
		$arr_input = array();
		$arr_input['value'] = trim(getValue('attribute_value'));
		$arr_input['attribute_id'] = trim(getValue('attribute_id'));
		
		$obj_attr = new Attribute();
		$result = $obj_attr->addAttriValue($arr_input);
		
		echo $result;
	}
	
	public function getAttriValueListAjax() {
		$arr_input = trim(getValue('attribute_id'));
		
		$obj_attr = new Attribute();
		$result = $obj_attr->getAttriValueList($arr_input);
		
		echo json_encode($result);
	}
	
	public function modifyAttriValueAjax() {
		$arr_input = array();
		$arr_input['attribute_id'] = trim(getValue('attribute_id'));
		$arr_input['value'] = trim(getValue('attrivalue_value'));
		$id_attribute_value = trim(getValue('id_attribute_value'));
		
		$obj_attr = new Attribute();
		$result = $obj_attr->modifyAttriValue($id_attribute_value, $arr_input);
		
		echo $result;
	}
	
	public function delAttriValueAjax() {
		$id_attribut_value = trim(getValue('id_attribute_value'));
		
		$obj_attr = new Attribute();
		$result = $obj_attr->delteAttriValue($id_attribut_value);
		
		echo $result;
	}
	
	public function getAttrNameAjax() {
		$result = Attribute::getAttributeAllList();
		echo json_encode($result);
	}
}
?>