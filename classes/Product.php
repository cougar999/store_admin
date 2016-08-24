<?php
class Product extends COneTableModel{
	public function __construct(){
		parent::__construct('product');
	}
	
	public function getProductInfo($pra){
		$pageno 	   = intval(getValue('pageno',1));
		!isset($pra['status']) && $pra['status'] = '[*status*]>=0';
		
		$total_count   = $this->select(array('where'=>$pra,'sel'=>'count(*) counts'));
		$total_count   = $total_count[0]['counts'];
		if(0 < $total_count){
			$start_num   = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list    = $this->select(array('where'=>$pra,'ots'=>" {$limit_query}"));
		}else{
			$arr_list    = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']	= $total_count;
		$arr_output['count']		= $this->count;
		$arr_output['pageno']		= $pageno;
		$arr_output['items']		= $arr_list;
		
		return $arr_output;
	}
	
	public function getPageList($pageno = 1){
		unset($arr_input);
		$arr_input['chncode'] = $this->chncode;
		$total_count = self::getProductsListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getProductsList(null , $limit_query);
		}else{
			$arr_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_list;
		
		return $arr_output;
	}
	
	public function getProductsListCount($arr_input = array()){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from product where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getProductsList($arr_input = array(), $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$str_query .= " order by create_time desc";
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function getPageListByCategoryId($category_id , $pageno = 1){
		$total_count = self::getProductListCountByCategoryId($category_id);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getProductListByCategoryId($category_id , $limit_query);
		}else{
			$arr_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_list;
		
		return $arr_output;
	}
	
	public function getProductListCountByCategoryId($category_id) {
		$dbh = DB::get_db_reader();
		
		$str_query = "select count(*) from product"
					. " left join product_lnk_category on product.id = product_lnk_category.product_id"
					. " where product_lnk_category.category_id = {$category_id}"
					. " and product.status >= 0";

		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getProductListByCategoryId($category_id , $limit_query = null) {
		$dbh = DB::get_db_reader();
		
		$str_query = "select product.* from product"
					. " left join product_lnk_category on product.id = product_lnk_category.product_id"
					. " where product_lnk_category.category_id = {$category_id}"
					. " and product.status >= 0";

		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function getAllProductsList($chncode){
		$dbh = DB::get_db_reader();
		$str_query = "select id,name from product";
		$str_query .= " where status >= 0";
		$str_query .= " order by create_time desc";
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function viewProduct($product_id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from product"
					." where"
					." id = {$product_id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function getProductCate($product_id) {
		$dbh = DB::get_db_reader();
		
		$str_query = "select id,product_id,category_id,create_time,update_time from product_lnk_category"
					." where"
					." product_id = {$product_id}";

		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}

	public function getProductAttr($product_id) {
		$dbh = DB::get_db_reader();
	
		$str_query = "select distinct a.attribute_id, b.name as attribute_name from product_lnk_attrvalue a"
				.",product_attribute as b"
				." where a.attribute_id=b.id"
				." and a.product_id = {$product_id}";
	
		$arr_output = DB::selectQueryAssoc($str_query);
		
		$attr = array();
		foreach ($arr_output as $item) {
			$attr[$item['attribute_id']] = $item['attribute_name'];
		}
		return $attr;
	}
	
	public function getProductAttrValue($product_id) {
		$dbh = DB::get_db_reader();
	
		$str_query = "select a.id, a.attribute_id, b.name as attribute_name, a.value as value_id, c.value as value_name from product_lnk_attrvalue a"
				.",product_attribute as b,product_attribute_value as c"
				." where a.attribute_id=b.id and a.value=c.id"
				." and a.product_id = {$product_id}";

		$arr_output = DB::selectQueryAssoc($str_query);
		$attrvalue = array();
		if (!$arr_output) return $attrvalue;
		foreach ($arr_output as $item) {
			$attrvalue[$item['attribute_id']][$item['value_id']] = array(
					'attribute_id'=>$item['attribute_id'], 
					'attribute_name'=>$item['attribute_name'],
					'value_id'=>$item['value_id'], 
					'value_name'=>$item['value_name']);
		}
		return $attrvalue;
	}
		
	public function getProductAttrCross($product_id) {
		$dbh = DB::get_db_reader();
	
		$str_query = "select id, attribute_value_ids, product_stock, price, is_default, title from product_lnk_attribute"
				." where"
				." product_id = {$product_id}";
	
		$arr_output = DB::selectQueryAssoc($str_query);
	
		$attrvalue = array();
		if (!$arr_output) return $attrvalue;
		foreach ($arr_output as $item) {
			/*
			$ids = explode('(', $item['attribute_value_ids']);
			foreach ($ids as $id) {
				$pos = strpos($id, ')');
				if ($pos !== false) {
					$attrvalue_id = substr($id, 0, $pos);
					$value_id = substr($id, $pos + 1);
					$item[cross]["($attrvalue_id)$value_id"] = array('attribute_id'=> $attrvalue_id, 'value_id'=>$value_id);
				}
			}
			*/
			$attrvalue[$item['attribute_value_ids']] = $item;
		}
		return $attrvalue;
	}
	
	public function getProductCross($attrvalue, $attrcross, $next=0, $last=null) {
		$attr = array_keys($attrvalue);
		$cross = $attrvalue[$attr[$next]];
		if (!$cross) return $attrvalue;
		$new = array();
		foreach ($cross as $cross_item) {
			if ($last) {
				foreach ($last as $last_item) {
					$last_item = $last_item['item'];
					if ($next > 1) {
						$item = array();
						foreach ($last_item as $child) {
							$item["($child[attribute_id])$child[value_id]"] = $child;
						}
						$item["($cross_item[attribute_id])$cross_item[value_id]"] = $cross_item;
						$code = '';
						foreach ($item as $value) {
							$code .= "($value[attribute_id])$value[value_id]";
						}
						$new[$code] = $attrcross[$code];
						$new[$code]['item'] = $item;
					} else {
						$item = array();
						$item["($last_item[attribute_id])$last_item[value_id]"] = $last_item;
						$item["($cross_item[attribute_id])$cross_item[value_id]"] = $cross_item;
						$code = '';
						foreach ($item as $value) {
							$code .= "($value[attribute_id])$value[value_id]";
						}
						$new[$code] = $attrcross[$code];
						$new[$code]['item'] = $item;
					}
				}
			} else {
				$code = "($cross_item[attribute_id])$cross_item[value_id]";				
				$new[$code] = $attrcross[$code];
				$new[$code]['item'] = $cross_item;
			}
		}
		
		if ($new) $cross = $new;		
		if ($next < (count($attr) - 1)) {
			$cross = Product::getProductCross($attrvalue, $attrcross, $next+1, $cross);
		}
		ksort($cross);
		return $cross;
	}
		
	public function addProduct($arr_input){
		$product_id = self::addProductCore($arr_input);
		if($product_id){
			unset($arr_input_category);
			$arr_input_category['product_id'] = $product_id;
			$arr_input_category['category_id'] = $arr_input['category_id'];
			$arr_input_category['category_type'] = $arr_input['category_type'];
			$arr_input_category['product_order'] = $arr_input['product_order'];
			$cate_result = self::addProductCategory($arr_input_category);
			if ($cate_result){
				return $product_id;
			}
		}
	}
	
	public function addProductCore($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "insert into";
		$str_query .= " product";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", name = '{$arr_input['name']}'";
		$str_query .= ", title = '{$arr_input['title']}'";
		$str_query .= ", description = '{$arr_input['description']}'";
		$str_query .= ", ext_desc = '{$arr_input['ext_desc']}'";
		$str_query .= ", pack_list = '{$arr_input['pack_list']}'";
		$str_query .= ", default_image = '{$arr_input['default_image']}'";
		$str_query .= ", status = {$arr_input['status']}";
		$str_query .= ", service = '{$arr_input['service']}'";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", product_spec = '{$arr_input['product_spec']}'";
		$str_query .= ", original_price = {$arr_input['original_price']}";
		$str_query .= ", original_price_name = '{$arr_input['original_price_name']}'";
		$str_query .= ", use_price = {$arr_input['use_price']}";
		$str_query .= ", use_price_name = '{$arr_input['use_price_name']}'";
		$str_query .= ", dicount_price = {$arr_input['dicount_price']}";
		$str_query .= ", discount_price_name='{$arr_input['discount_price_name']}'";
		$str_query .= ", last_updater='{$arr_input['last_updater']}'";
		$str_query .= ", stock = '{$arr_input['stock']}'";
		
		$result = DB::executeQuery($str_query);
		if($result)
			return $product_id = DB::getInsertId();
	}
	
	public function addProductCategory($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "insert into";
		$str_query .= " product_lnk_category";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= " , product_id = {$arr_input['product_id']}";
		$str_query .= " , category_id = {$arr_input['category_id']}";
		$str_query .= " , category_type = {$arr_input['category_type']}";
		$str_query .= " , product_order = {$arr_input['product_order']}";
		$result = DB::executeQuery($str_query);
		return $result;
	}
	
	public function modifyProduct($arr_input){
		$result = self::modifyProductCore($arr_input);
		if($result){
			$arr_input['product_id'] = $arr_input['id'];
			return self::modifyProductCategory($arr_input);
		}
	}
	
	public function modifyProductCore($arr_input){
		$dbh = DB::get_db_writer();
		
		$str_query .= "update";
		$str_query .= " product";
		$str_query .= " set";
		$str_query .= " name='{$arr_input['name']}'";
		if (array_key_exists('title', $arr_input)) {
			$str_query .= ", title='{$arr_input['title']}'";
		}
		if (array_key_exists('description', $arr_input)) {
			$str_query .= ", description='{$arr_input['description']}'";
		}
		if (array_key_exists('ext_desc', $arr_input)) {
			$str_query .= ", ext_desc='{$arr_input['ext_desc']}'";
		}
		if (array_key_exists('pack_list', $arr_input)) {
			$str_query .= ", pack_list='{$arr_input['pack_list']}'";
		}
		if (array_key_exists('default_image', $arr_input)) {
			$str_query .= ", default_image='{$arr_input['default_image']}'";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= ", status={$arr_input['status']}";
		}
		if (array_key_exists('service', $arr_input)) {
			$str_query .= ", service='{$arr_input['service']}'";
		}
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode='{$arr_input['chncode']}'";
		}
		if (array_key_exists('product_spec', $arr_input)) {
			$str_query .= ", product_spec='{$arr_input['product_spec']}'";
		}
		if (array_key_exists('original_price', $arr_input)) {
			$str_query .= ", original_price={$arr_input['original_price']}";
		}
		if (array_key_exists('original_price_name', $arr_input)) {
			$str_query .= ", original_price_name='{$arr_input['original_price_name']}'";
		}
		if (array_key_exists('use_price', $arr_input)) {
			$str_query .= ", use_price={$arr_input['use_price']}";
		}
		if (array_key_exists('use_price_name', $arr_input)) {
			$str_query .= ", use_price_name='{$arr_input['use_price_name']}'";
		}
		if (array_key_exists('dicount_price', $arr_input)) {
			$str_query .= ", dicount_price={$arr_input['dicount_price']}";
		}
		if (array_key_exists('discount_price_name', $arr_input)) {
			$str_query .= ", discount_price_name='{$arr_input['discount_price_name']}'";
		}
		if (array_key_exists('last_updater', $arr_input)) {
			$str_query .= ", last_updater='{$arr_input['last_updater']}'";
		}
		if (array_key_exists('stock', $arr_input)) {
			$str_query .= ", stock='{$arr_input['stock']}'";
		}
		$str_query .= " where id = {$arr_input['id']}";

		return DB::executeQuery($str_query);
	}
	
	public function modifyProductCategory($arr_input){
		$dbh = DB::get_db_writer();
		
		$str_query .= "update";
		$str_query .= " product_lnk_category";
		$str_query .= " set";
		$str_query .= " update_time = '" . DB::currentTime() . "'";
		if (array_key_exists('category_id', $arr_input)) {
			$str_query .= ", category_id={$arr_input['category_id']}";
		}
		if (array_key_exists('category_type', $arr_input)) {
			$str_query .= ", category_type={$arr_input['category_type']}";
		}
		if (array_key_exists('products_order', $arr_input)) {
			$str_query .= ", products_order={$arr_input['products_order']}";
		}
		$str_query .= " where product_id = {$arr_input['product_id']}";
				
		return DB::executeQuery($str_query);
	}
	
	public function deleteProduct($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update product"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
		return DB::executeQuery($str_query);
	}
	
	public function getImageAllListByProductId($product_id){
		unset($arr_input);
		$arr_input['product_id'] = $product_id;
		$total_count = self::getProductImageListCount($arr_input);
		if($total_count > 0){
			$str_filed = 'id , product_id , url , name , description , `order`';
			$arr_image_list = self::getProductImageList($arr_input , null , $str_filed);
		}else {
			$arr_image_list = array();
		}
		return $arr_image_list;
	}
	
	public function getProductImageListCount($arr_input){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from product_image";
		$str_query .= " where product_id = {$arr_input['product_id']}";
		
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getProductImageList($arr_input , $limit_query = null , $str_filed = '*'){
		$dbh = DB::get_db_reader();
		$str_query = "select {$str_filed} from product_image";
		$str_query .= " where product_id = {$arr_input['product_id']}";
		
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function addImage($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "insert into";
		$str_query .= " product_image";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		if (array_key_exists('product_id', $arr_input)) {
			$str_query .= " , product_id = {$arr_input['product_id']}";
		}
		$str_query .= " , type = {$arr_input['type']}";
		$str_query .= " , url = '{$arr_input['url']}'";
		$str_query .= " , name = '{$arr_input['name']}'";
		$str_query .= " , `order` = {$arr_input['order']}";
		$str_query .= " , locate_type = {$arr_input['locate_type']}";
		$str_query .= " , description = '{$arr_input['description']}'";
		
		return DB::executeQuery($str_query);
	}
	
	public function updateImage($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$ids  = (array)$arr_input['img_id'];
		
		$str_query .= "update";
		$str_query .= " product_image";
		$str_query .= " set";
		$str_query .= " product_id = '{$arr_input['product_id']}'";
		$str_query .= " where id in (".implode(',',$ids).")";
		return DB::executeQuery($str_query);
	}
	
	public function delImage($id , $product_id = null){
		$dbh = DB::get_db_writer();
		
		$str_query = "delete from product_image"
					." where";
		if($product_id != null){
			$str_query .= " product_id  = $product_id";
		}else{
			$str_query .= " id  = $id";
		}
		
		return DB::executeQuery($str_query);
	}
	
	public function updownProduct($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "update";
		$str_query .= " product";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if ($act == 1) {
			$str_query .= " ,status = 0";
			$str_query .= " where status = 1";
		}
		if($act == 0) {
			$str_query .= " ,status = 1";
			$str_query .= " where status = 0";
		}
		if(is_array($ids)){
			$str_ids = join("," ,$ids);
			$str_query .= " and id in ($str_ids)";
		}else{
			$str_query .= " and id  = $ids";
		}
		return DB::executeQuery($str_query);
	}
	
}