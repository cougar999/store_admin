<?php
class Combination{

	public function getPageList($product_id , $pageno = 1){
		$total_count = self::getCombinationListCount($product_id);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getCombinationList($product_id , $limit_query);
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
	
	public function getCombinationListCount($product_id){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from product_lnk_attribute";
		$str_query .= " where product_id = {$product_id}";
		
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getCombinationList($product_id){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product_lnk_attribute";
		$str_query .= " where product_id = {$product_id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function add($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " product_lnk_attribute";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", product_id = '{$arr_input['product_id']}'";
		$str_query .= ", attribute_value_ids = '{$arr_input['attribute_value_ids']}'";
		$str_query .= ", product_stock = '{$arr_input['product_stock']}'";
		$str_query .= ", price = '{$arr_input['price']}'";
		$str_query .= ", is_default = '{$arr_input['is_default']}'";
		$str_query .= ", title = '{$arr_input['title']}'";

		return DB::executeQuery($str_query);
	}
	
	public function modify($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " product_lnk_attribute";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if (array_key_exists('product_id', $arr_input)) {
			$str_query .= ", product_id = '{$arr_input['product_id']}'";
		}
		if (array_key_exists('attribute_value_ids', $arr_input)) {
			$str_query .= ", attribute_value_ids = '{$arr_input['attribute_value_ids']}'";
		}
		if (array_key_exists('product_stock', $arr_input)) {
			$str_query .= ", product_stock = '{$arr_input['product_stock']}'";
		}
		if (array_key_exists('price', $arr_input)) {
			$str_query .= ", price = '{$arr_input['price']}'";
		}
		if (array_key_exists('is_default', $arr_input)) {
			$str_query .= ", is_default = '{$arr_input['is_default']}'";
		}
		if (array_key_exists('title', $arr_input)) {
			$str_query .= ", title = '{$arr_input['title']}'";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		return DB::executeQuery($str_query);
	}
	
	public function view($id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from product_lnk_attribute"
					." where"
					." id = {$id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	/**
	 * 批量添加
	 * @param $arr_input
	 * 			int		['product_id']	(商品id)
	 * 			array	['attr_values']=>	(属性id集合)
	 * 					array([$attribute_id] => array($value1,$value2))
	 * 					array([$attribute_id] => array($value1,$value2))
	 * $return array(
	 * 				$value1 => boolean(true or false)
	 * 				$value2 => boolean(true or false)
	 * )				
	 */
	public function addBatch($arr_input){
		
		self::delProductAttrValueByProductId($arr_input['product_id']);
		foreach ((array)$arr_input['attr_values'] as $attribute_id => $values){
			foreach ((array)$values as $value_id){
				if(empty($value_id)) continue;
				unset($arr_values);
				$arr_values['product_id']	 = $arr_input['product_id'];
				$arr_values['attribute_id']	 = $attribute_id;
				$arr_values['value']		 = $value_id;

				$result[$arr_values['value']] = self::addProductAttrValue($arr_values);
			}
		}

		return $result;
	}
	
	public function addProductAttrValue($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " product_lnk_attrvalue";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", product_id = {$arr_input['product_id']}";
		$str_query .= ", attribute_id = {$arr_input['attribute_id']}";
		$str_query .= ", value = {$arr_input['value']}";
		return DB::executeQuery($str_query);
	}
	
	public function getProductAttrValueListByProductId($product_id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select value from product_lnk_attrvalue"
					. " where"
					. " product_id = {$product_id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		$arr_values = array();
		if (!$arr_output) return $arr_values;
		foreach ($arr_output as $row){
			$arr_values[] = $row['value'];
		}
		
		return $arr_values;
	}
	
	public function modifyProductAttrValue($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query = "update";
		$str_query .= " product_lnk_attrvalue";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if (array_key_exists('product_id', $arr_input)) {
			$str_query .= ", product_id = {$arr_input['product_id']}";
		}
		if (array_key_exists('attribute_id', $arr_input)) {
			$str_query .= ", attribute_id = {$arr_input['attribute_id']}";
		}
		if (array_key_exists('value', $arr_input)) {
			$str_query .= ", value = {$arr_input['product_stock']}";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		return DB::executeQuery($str_query);
	}
	
	public function delProductAttrValueByProductId($product_id){
		$dbh = DB::get_db_writer();
		$str_query = "delete from product_lnk_attrvalue where product_id  = {$product_id}";
		
		return DB::executeQuery($str_query);
	}
	
	public function delProductAttrValue($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "delete from product_lnk_attrvalue where"
					." id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
	
	public function delete($ids){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_ids = join(" or id = " , $ids);
		
		$str_query = "update product_lnk_attribute"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
					
		return DB::executeQuery($str_query);
	}
	
	public function idsexist($product_id, $ids){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from product_lnk_attribute"
					." where"
					."  product_id = {$product_id} and attribute_value_ids = '{$ids}'";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	
}