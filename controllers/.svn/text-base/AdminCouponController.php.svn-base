<?php
class AdminCouponController extends AdminController{

	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		
		$this->assign('page', Coupon::getPageList($pageno));
		$this->view('promote/addCoupon.html');
	}
	
	public function addAction(){
		if(!isSubmit('isCouponSubmit')){
			
			$this->view('coupon/add.html','layout_block.html');
			
		} else {
			
			$arr_input = Array();
			$arr_input['title'] = trim(getValue('title'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_input['description'] = trim(getValue('description'));
			$arr_input['content'] = trim(getValue('content'));
			if(!empty($_FILES['img']['name'])){
				$obj_img = new Image();
				$arr_input['img'] = $obj_img->uploadFile($_FILES['img']); 
			}else{
				$arr_input['img'] = '';
			}
			$arr_input['start_time'] = trim(getValue('start_time'));
			$arr_input['end_time'] = trim(getValue('end_time'));
			$arr_input['total'] = trim(getValue('total'));
			$arr_input['count'] = intval(getValue('count'));
			$arr_input['status'] = trim(getValue('status'));
			
			$obj_coup = new Coupon();
			$result = $obj_coup->addCoupon($arr_input);
			if ($result)
			$content_id = DB::getInsertId();
			
			$arr_inputCoupon = Array();
			$arr_inputCoupon['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_inputCoupon['prom_id'] = intval(getValue('id'));
			$arr_inputCoupon['content_id'] = $content_id;
			$arr_inputCoupon['type'] = intval(getValue('type',1));
			$arr_inputCoupon['status'] = intval(getValue('status'));
			
			$obj_prom = new Promote();
			$presult = $obj_prom->addPromLink($arr_inputCoupon);
			
			if ($presult) {
				echo "<script>parent.$.colorbox.close();parent.window.location.reload(parent.location.href);</script>";
			}
			
		}
	}
	
	public function modifyAction(){
		if(!isSubmit('isCouponSubmit')){
			
			$id = intval(getValue('id'));
			$this->assign("coupon",Coupon::view($id));
			$this->view('coupon/edit.html', 'layout_block.html');
			
		} else {
			
			$arr_input = Array();
			$arr_input['id'] = trim(getValue('id'));
			$arr_input['title'] = trim(getValue('title'));
			$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$arr_input['description'] = trim(getValue('description'));
			$arr_input['content'] = trim(getValue('content'));
			if(!empty($_FILES['img']['name'])){
				$obj_img = new Image();
				$arr_input['img'] = $obj_img->uploadFile($_FILES['img']); 
			}
			$arr_input['start_time'] = trim(getValue('start_time'));
			$arr_input['end_time'] = trim(getValue('end_time'));
			$arr_input['total'] = trim(getValue('total'));
			$arr_input['count'] = intval(getValue('count'));
			$arr_input['status'] = trim(getValue('status'));
			
			$obj_coup = new Coupon();
			$result = $obj_coup->modifyCoupon($arr_input);
			
			if ($result) {
				echo "<script>parent.$.colorbox.close();parent.window.location.reload(parent.location.href);</script>";
			}
			
		}
	}
	
	public function delAction(){
		$pid = trim(getValue('pid'));
		$linkid = trim(getValue('linkid'));
		$arr_input = Array();
		$arr_input['id'] = trim(getValue('id'));
		
		$obj_coup = new Coupon();
		$result = $obj_coup->deleteCoupon($arr_input);
		
		$obj_coupLink = new Promote();
		$cresult = $obj_coupLink->delPromLinkList($linkid); // 删除关联表id
		
		if ($result && $cresult) {
			header("Location:/promote?action=modifyAction&id=" .$pid);
		} else {
			echo "<script>alert('删除失败，请稍后再试');</script>";
		}
	}
	
	//点击上线下线直接改变状态
	public function changeStatus(){
		$act = trim(getValue('status'));
		$id = trim(getValue('id'));
		
		$obj_coupon = new Coupon();
		$result = $obj_coupon->updownCoupon($id, $act);
		
		echo $result;
	}
	
	/*public function multiCouponAction() {
		$pid = intval(getValue('parentid',-1));
		$act = trim(getValue('statusOrder'));
		$ids = getValue('couponids');
		$action = trim(getValue('actionOrder'));
		$url = getFromUrl('');
		
		if($action == 'updownCouponFlag') {
			$obj_coupon = new Coupon();
			$result = $obj_coupon->updownCoupon($ids, $act);
		}
		if ($result){
			header("Location:" .$url);
		}
	}*/
	
	
}