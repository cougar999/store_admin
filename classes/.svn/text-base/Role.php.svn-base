<?php
class Role extends AdminControllerCore{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getPageList($pageno = 1){
		unset($arr_input);
		$total_count = self::getRoleListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno - 1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_role_list = self::getRoleList($arr_input , $limit_query);
		}else{
			$arr_role_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_role_list;
		
		return $arr_output;
	
	}
	
	public function getRoleListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from admin_role";
		
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getRoleList($arr_input = '' , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from admin_role";
		
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;		
	}
	
	public function addRole($arr_input){
		$dbh = DB::get_db_writer();
		
		$str_query = "insert into admin_role set"
					." name = '{$arr_input['name']}'";
		
		$result = DB::executeQuery($str_query);
		if(!$result){
			return false;
		}
		return true;
	}
	
	public function modifyRole($arr_input){
		$dbh = DB::get_db_writer();
		
		$str_query = "update";
		$str_query .= " admin_role";
		$str_query .= " set";
		$str_query .= " name = '{$arr_input['name']}'";
		$str_query .= " where id = {$arr_input['id']}";
		
		$result = DB::executeQuery($str_query);
		if(!$result){
			return false;
		}
		return true;		
	}
	
	public function viewRole($id){
		$dbh = DB::get_db_reader();
		$str_query = "select * from admin_role";
		$str_query .= " where id = {$id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];		
	}
	
	public function delRole($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "delete from admin_role where id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
}