<?php
class AdminOrderController extends AdminController{

	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		$page = Order::getPageList($pageno);
		foreach($page['items'] as $key => $row){
			$page['items'][$key]['total_price']	 = mathOutPrice($row['total_price']);
			$page['items'][$key]['total_payment']	 = mathOutPrice($row['total_payment']);
			$page['items'][$key]['discount']	 = mathOutPrice($row['discount']);
		}
		$this->assign('page', $page);
		$this->view('order/index.html');
	}
	
	public function viewDetailAction(){
		$id = trim(getValue('id'));
		$info = Order::view($id);
		$detail_list = Order::viewDetail($id);
		$info['total_price'] = mathOutPrice($info['total_price']);
		$info['total_payment'] = mathOutPrice($info['total_payment']);
		foreach ($detail_list as $key => $row){
			$detail_list[$key]['product_price']	 = mathOutPrice($row['product_price']);
			$detail_list[$key]['product_cprice']	 = mathOutPrice($row['product_cprice']);
			$detail_list[$key]['discount']	 = mathOutPrice($row['discount']);
		}
		$this->assign('info', $info);
		$this->assign('detail_list', $detail_list);
		$this->view('order/view_detail.html');
	}
}