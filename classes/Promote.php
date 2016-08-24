<?php
class Promote{
	public function getPageList($pageno = 1){
		unset($arr_input);
		$arr_input['chncode'] = $this->chncode;
		$total_count = self::getPromoteListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_promote_list = self::getPromoteList($arr_input , $limit_query);
		}else{
			$arr_promote_list = array();
		}
		
		unset($arr_output);
		$arr_output['total_count']		 = $total_count;
		$arr_output['count']			 = $this->count;
		$arr_output['pageno']			 = $pageno;
		$arr_output['items']			 = $arr_promote_list;
		
		return $arr_output;
	}
	
	public function getAllPromoteList(){
		$dbh = DB::get_db_reader();
		$str_query = "select id,title from pm_promote";
		$str_query .= " where status >= 0";
		$str_query .= " order by create_time desc";
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function getPromoteListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from pm_promote";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQuery($str_query);
		return $arr_output[0][0];
	}
	
	public function getPromoteList($arr_input = '' , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select id,title,description,shoptype,prov_id,city_id,status from pm_promote";
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
	
	public function addPromote($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " pm_promote";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", title = '{$arr_input['title']}'";
		$str_query .= ", description = '{$arr_input['description']}'";
		$str_query .= ", content = '{$arr_input['content']}'";
		$str_query .= ", shoptype = {$arr_input['shoptype']}";
		if (array_key_exists('prov_id', $arr_input)) {
			$str_query .= ", prov_id='{$arr_input['prov_id']}'";
		}
		if (array_key_exists('city_id', $arr_input)) {
			$str_query .= ", city_id='{$arr_input['city_id']}'";
		}
		$str_query .= ", status = {$arr_input['status']}";

		$result = DB::executeQuery($str_query);
		if($result){
			return $prom_id = DB::getInsertId();
		}else{
			return false;
		}
	}
	
	public function viewPromote($prom_id){
		$dbh = DB::get_db_reader();
		
		$str_query = "select id,chncode,title,description,content,shoptype,prov_id,city_id,status,create_time,update_time from pm_promote"
					." where"
					." id = {$prom_id}";
					
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function modifyPromote($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " pm_promote";
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
		if (array_key_exists('shoptype', $arr_input)) {
			$str_query .= ", shoptype={$arr_input['shoptype']}";
		}
		if (array_key_exists('prov_id', $arr_input)) {
			$str_query .= ", prov_id={$arr_input['prov_id']}";
		}
		if (array_key_exists('city_id', $arr_input)) {
			$str_query .= ", city_id={$arr_input['city_id']}";
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
	
	public function deletePromote($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update pm_promote"
					." set"
					." status = -1"
					." where"
					." (id  = {$str_ids})"
					."and status  = 0";
		
		return DB::executeQuery($str_query);
	}
	
	public function getLinkShopByPromId($prom_id){
		$dbh = DB::get_db_reader();
		$str_query = "select prom_id,shop_id,prom_status,shop_status from pm_link_prom_shop";
		$str_query .= " where prom_id = {$prom_id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
	public function modifyLinkPromShop($arr_input){
		$dbh = DB::get_db_writer();
		
		$str_query .= "delete from pm_link_prom_shop where prom_id = {$arr_input['prom_id']}";
		$result = DB::executeQuery($str_query);
		if(!$result)
			return $result;
		if(!is_array($arr_input['shopids']))
			return $result;
		foreach ($arr_input['shopids'] as $shop_id){
			unset($arr_input_link);
			$arr_input_link['prom_id']		 = $arr_input['prom_id'];
			$arr_input_link['shop_id']		 = $shop_id;
			$arr_input_link['chncode']		 = $arr_input['chncode'];
			$arr_input_link['prom_status']	 = 1;
			$arr_input_link['shop_status']	 = 1;
			
			self::addLinkPromShop($arr_input_link);
		}
		return true;
	}
	
	public function addLinkPromShop($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " pm_link_prom_shop";
		$str_query .= " set";
		$str_query .= " create_time= '{$date}'";
		$str_query .= ", chncode='{$arr_input['chncode']}'";
		$str_query .= ", prom_id={$arr_input['prom_id']}";
		$str_query .= ", shop_id={$arr_input['shop_id']}";
		$str_query .= ", prom_status={$arr_input['prom_status']}";
		$str_query .= ", shop_status={$arr_input['shop_status']}";
		
		$result = DB::executeQuery($str_query);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	public function deleteLinkPromShop($promid , $shopid = null){
		$dbh = DB::get_db_writer();
		
		$str_query = "update pm_link_prom_shop"
					." set"
					." status = -1"
					." where"
					." prom_id  = {$promid}";
		if($shopid != null)
			$str_query .= " and shop_id  = {$shopid}";
		
		return DB::executeQuery($str_query);
	}
	
	public function syncLinkPromShop($status_type , $status , $ids){
		$dbh = DB::get_db_writer();
		if($status_type == 'prom'){
			$str_query = "update pm_link_prom_shop set prom_status = {$status} where";
			if(is_array($ids)){
				$str_ids = join("," ,$ids);
				$str_query .= " prom_id in ($str_ids)";
			}else{
				$str_query .= " prom_id  = $ids";
			}		
					
		}elseif($status_type == 'shop'){
			$str_query = "update pm_link_prom_shop set shop_status = {$status} where";
			if(is_array($ids)){
				$str_ids = join("," ,$ids);
				$str_query .= " shop_id in ($str_ids)";
			}else{
				$str_query .= " shop_id  = $ids";
			}
		}
		return DB::executeQuery($str_query);
	}
	
	public function addPromLink($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " pm_prom_link";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", prom_id = {$arr_input['prom_id']}";
		$str_query .= ", content_id = {$arr_input['content_id']}";
		$str_query .= ", type = {$arr_input['type']}";
		$str_query .= ", status = {$arr_input['status']}";
		
		$result = DB::executeQuery($str_query);

		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	public function getContentByPromId($prom_id){
		unset($arr_input);
		$arr_input['prom_id'] = $prom_id;
		$total_count = self::getPromLinkListCount($arr_input);
		if($total_count > 0){
			$arr_prom_link_list = self::getPromLinkList($arr_input);
			//获取类型
			unset($arr_hash_ids);
			foreach ($arr_prom_link_list as $row){
				switch($row['type']){
					case 1:
						$arr_hash_ids['coupon'][] = $row['content_id'];
						break;
				}
			}
			foreach ($arr_hash_ids as $key => $row){
				switch ($key){
					case "coupon":
						$coupon_ids = join("," , $row);
						break;
				}
			}
			$arr_content_list['coupon'] = Coupon::getCouponListByIds($coupon_ids);
		}
		return $arr_content_list;
	}
	
	public function getPromLinkListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from pm_prom_link";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
				$str_query .=" and $key = '{$value}'";
		}
		
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getPromLinkList($arr_input = '' , $limit_query = null){
		$dbh = DB::get_db_reader();
		$str_query = "select * from pm_prom_link";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function delPromLinkList($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update pm_prom_link"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
	
	public function updownPromote($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query .= "update";
		$str_query .= " pm_promote";
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