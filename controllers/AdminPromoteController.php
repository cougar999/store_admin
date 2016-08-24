<?php
class AdminPromoteController extends AdminController{
	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		$obj_area = new Area();
		$this->assign("area",$obj_area -> getAllList());
		$this->assign('page', Promote::getPageList($pageno));
		$this->view('promote/index.html');
	}
	
	public function addAction(){
		if(!isSubmit('isPromoteSubmit')){
			$obj_area = new Area();
			$this->assign("area",$obj_area -> getAllList());
			$this->view('promote/add.html');
			
		} else {
			$shoptype = intval(getValue('shoptype'));
			$city_id = intval(getValue('city_id'));
			$arr_input = Array();
			$arr_input['title'] = trim(getValue('title'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_input['description'] = trim(getValue('description'));
			$arr_input['content'] = trim(getValue('content'));
			$arr_input['shoptype'] = $shoptype;
			$arr_input['prov_id'] = intval(getValue('prov_id'));
			$arr_input['city_id'] = $city_id;
			$arr_input['status'] = intval(getValue('status'));
			
			$obj_prom = new Promote();
			$prom_id = $obj_prom->addPromote($arr_input);
			
			unset($arr_input_shop);
				$arr_input_shop['prom_id'] = $prom_id;
				$arr_input_shop['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			if(1 == $shoptype){
				$arr_input_shop['shopids'] = getValue('shopids');
			}elseif(0 == $shoptype){
				$arr_shop_list = Shop::getAllListByCityId($city_id);
				unset($a_shop_hash_list);
				foreach($arr_shop_list as $row){
					$a_shop_hash_list[] = $row['id'];
				}
				$arr_input_shop['shopids'] =$a_shop_hash_list;
			}
			$result_shop = $obj_prom->modifyLinkPromShop($arr_input_shop);
			
			if ($prom_id > 0 && $result_shop) {
				$detail = self::setMemoryData($prom_id);
				if(!Validate::isUpdateCache($detail)){
					$url = "/promote";
					echo '<!DOCTYPE html><html><head><meta charset="utf-8"><script language="javascript">alert("缓存更新失败!");window.location.replace("'. $url .'");</script></head><body></body></html>';
				}else
					self::setMemoryAll();
				header("Location:/promote?action=modifyAction&id=" .$prom_id);
			}
			
		}
	}
	
	public function modifyAction(){
		if(!isSubmit('isPromoteSubmit')){
			
			$prom_id = trim(getValue('id'));
			$this->assign('prom_link', Promote::getContentByPromId($prom_id));
			$this->assign('prom_link_shop', json_encode(Promote::getLinkShopByPromId($prom_id)));
			$this->assign('prom', Promote::viewPromote($prom_id));
			$this->assign('prom_link_info' , Promote::getPromLinkList());
			
			$obj_area = new Area();
			$this->assign("area",$obj_area -> getAllList());
			
			$this->view('promote/edit.html');
			
		} else {
			$prom_id = intval(getValue('id'));
			$city_id = intval(getValue('city_id'));
			$arr_input = Array();
			$arr_input['id'] = intval(getValue('id'));
			$arr_input['title'] = trim(getValue('title'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_input['description'] = trim(getValue('description'));
			$arr_input['content'] = trim(getValue('content'));
			$arr_input['shoptype'] = intval(getValue('shoptype'));
			$arr_input['prov_id'] = trim(getValue('prov_id'));
			$arr_input['city_id'] = $city_id;
			$arr_input['status'] = intval(getValue('status'));
			
			$obj_prom = new Promote();
			$result = $obj_prom->modifyPromote($arr_input);
			
			unset($arr_input_shop);
				$arr_input_shop['prom_id'] = $prom_id;
				$arr_input_shop['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			if(1 == $shoptype){
				$arr_input_shop['shopids'] = getValue('shopids');
			}elseif(0 == $shoptype){
				$arr_shop_list = Shop::getAllListByCityId($city_id);
				unset($a_shop_hash_list);
				foreach($arr_shop_list as $row){
					$a_shop_hash_list[] = $row['id'];
				}
				$arr_input_shop['shopids'] =$a_shop_hash_list;
			}
			$result_shop = $obj_prom->modifyLinkPromShop($arr_input_shop);
			
			if ($result && $result_shop) {
				$detail = self::setMemoryData($arr_input['id']);
				if(!Validate::isUpdateCache($detail)){
					$url = "/promote?action=modifyAction&id=" . $arr_input['id'];
					echo '<!DOCTYPE html><html><head><meta charset="utf-8"><script language="javascript">alert("缓存更新失败!");window.location.replace("'. $url .'");</script></head><body></body></html>';
				}else
					self::setMemoryAll();
				header("Location:/promote");
				//header("Location:/promote?action=modifyAction&id=" .$arr_input['id']);
			}
			
		}
	}
	
	public function delAction(){
		$id = intval(getValue('id'));
		$status = intval(getValue('status'));
		$arr_input = Array();
		$arr_input['id'] = $id;
		$arr_input['status'] = $status;
		if($status != 0){
			echo '<!DOCTYPE html><html><head><meta charset="utf-8"><script language="javascript">alert("请先下线该内容后再删除！");window.location.replace("/promote");</script></head><body></body></html>';
			exit;
		}
		$obj_prom = new Promote();
		$result = $obj_prom->deletePromote($arr_input);
		if ($result) {
			$detail = self::setMemoryData($id);
			if(!Validate::isUpdateCache($detail)){
				$url = "/promote";
				echo '<!DOCTYPE html><html><head><meta charset="utf-8"><script language="javascript">alert("缓存更新失败!");window.location.replace("'. $url .'");</script></head><body></body></html>';
				exit;
			}else
				self::setMemoryAll();
			header("Location:/promote");
		} else {
			echo '<!DOCTYPE html><html><head><meta charset="utf-8"><script language="javascript">alert("删除失败，请稍后再试");window.location.replace("/promote");</script></head><body></body></html>';
		}
	}
	
	public function getCitylist() {
		$obj_area = new Area();
		$result = $obj_area->getAllList();
		echo json_encode($result);
	}
	
	public function setMemorydata($prom_id = 0 , $is_data = false){
		if($prom_id == 0){
			$prom_id = intval(getValue("id"));
		}
		unset($arr_promote);
		unset($data);
		$arr_promote['info'] = Promote::viewPromote($prom_id);
		$arr_promote['prom_link'] = Promote::getContentByPromId($prom_id);
		
		$data['promote'] = json_encode($arr_promote);
		$detail = ap_core_post("PROMOTE_UPDATE_CACHE",$data);
		if (isSubmit('ajax') && !$is_data){
			die($detail);
		}else{
			return $detail;
		}
	}
	
	public function setMemoryAll(){
		$detail = ap_core_post("PROMOTE_ALL_UPDATE_CACHE");
		if (isSubmit('ajax')){
			die($detail);
		}else{
			return $detail;
		}
	}
	
	public function setMemoryDataAction(){
		$id = intval(getValue("id"));
		$detail = self::setMemorydata($id , true);
		if(Validate::isUpdateCache($detail))
			$detail1 = self::setMemoryAll();
		die($detail1);
	}
	
	public function updateCacheAll(){
		$arr_all_list = Promote::getAllPromoteList();
		
		die(json_encode($arr_all_list));
	}
	
	//点击上线下线直接改变状态
	public function changeStatus(){
		$act = trim(getValue('status'));
		$id = trim(getValue('id'));
		
		$obj_prom = new Promote();
		$result = $obj_prom->updownPromote($id, $act);
		
		echo $result;
	}
	
	public function multiPromAction() {
		$pid = intval(getValue('parentid',-1));
		$act = trim(getValue('statusOrder'));
		$ids = getValue('promids');
		$action = trim(getValue('actionOrder'));
		$url = getFromUrl('');
		
		if($action == 'updownPromFlag') {
			$obj_prom = new Promote();
			$result = $obj_prom->updownPromote($ids, $act);
		}
		if ($result){
			header("Location:" .$url);
		}
	}
}