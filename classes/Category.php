<?php
class Category{
	
	public function getPageList($parentid = -1 , $pageno = 1){
		unset($arr_input);
		$arr_input['pid'] = $parentid;
		$arr_input['chncode'] = $this->chncode;
		$total_count = self::getCategoryListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_category_list = self::getCategoryList($arr_input , $limit_query);
		}else{
			$arr_category_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_category_list;

		return $arr_output;
	}
	
	public function getChildList($parentid){
		unset($arr_input);
		$arr_input['pid']		 = $parentid;
		$arr_input['status']	 = 1;
		
		$total_count = self::getCategoryListCount($arr_input);
		if($total_count > 0){
			$arr_category_list = self::getCategoryList($arr_input);
		}else{
			$arr_category_list = array();
		}
		
		unset($arr_output);
		$arr_output = $arr_category_list;
		
		return $arr_output;
	}
	
	public function getAllList($arr_input = '' , $is_prefix = false){
		$total_count = self::getCategoryListCount($arr_input);
		if($total_count > 0){
			$arr_category_list = self::getCategoryList($arr_input);
			$arr_category_hash_list = array();
			foreach ($arr_category_list as $row){
					$arr_category_hash_list[$row['pid']][$row['id']] = $row;
			}
			
			return $arr_category_tree = self::getLevelCategory(-1 , $arr_category_hash_list , array() , '' , $is_prefix);
		}
	}
	
	public function getCategoryPageTitle($category_id , $i = 0 , $arr_hash_info = array()){
		$arr_info = self::view($category_id);
		
		$arr_hash_info[$i]['id'] = $arr_info['id'];
		$arr_hash_info[$i]['name'] = $arr_info['name'];
		$i++;
		
		if($arr_info['pid'] != '-1'){
			$cate_id = $arr_info['pid'];
			$arr_hash_info = self::getCategoryPageTitle($cate_id , $i , $arr_hash_info);
		}
		return $arr_hash_info;
	}
	
	public function getLevelCategory($id , $arr_category_hash_list ,$arr_category_tree = array() , $name = '' , $is_prefix = false){
		if(!$is_prefix)
			$name .= '&nbsp;&nbsp;-&nbsp;&nbsp;';
		foreach ($arr_category_hash_list[$id] as $key => $row){
			$row['name'] = $name.$row['name'].$name;
			$arr_category_tree[] = $row;
			if(!array_key_exists($key,$arr_category_hash_list)){
				continue;
			}else{
				$arr_category_tree = self::getLevelCategory($key , $arr_category_hash_list , $arr_category_tree , $name , $is_prefix);
			}
		}
		return $arr_category_tree;
	}
	
	/**
	 * @description: this function is get category list count;
	 * @param : $arr_input
	 * @return :int
	 */
	public function getCategoryListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from product_category";
		$str_query .= " where status >= 0";
		$str_query .= " and chncode = {$this->chncode}";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		return $arr_output[0][0];
	}
	
	public function getCategoryList($arr_input = '', $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from product_category";
		$str_query .= " where status >= 0";
		$str_query .= " and chncode = {$this->chncode}";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
	/**
	 * add category
	 *
	 * @param array $arr_input
	 * @return boolean true,false
	 */
	public function add($arr_input){
		$dbh = DB::get_db_writer();
		
		$create_time = DB::currentTime();
		
		$str_query = "insert into product_category set"
					." pid = {$arr_input['pid']}"
					." , name = '{$arr_input['name']}'"
					." , description = '{$arr_input['description']}'"
					." , icon = '{$arr_input['icon']}'"
					." , class_type = {$arr_input['class_type']}"
					." , recommend_product_ids = '{$arr_input['recommend_product_ids']}'"
					." , status = {$arr_input['status']}"
					.", chncode = '{$arr_input['chncode']}'"
					." , create_time = '{$create_time}'";
		$result = DB::executeQuery($str_query);
		
		if(!$result){
			return false; 
		}else{
			return $category_id = DB::getInsertId();
		}
	}
	
	public function view($id_category){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from product_category"
					." where"
					." id = {$id_category}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function modify($arr_input){
	
		$dbh = DB::get_db_writer();
		
		$str_query = "update product_category set";
		$str_query .= " pid = {$arr_input['pid']}";
		if (array_key_exists('name', $arr_input)) {
			$str_query .= " , name = '{$arr_input['name']}'";
		}
		if (array_key_exists('description', $arr_input)) {
			$str_query .= " , description = '{$arr_input['description']}'";
		}
		if (array_key_exists('icon', $arr_input)) {
			$str_query .= " , icon = '{$arr_input['icon']}'";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= " , status = {$arr_input['status']}";
		}
		if (array_key_exists('class_type', $arr_input)) {
			$str_query .= " , class_type = '{$arr_input['class_type']}'";
		}
		if (array_key_exists('order', $arr_input)) {
			$str_query .= " , order = '{$arr_input['order']}'";
		}
		if (array_key_exists('recommend_product_ids', $arr_input)) {
			$str_query .= " , recommend_product_ids = '{$arr_input['recommend_product_ids']}'";
		}
		if (array_key_exists('product_order', $arr_input)) {
			$str_query .= " , product_order = '{$arr_input['products_order']}'";
		}
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode='{$arr_input['chncode']}'";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		return $result = DB::executeQuery($str_query);
	}
	
	
	public function deleteCategory($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update product_category"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
	
	public function updownCategory($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "update";
		$str_query .= " product_category";
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
	
	function processMemoryData($id){
		$arr_cate_info = self::view($id);
		$arr_child = self::getChildList($id);
		$arr_child_hash = array();
		foreach ($arr_child as $row){
			$arr_child_hash[] = $row['id'];
		}
		unset($arr_output);
		$arr_output['id'] = $arr_cate_info['id'];
		$arr_output['pid'] = $arr_cate_info['pid'];
		$arr_output['name'] = $arr_cate_info['name'];
		$arr_output['order'] = $arr_cate_info['order'];
		$arr_output['type'] = $arr_cate_info['type'];
		$arr_output['status'] = $arr_cate_info['status'];
		$arr_output['icon'] = empty($arr_cate_info['icon']) ? '' : PIC_PATH . $arr_cate_info['icon'];
		$arr_output['desc'] = $arr_cate_info['description'];
		$arr_output['classtype'] = $arr_cate_info['class_type'];
		$arr_output['recpids'] = $arr_cate_info['recommend_product_ids'];
		$arr_output['chncode'] = $arr_cate_info['chncode'];
		$arr_output['updatetime'] = $arr_cate_info['update_time'];
		$arr_output['child'] = join("," , $arr_child_hash);
		
		return json_encode($arr_output,JSON_FORCE_OBJECT);
	}
}

?>