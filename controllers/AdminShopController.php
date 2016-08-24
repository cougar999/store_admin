<?php
class AdminShopController extends AdminController{

	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		
		$obj_area = new Area();
		$this->assign("area",$obj_area -> getAllList());
		$this->assign('page', Shop::getPageList($pageno));
		$this->view('shop/index.html');
	}
	
	public function addAction(){
		if(!isSubmit('isShopSubmit')){
			
			$obj_area = new Area();
			$this->assign("area",$obj_area -> getAllList());
			$this->view('shop/add.html');
			
		} else {
			
			$arr_input = Array();
			$arr_input['name'] = trim(getValue('name'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_input['contact'] = trim(getValue('contact'));
			$arr_input['phone_no'] = trim(getValue('phone_no'));
			$arr_input['cell_phone'] = intval(getValue('cell_phone'));
			$arr_input['province_id'] = trim(getValue('prov_id'));
			$arr_input['city_id'] = trim(getValue('city_id'));
			$arr_input['status'] = intval(getValue('status'));
			$arr_input['address'] = trim(getValue('address'));
			$arr_input['lon'] = trim(getValue('lon'));
			$arr_input['lat'] = trim(getValue('lat'));
			
			$obj_shop = new Shop();
			$shop_id = $obj_shop->add($arr_input);
			
			if ($shop_id) {
				$detail = self::setMemoryData($shop_id);
				if(!Validate::isUpdateCache($detail)){
					$url = "/shop";
					echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "'. $url .'";</script>';
				}else
					header("Location:/shop");
			}
			
		}
	}
	
	public function modifyAction(){
		if(!isSubmit('isShopSubmit')){
			
			$id = intval(getValue('id'));
			$obj_area = new Area();
			$this->assign("area",$obj_area -> getAllList());
			$this->assign("shop",Shop::view($id));
			$this->view('shop/edit.html');
			
		} else {
			
			$arr_input = Array();
			$arr_input['id'] = trim(getValue('id'));
			$arr_input['name'] = trim(getValue('name'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_input['contact'] = trim(getValue('contact'));
			$arr_input['phone_no'] = trim(getValue('phone_no'));
			$arr_input['cell_phone'] = intval(getValue('cell_phone'));
			$arr_input['province_id'] = trim(getValue('prov_id'));
			$arr_input['city_id'] = trim(getValue('city_id'));
			$arr_input['status'] = intval(getValue('status'));
			$arr_input['address'] = trim(getValue('address'));
			$arr_input['lon'] = trim(getValue('lon'));
			$arr_input['lat'] = trim(getValue('lat'));
			
			$obj_shop = new Shop();
			$result = $obj_shop->modify($arr_input);
			
			if ($result) {
				$detail = self::setMemoryData($arr_input['id']);
				if(!Validate::isUpdateCache($detail)){
					$url = "/shop";
					echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "'. $url .'";</script>';
				}else
					header("Location:/shop");
			}
			
		}
	}
	
	public function delAction(){
		$arr_input = Array();
		$arr_input['id'] = trim(getValue('id'));
		$obj_shop = new Shop();
		$result = $obj_shop->delete($arr_input);
		if ($result) {
				header("Location:/shop");
		} else {
			echo "<scrip>alert('删除失败，请稍后再试');</script>";
		}
	}
	
	public function getAllListByCityId(){
		$city_id = intval(getValue('cityid'));
		$arr_list = Shop::getAllListByCityId($city_id);
		
		echo json_encode($arr_list);
	}
	
	//点击上线下线直接改变状态
	public function changeStatus(){
		$act = trim(getValue('status'));
		$id = trim(getValue('id'));
		
		$obj_shop = new Shop();
		$result = $obj_shop->updownShop($id, $act);
		
		echo $result;
	}
	
	public function multiShopAction() {
		$pid = intval(getValue('parentid',-1));
		$act = trim(getValue('statusOrder'));
		$ids = getValue('shopids');
		$action = trim(getValue('actionOrder'));
		$url = getFromUrl('');
		
		if($action == 'updownShopFlag') {
			$obj_shop = new Shop();
			$result = $obj_shop->updownShop($ids, $act);
		}
		if ($result){
			header("Location:" .$url);
		}
	}
	
	public function setMemorydata($ids = ''){
		if(!$ids)
			$ids = intval(getValue("id"));
		
		$data['ids'] = $ids;
		
		$detail = ap_core_post("SHOP_UPDATE_CACHE",$data);
		if(Validate::isUpdateCache($detail))
			$detail1 = ap_core_post("SHOP_INDEX_UPDATE_CACHE", $data);

		if (isSubmit('ajax') && !$is_data){
			die($detail1);
		}else{
			return $detail1;
		}
	}
	
	public function updateCacheAll(){
		$arr_all_list = Shop::getAllList();
		
		die(json_encode($arr_all_list));
	}
}