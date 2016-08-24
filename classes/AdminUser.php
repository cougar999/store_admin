<?php
class AdminUser extends AdminControllerCore{
	
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param array $arr_input 
	 * 				email
	 * 				passwd
	 * @return int 1 or 0
	 */
	public function checkLogin($arr_input){
		
		$dbh = DB::get_db_reader();
		$str_query = "select * from admin_user where status = 1 and email = '{$arr_input['email']}' and passwd = '" . encrypt($arr_input['passwd']) . "'";
		
		$arr_output = DB::selectQuery($str_query);
		
		if (!$arr_output)
			return false;
		
		return $arr_output[0];
	}
	
	public function logout(){
		session_unset();
	}
	
	public function changeChncode($chncode){
		if($_SESSION['admin_userid'] == DEFAULT_ADMIN_USER){
			$_SESSION['chncode'] = $chncode;
			return true;
		}else 
			return false;
	}
	
	public function getPageList($pageno = 1){
		unset($arr_input);
		$total_count = self::getAdminUserListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getAdminUserList($arr_input , $limit_query);
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
	
	public function getAdminUserListCount($arr_input){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from admin_user where status >= 0";
		
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getAdminUserList($arr_input = '' , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from admin_user where status >= 0";
		
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function addAdminUser($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " admin_user";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", role_id = {$arr_input['role_id']}";
		$str_query .= ", name = '{$arr_input['name']}'";
		$str_query .= ", email = '{$arr_input['email']}'";
		$str_query .= ", passwd = '{$arr_input['passwd']}'";
		$str_query .= ", status = {$arr_input['status']}";
		$str_query .= ", chncode = {$arr_input['chncode']}";
		
		$result = DB::executeQuery($str_query);
		if($result)
			return $product_id = DB::getInsertId();
	}
	
	public function viewAdminUser($id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select * from admin_user"
					." where"
					." id = {$id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function modifyAdminUser($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " admin_user";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		
		if (array_key_exists('role_id', $arr_input)) {
			$str_query .= ", role_id = {$arr_input['role_id']}";
		}
		if (array_key_exists('name', $arr_input)) {
			$str_query .= ", name = '{$arr_input['name']}'";
		}
		if (array_key_exists('email', $arr_input)) {
			$str_query .= ", email = '{$arr_input['email']}'";
		}
		if (array_key_exists('passwd', $arr_input)) {
			$str_query .= ", passwd = '{$arr_input['passwd']}'";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= ", status = {$arr_input['status']}";
		}
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode = {$arr_input['chncode']}";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		return $result = DB::executeQuery($str_query);
	}
	
	public function delAdminUser($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "delete from admin_user where id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
}