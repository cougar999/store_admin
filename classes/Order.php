<?php
class Order{
	
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
	
	public function getListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from `order`";
		$str_query .= " where status >= 1";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getList($arr_input , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from `order`";
		$str_query .= " where status >= 1";
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
	
	public function view($id){
		$dbh = DB::get_db_reader();
		$str_query = "select * from `order`";
		$str_query .= " where status >= 1";
		$str_query .= " and id = {$id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output[0];
	}
	
	public function viewDetail($id){
		$dbh = DB::get_db_reader();
		$str_query = "select * from `order_detail`";
		$str_query .= " where status >= 1";
		$str_query .= " and order_id = {$id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
}