<?php
class Question{
	
	public function getPageList($pageno = 1){
		unset($arr_input);
		$arr_input['type'] = 1;
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
	
	/**
	 * 
	 * @description:this function is get question list count 
	 */
	public function getListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from u_question";
		$str_query .= " where status >= 0";
		$str_query .= " and chncode = {$this->chncode}";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		return $arr_output[0][0];
		
	}
	
	public function getList($arr_input = '', $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from u_question";
		$str_query .= " where status >= 0";
		$str_query .= " and chncode = {$this->chncode}";
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
	
	public function getQuestRepayList($id){
		unset($arr_input);
		$arr_input['relateid'] = $id;
		$arr_input['type'] = 2;
		$total_count = self::getListCount($arr_input);
		if($total_count > 0){
			$limit_query = "limit 0 , 10";
			$arr_list = self::getList($arr_input , $limit_query);
		}else{
			$arr_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = 10;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_list;
		
		return $arr_output;
	}
	
	public function addRepay($arr_input){
		$id = trim(guid(), '{}');
		
		$dbh = DB::get_db_writer();
		$create_time = DB::currentTime();
		$str_query = "insert into u_question set"
					." id = '{$id}'"
					." , user_id = '{$arr_input['user_id']}'"
					." , nickname = '{$arr_input['nickname']}'"
					." , content = '{$arr_input['content']}'"
					." , type = 2"
					." , relateid = '{$arr_input['relateid']}'"
					.", chncode = '{$arr_input['chncode']}'"
					." , status = 1"
					." , create_time = '{$create_time}'";
		$result = DB::executeQuery($str_query);
		
		if(!$result){
			return false; 
		}else{
			return $id;
		}
	}
	
	public function updownQuestion($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "update";
		$str_query .= " u_question";
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
			$str_query .= " and id  = '$ids'";
		}
		return DB::executeQuery($str_query);
	}
	
	public function deleteQuestion($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join("' or id = '" , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update u_question"
					." set"
					." status = -1"
					." where"
					." id  = '{$str_ids}'";
		
		return DB::executeQuery($str_query);
	}
}