<?php
class AdminCategoryController extends AdminController{
	
	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		$parentid = intval(getValue('parentid',-1));
		
		if($parentid != -1){
			$pageTitle = Category::getCategoryPageTitle($parentid);
			krsort($pageTitle);
			$this->assign('pageTitle' , $pageTitle);
		}
		//$this->assign('all_cate' , Category::getAllList());
		$this->assign('page', Category::getPageList($parentid , $pageno));
		$this->view('category/index.html');
	}
	
	public function getChildList(){
		$is_type = getValue('is_type' , false);
		if($is_type){
			unset($arr_input);
			$arr_input['class_type'] = 1;
		}
		echo json_encode(Category::getAllList($arr_input));
	}
	
	public function getAllCateList(){
		$this->assign('catelist', Category::getAllList('' , true));
		$this->view('category/catelist.html', 'layout_block.html');
	}
	
	public function classTypeAction(){
		$pageno = intval(getValue('pageno',1));
		$category_id = intval(getValue('id'));
		
		$page = Product::getPageListByCategoryId($category_id , $pageno);
		foreach($page['items'] as $key => $row){
			$page['items'][$key]['original_price']	 = mathOutPrice($row['original_price']);
			$page['items'][$key]['use_price']		 = mathOutPrice($row['use_price']);
			$page['items'][$key]['dicount_price']	 = mathOutPrice($row['dicount_price']);
		}
		$cate_info = Category::getCategoryPageTitle($category_id);
		krsort($cate_info);
		
		$this->assign('pageTitle' , $cate_info);
		$this->assign('page' , $page);
		$this->view('category_product_page_list.tpl');
	}
	
	public function addAction(){
		if(!isSubmit('isCategorySubmit')){
			$parentid = intval(getValue('parentid',-1));
			
			if($parentid != -1){
				$pageTitle = Category::getCategoryPageTitle($parentid);
				krsort($pageTitle);
				$this->assign('pageTitle' , $pageTitle);
			}
			$this->view('category/add.html');
		} else {
			$pid = trim(getValue('category_id','-1'));
			$name = trim(getValue('name'));
			$description = trim(getValue('description'));
			$recommend_product_ids = trim(getValue('recommend_product_ids'));
			if(!empty($_FILES['icon']['name'])){
				$obj_img = new Image();
				$icon = $obj_img->uploadFile($_FILES['icon']); 
			}
			$status = intval(getValue('status' , 1));
			$class_type = intval(getValue('class_type' , 0));
			
			$arr_input = array();
			$arr_input['pid'] = $pid;
			$arr_input['name'] = $name;
			$arr_input['description'] = $description;
			$arr_input['recommend_product_ids'] = $recommend_product_ids;
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			
			if(!empty($_FILES['icon']['name']))
				$arr_input['icon'] = $icon;
				
			$arr_input['status'] = $status;
			$arr_input['class_type'] = $class_type;
			
			$obj_category = new Category();
			$category_id = $obj_category->add($arr_input);
			
			if($category_id){
				$detail = self::setMemoryData($category_id);
				if(!Validate::isUpdateCache($detail)){
					$url = '/category?parentid=' . $pid;
					echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "'. $url .'";</script>';
				}else
					header("Location:/category?parentid=" . $pid);
			}
		}
	}
	
	public function modifyAction(){
		if(!isSubmit('isCategorySubmit')){
			$parentid = intval(getValue('parentid',-1));
			
			if($parentid != -1){
				$pageTitle = Category::getCategoryPageTitle($parentid);
				krsort($pageTitle);
				$this->assign('pageTitle' , $pageTitle);
			}
			$id = trim(getValue('id'));
			$this->assign('page', Category::view($id));
			$this->view('category/edit.html');
			
		} else {
			
			$id = trim(getValue('id'));
			$pid = trim(getValue('category_id','-1'));
			$name = trim(getValue('name'));
			$description = trim(getValue('description'));
			$recommend_product_ids = trim(getValue('recommend_product_ids'));
			$status = trim(getValue('status'));
			$class_type = intval(getValue('class_type' , 0));
			
			if(!empty($_FILES['icon']['name'])){
				$obj_img = new Image();
				$icon = $obj_img->uploadFile($_FILES['icon']);
			}
			
			$arr_input = array();
			$arr_input['id'] = $id;
			$arr_input['pid'] = $pid;
			$arr_input['name'] = $name;
			$arr_input['description'] = $description;
			$arr_input['recommend_product_ids'] = $recommend_product_ids;
			$arr_input['status'] = $status;
			$arr_input['class_type'] = $class_type;
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			
			if(!empty($_FILES['icon']['name']))
				$arr_input['icon'] = $icon;
			
			$obj_category = new Category();
			$result = $obj_category->modify($arr_input);
			
			if($result){
				$detail = self::setMemoryData($id);
				if(!Validate::isUpdateCache($detail)){
					$url = '/category?parentid=' . $pid;
					echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "'. $url .'";</script>';
				}else
					header("Location:/category?parentid=" . $pid);
			}
			
		}
	}
	
	//点击上线下线直接改变状态
	public function changeStatus(){
		$act = trim(getValue('status'));
		$id = trim(getValue('id'));
		
		$obj_category = new Category();
		$result = $obj_category->updownCategory($id, $act);
		
		echo $result;
	}
	
	public function multiCateAction() {
		$pid = intval(getValue('parentid',-1));
		$act = trim(getValue('statusOrder'));
		$ids = getValue('cateids');
		$action = trim(getValue('actionOrder'));
		$url = getFromUrl('');
		
		if($action == 'updownCateFlag') {
			$obj_cate = new Category();
			$result = $obj_cate->updownCategory($ids, $act);
		}
		if ($result){
			header("Location:" .$url);
		}
	}
	
	public function delAction(){
		if(isSubmit('ids')){
			$arr_ids = getValue('ids');
			$result = Category::deleteCategory($arr_ids);
		}else{
			$id = getValue('id');
			$result = Category::deleteCategory($id);
			
			$detail = self::setMemoryData($id);
			if(!Validate::isUpdateCache($detail)){
				echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";</script>';
			}else
				header("Location:" . $_SERVER["HTTP_REFERER"]);
		}
		echo $result;
	}
	
	public function setMemoryData($id = 0){
		if($id == 0){
			$id = intval(getValue("id"));
		}
		unset($arr_result);
		$data['cate'] = Category::processMemoryData($id);
		$detail = ap_core_post("CATEGORY_UPDATE_CACHE",$data);
		
		if (isSubmit('ajax')){
			die($detail);
		}else{
			return $detail;
		}
	}
	
	public function updateCacheAll(){
		$arr_all_list = Category::getAllList('' , true);
		
		die(json_encode($arr_all_list));
	}
}
?>
