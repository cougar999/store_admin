<?php
class Shop{

	/**
	 * @descriptin: 店面数据分页列表
	 * @param: int $pageno
	 */
	public function getPageList($pageno = 1){
		unset($arr_input);
		$arr_input['chncode'] = $this->chncode;
		$total_count = self::getListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getList($arr_input , $limit_query);
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
	
	public function getAllList(){
		$dbh = DB::get_db_reader();
		$str_query = "select id,name from shop";
		$str_query .= " where status >= 0";
		$str_query .= " and chncode = {$this->chncode}";
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function getAllListByCityId($city_id){
		unset($arr_input);
		$arr_input['city_id'] = $city_id;
		$total_count = self::getListCount($arr_input);
		if($total_count > 0){
			$arr_list = self::getList($arr_input);
		}else{
			$arr_list = array();
		}
		
		return $arr_list;
	}
	
	public function getListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from shop";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getList($arr_input = '' , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select id,name,contact,phone_no,cell_phone,province_id,city_id,county_id,lon,lat,status,chncode,create_time,update_time,address from shop";
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
	
	public function add($arr_input){
		$dbh = DB::get_db_writer();
		$create_time = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " shop";
		$str_query .= " set";
		$str_query .= " create_time = '{$create_time}'";
		$str_query .= ", name = '{$arr_input['name']}'";
		$str_query .= ", contact = '{$arr_input['contact']}'";
		$str_query .= ", phone_no = '{$arr_input['phone_no']}'";
		$str_query .= ", cell_phone = '{$arr_input['cell_phone']}'";
		$str_query .= ", province_id = {$arr_input['province_id']}";
		$str_query .= ", city_id = {$arr_input['city_id']}";
		$str_query .= ", lon = '{$arr_input['lon']}'";
		$str_query .= ", lat = '{$arr_input['lat']}'";
		$str_query .= ", status = {$arr_input['status']}";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", address = '{$arr_input['address']}'";
		
		$result = DB::executeQuery($str_query);
		
		if(!$result){
			return false; 
		}else{
			return $shop_id = DB::getInsertId();
		}
	}
	
	public function modify($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " shop";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if (array_key_exists('name', $arr_input)) {
			$str_query .= ", name='{$arr_input['name']}'";
		}
		if (array_key_exists('contact', $arr_input)) {
			$str_query .= ", contact='{$arr_input['contact']}'";
		}
		if (array_key_exists('phone_no', $arr_input)) {
			$str_query .= ", phone_no='{$arr_input['phone_no']}'";
		}
		if (array_key_exists('cell_phone', $arr_input)) {
			$str_query .= ", cell_phone='{$arr_input['cell_phone']}'";
		}
		if (array_key_exists('province_id', $arr_input)) {
			$str_query .= ", province_id={$arr_input['province_id']}";
		}
		if (array_key_exists('city_id', $arr_input)) {
			$str_query .= ", city_id={$arr_input['city_id']}";
		}
		/*if (array_key_exists('county_id', $arr_input)) {
			$str_query .= ", county_id={$arr_input['county_id']}";
		}*/
		if (array_key_exists('lon', $arr_input)) {
			$str_query .= ", lon='{$arr_input['lon']}'";
		}
		if (array_key_exists('lat', $arr_input)) {
			$str_query .= ", lat='{$arr_input['lat']}'";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= ", status={$arr_input['status']}";
		}
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode='{$arr_input['chncode']}'";
		}
		if (array_key_exists('address', $arr_input)) {
			$str_query .= ", address='{$arr_input['address']}'";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		$result = DB::executeQuery($str_query);
		
		if(0 == $arr_input['status']){
			//对应的活动关联表下线
		}
		
		return $result;
	}
	
	public function view($id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from shop"
					." where"
					." id = {$id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function delete($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update shop"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
	
	public function updownShop($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "update";
		$str_query .= " shop";
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
		$result = DB::executeQuery($str_query);
		
		if($result){
			if($act == 1){
				Promote::syncLinkPromShop('shop' , 0 , $ids);
			}elseif($act == 0){
				Promote::syncLinkPromShop('shop' , 1 , $ids);
			}
			return true;
		}else{
			return false;
		}
	}
}