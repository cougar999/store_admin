<?php
class Statistic{
	
	public function getPageList($pageno = 1){
		unset($arr_input);
		$total_count = self::getUVListCount();
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getUVList($limit_query);
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
	
	public function getUVListCount(){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from stat_day_uv";
		$str_query .= " where chncode = {$this->chncode}";
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getUVList($limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select uv,pv,stat_date,stat_year,stat_month,stat_day from stat_day_uv";
		$str_query .= " where chncode = {$this->chncode}";
		$str_query .= ' order by stat_date desc';
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
	public function getPVListCount($arr_input){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from stat_day_pv";
		$str_query .= " where chncode = {$this->chncode}";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getPVList($arr_input){
		$dbh = DB::get_db_reader();
		$str_query = "select req_jsp,jsp_mod,pv,stat_date,stat_year,stat_month,stat_day from stat_day_pv";
		$str_query .= " where chncode = {$this->chncode}";
		$str_query .= ' order by stat_date desc';
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
}
?>