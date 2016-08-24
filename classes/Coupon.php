<?php
class Coupon{
	public function getPageList($pageno = 1){
		$total_count = self::getCouponListCount();
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_coupon_list = self::getCouponList('' , $limit_query);
		}else{
			$arr_coupon_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_coupon_list;
		
		return $arr_output;
	}
	
	public function getCouponListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from pm_coupon";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		return $arr_output[0][0];
	}
	
	public function getCouponList($arr_input = '' , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from pm_coupon";
		$str_query .= " where status >= 0";
		
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
	public function getCouponListByIds($ids){
		$dbh = DB::get_db_reader();
		$str_query = "select id,chncode,title,description,content,img,start_time,end_time,total,count,status,create_time,update_time from pm_coupon"
					. " where status >= 0"
					. " and id in ({$ids})";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
	public function view($coup_id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from pm_coupon"
					." where"
					." id = {$coup_id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function addCoupon($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " pm_coupon";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", title = '{$arr_input['title']}'";
		$str_query .= ", description = '{$arr_input['description']}'";
		$str_query .= ", content = '{$arr_input['content']}'";
		$str_query .= ", img = '{$arr_input['img']}'";
		$str_query .= ", start_time = '{$arr_input['start_time']}'";
		$str_query .= ", end_time = '{$arr_input['end_time']}'";
		$str_query .= ", total = {$arr_input['total']}";
		$str_query .= ", count = {$arr_input['count']}";
		$str_query .= ", status = {$arr_input['status']}";
		
		$result = DB::executeQuery($str_query);
		
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	public function modifyCoupon($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " pm_coupon";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode='{$arr_input['chncode']}'";
		}
		if (array_key_exists('title', $arr_input)) {
			$str_query .= ", title='{$arr_input['title']}'";
		}
		if (array_key_exists('description', $arr_input)) {
			$str_query .= ", description='{$arr_input['description']}'";
		}
		if (array_key_exists('content', $arr_input)) {
			$str_query .= ", content='{$arr_input['content']}'";
		}
		if (array_key_exists('img', $arr_input)) {
			$str_query .= ", img='{$arr_input['img']}'";
		}
		if (array_key_exists('start_time', $arr_input)) {
			$str_query .= ", start_time='{$arr_input['start_time']}'";
		}
		if (array_key_exists('end_time', $arr_input)) {
			$str_query .= ", end_time='{$arr_input['end_time']}'";
		}
		if (array_key_exists('total', $arr_input)) {
			$str_query .= ", total={$arr_input['total']}";
		}
		if (array_key_exists('count', $arr_input)) {
			$str_query .= ", count={$arr_input['count']}";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= ", status={$arr_input['status']}";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		$result = DB::executeQuery($str_query);
		
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	public function deleteCoupon($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update pm_coupon"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
	
	public function updownCoupon($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "update";
		$str_query .= " pm_coupon";
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