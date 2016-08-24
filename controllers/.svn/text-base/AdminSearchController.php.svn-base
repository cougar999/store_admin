<?php
class AdminSearchController extends AdminController{
	
	private $_table     = 'shop';
	private $_tableType = 0;
	private $_oSearch   = null;
	private $_CF_       = array(
		'table'=>array('shop','product','product_category','product_attribute','b_node_publish','pm_promote','order')
	);

	public function __construct(){
		$this->_tableType = getValue('_table',0);
		$this->_table     = in_array(getValue('table'),$this->_CF_['table'])?getValue('table'):$this->_table;
		$this->_oSearch   = !$this->_tableType?new COneTableModel($this->_table):null;
		
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$_REQUEST['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
		$_REQUEST['chncode'] = "[*chncode*]='{$_REQUEST['chncode']}'";
		
		$pageno = intval(getValue('pageno',1));
		$pra    = $_REQUEST;
		(!isset($pra['status'])||''==$pra['status']) && $pra['status'] = '[*status*]>=0';
		
		$total_count   = $this->_oSearch->select(array('where'=>$pra,'sel'=>'count(*) counts'));
		$total_count   = $total_count[0]['counts'];
		if(0 < $total_count){
			$start_num   = ($pageno-1) * $this->count;
			$limit_query = (in_array($this->_table,array('product','pm_promote','shop'))?" order by {$this->_oSearch->tm_prikey} desc ":"")."limit " . $start_num . " , " . $this->count;
			$arr_list    = $this->_oSearch->select(array('where'=>$pra,'ots'=>" {$limit_query}"));
		}else{
			$arr_list    = array();
		}
		//以表为维度对数据进行再处理
		if('product_attribute' == $this->_table){
			$ids_attribute = array();
			foreach ($arr_list as $row){
				$ids_attribute[] = $row['id'];
			}
			if(0 < count($ids_attribute)){
				$arr_attr_value_list = Attribute::getAttriValueListCount($ids_attribute);
				foreach ($arr_list as $key => $row){
					$arr_list[$key]['values_count'] = $arr_attr_value_list[$row['id']];
				}
			}
		}elseif('product' == $this->_table){
			foreach($arr_list as $key => $row){
				$arr_list[$key]['original_price']	 = mathOutPrice($row['original_price']);
				$arr_list[$key]['use_price']		 = mathOutPrice($row['use_price']);
				$arr_list[$key]['dicount_price']	 = mathOutPrice($row['dicount_price']);
				
				$parentid = Product::getProductCate($row['id']);
				if(!empty($parentid)){
					if(-1 == $parentid['category_id']) $arr_list[$key]['product_class'] = array(array('id'=>'-1','name'=>'顶级分类'));
					else{
						$arr_list[$key]['product_class'] = Category::getCategoryPageTitle($parentid['category_id']);
						$arr_list[$key]['product_class'] = array_reverse($arr_list[$key]['product_class']);
					}
				}else{
					unset($arr_list[$key]);
				}
			}
		}
		
		unset($arr_output);
		$arr_output['total_count']	= $total_count;
		$arr_output['count']		= $this->count;
		$arr_output['pageno']		= $pageno;
		$arr_output['items']		= $arr_list;
		
		$obj_area = new Area();
		$this->assign("area",$obj_area -> getAllList());
		$this->assign('page', $arr_output);
		
		$this->view(getValue('view_tpl',$this->_table).'/'.getValue('view_page','index.html'),getValue('view_layout','layout.html'));
	}
}