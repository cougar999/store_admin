<?php
class Attribute{
	
	public function __construct(){
	}
	
	public function getAttributeAllList(){
		$total_count = self::getAttributeListCount($arr_input);
		if($total_count > 0){
			$arr_attr_list = self::getAttributeList($limit_query);
		}else{
			$arr_attr_list = array();
		}
		
		return $arr_attr_list;
	}
	
	public function getPageList($pageno = 1){
	
		$total_count = self::getAttributeListCount();
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			
			$arr_attr_list = self::getAttributeList($limit_query);
			
			$ids_attribute = array();
			foreach ($arr_attr_list as $row){
				$ids_attribute[] = $row['id'];
			}
			$arr_attr_value_list = self::getAttriValueListCount($ids_attribute);
			
			foreach ($arr_attr_list as $key => $row){
				$arr_attr_list[$key]['values_count'] = $arr_attr_value_list[$row['id']];
			}
			
		}else{
			$arr_attr_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_attr_list;
		
		return $arr_output;
	}
	
	/**
	 * @description: this function is get attribute list count;
	 * @param : $arr_input
	 * @return :int
	 */
	public function getAttributeListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from product_attribute";
		
		$arr_output = DB::selectQuery($str_query);
		return $arr_output[0][0];
	}
	
	public function getAttributeList($limit_query = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product_attribute";
		
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
	public function addAttribute($arr_input){
		$dbh = DB::get_db_writer();
		$create_time = DB::currentTime();
		$str_query = "insert into product_attribute set"
					. " name = '{$arr_input['name']}'"
					. " , create_time = '{$create_time}'";
		
		return $result = DB::executeQuery($str_query);
	}
	
	public function viewAttribute($attribute_id){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product_attribute where id = {$attribute_id}";
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function modifyAttribute($arr_input){
		$dbh = DB::get_db_writer();
		$update_time = DB::currentTime();
		$str_query = "update product_attribute set"
					. " name = '{$arr_input['name']}'"
					. " , update_time = '{$update_time}'"
					. " where id = {$arr_input['id']}";
		
		return $result = DB::executeQuery($str_query);
		
	}
	
	public function deleteAttribute($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)) {
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "delete from product_attribute"
					." where"
					." id  = {$str_ids}";
					
		return DB::executeQuery($str_query);
	}
	
	public function getAttriValueListCount($attribute_ids){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) as total_count , attribute_id from product_attribute_value";
		
		if(!is_array($attribute_ids)){
			$str_query .= " where attribute_id = $ids_attribute";
		}else{
			$str_attribute_ids = join("," , $attribute_ids);
			$str_query .= " where attribute_id in ($str_attribute_ids)";
			$str_query .= " group by attribute_id";
		}
		
		$rows = DB::selectQueryAssoc($str_query);
		
		unset($arr_output);
		if(count($rows) <= 0)
			return ; 
		foreach ($rows as $row){
			$arr_output[$row['attribute_id']] = $row['total_count'];
		}
		
		return $arr_output;
	}
	
	public function getAttriValueList($attribute_ids){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product_attribute_value";
		
		if(!is_array($attribute_ids)){
			$str_query .= " where attribute_id = $attribute_ids";
		}else{
			$str_attribute_ids = join("," , $attribute_ids);
			$str_query .= " where attribute_id in ($str_attribute_ids)";
		}
		
		$rows = DB::selectQueryAssoc($str_query);
		
		unset($arr_output);
		if(!empty($rows))
			foreach ($rows as $row){
				$arr_output[$row['attribute_id']][] = $row;
			}
		return $arr_output;
	}
	
	public function addAttriValue($arr_input){
		$dbh = DB::get_db_writer();
		$create_time = DB::currentTime();
		$str_query = "insert into product_attribute_value set"
					. " attribute_id = '{$arr_input['attribute_id']}'"
					. " , value = '{$arr_input['value']}'"
					. " , create_time = '{$create_time}'";
		
		return $result = DB::executeQuery($str_query);
		
	}
	
	public function viewAttriValue($id_attribut_value){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product_attribute_value where id = {$id_attribut_value}";
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function modifyAttriValue($id_attribute_value , $arr_input){
		$dbh = DB::get_db_writer();
		$update_time = DB::currentTime();
		$str_query = "update product_attribute_value set"
					. " attribute_id = '{$arr_input['attribute_id']}'"
					. " , value = '{$arr_input['value']}'"
					. " , update_time = '{$update_time}'"
					. " where id = {$id_attribute_value}";
		
		return $result = DB::executeQuery($str_query);
	}
	
	public function delteAttriValue($id_attribut_value){
		$dbh = DB::get_db_writer();
		
		$str_query = "delete from product_attribute_value"
					." where"
					." id  = {$id_attribut_value}";
					
		return DB::executeQuery($str_query);
	}
	
}

?>