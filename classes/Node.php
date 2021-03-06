<?php
class Node{
	
	public function getPageList($pid = -1 , $pageno = 1){
		unset($arr_input);
		$arr_input['pid'] = $pid;
		$arr_input['chncode'] = $this->chncode;
		$total_count = self::getNodeListCount($arr_input);
		if($total_count > 0){
			$start_num = ($pageno-1) * $this->count;
			$limit_query = "limit " . $start_num . " , " . $this->count;
			$arr_list = self::getNodeList($arr_input , $limit_query , 'order_id asc');
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
	
	public function getChildList($parentid = '-1'){
		unset($arr_input);
		$arr_input['pid']		 = $parentid;
		$arr_input['status']	 = 1;
		
		$total_count = self::getNodeListCount($arr_input);
		if($total_count > 0){
			$limit_query = "limit 0 , 10";
			$arr_node_list = self::getNodeList($arr_input , $limit_query);
		}else{
			$arr_node_list = array();
		}
		
		unset($arr_output);
		$arr_output = $arr_node_list;
		
		return $arr_output;
	}
	
	public function getAllNodeList(){
		$dbh = DB::get_db_reader();
		$str_query = "select id,name from b_node_publish";
		$str_query .= " where status >= 0";
		$str_query .= " and chncode = {$this->chncode}";
		$str_query .= " order by order_id asc";
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function getAllList($is_prefix = false){
		$total_count = self::getNodeListCount();
		if($total_count > 0){
			$arr_list = self::getNodeList();
			
			$arr_hash_list = array();
			foreach ($arr_list as $row){
					$arr_hash_list[$row['pid']][$row['id']] = $row;
			}
			return $arr_node_tree = self::getLevelNode(-1 , $arr_hash_list , array() , '' , $is_prefix);
		}
	
	}
	
	public function getLevelNodeMenu($id , $arr_hash_list ,$arr_node_tree = array()){
		foreach ($arr_hash_list[$id] as $key => $row){
			$arr_node_tree[] = $row;
			if(!array_key_exists($key,$arr_hash_list)){
				continue;
			}else{
				$arr_node_tree = self::getLevelNodeMenu($key , $arr_hash_list , $arr_node_tree);
			}
		}
		return $arr_node_tree;
	}
	
	public function getLevelNode($id , $arr_hash_list ,$arr_node_tree = array() , $name = '' , $is_prefix = false){
		if(!$is_prefix)
			$name .= '&nbsp;&nbsp;-&nbsp;&nbsp;';
		foreach ($arr_hash_list[$id] as $key => $row){
			if(!array_key_exists($key,$arr_hash_list)){
				continue;
			}else{
				$row['name'] = $name.$row['name'].$name;
				$arr_node_tree[] = $row;
				$arr_node_tree = self::getLevelNode($key , $arr_hash_list , $arr_node_tree , $name , $is_prefix);
			}
		}
		return $arr_node_tree;
	}
	
	public function getLinkPathByid($id){
		$dbh = DB::get_db_reader();
		$str_query = "select link_path from b_node_publish";
		$str_query .= " where id = {$id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0]['link_path'];
	}
	
	public function add($arr_input){
		$arr_input['is_locked'] = 0;	//临时  不锁定所有节点
		$node_id = self::addNode($arr_input);
		switch($arr_input['node_type']){
			case 3:
			case 4:
			if($node_id){
				$arr_input_node['node_id'] = $node_id;
				$arr_input_node['chncode'] = $arr_input['chncode'];
				$arr_input_node['node_name'] = $arr_input['name'];
				$arr_input_node['node_desc'] = $arr_input['desc'];
				$arr_input_node['node_type'] = $arr_input['node_type'];
				$arr_input_node['content_id'] = $arr_input['content_id'];
				$arr_input_node['content_type'] = $arr_input['node_type'];
				$arr_input_node['status'] = $arr_input['status'];
				
				self::addNodeContent($arr_input_node);
			}
			break;
		}
		return $node_id;
	}
	
	public function modify($arr_input){
		$arr_info = self::viewNode($arr_input['id']);
		switch($arr_info['node_type']){
			case 1:
			case 2:
				if($arr_info['node_type'] != $arr_input['node_type'])
				return false;
			break;
		}
		self::modifyNode($arr_input);
		if(array_key_exists('content_id' , $arr_input) && !empty($arr_input['content_id'])){
			$node_id = $arr_input['id'];
			$arr_input_node['chncode'] = $arr_input['chncode'];
			$arr_input_node['node_id'] = $node_id;
			$arr_input_node['node_name'] = $arr_input['name'];
			$arr_input_node['node_desc'] = $arr_input['desc'];
			$arr_input_node['content_id'] = $arr_input['content_id'];
			$arr_input_node['content_type'] = $arr_input['node_type'];
			$arr_input_node['status'] = $arr_input['status'];
			
			$a_content = self::viewNodeContent($node_id);
			$is_exist = empty($a_content['id']) ? 0 : 1;
			if($is_exist)
				return self::modifyNodeContent($arr_input_node);
			else{
				return self::addNodeContent($arr_input_node);
			}
		}else{
			return true;
		}
	}
	
	public function getNodeListCount($arr_input = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from b_node_publish";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$str_query .= " and chncode = {$this->chncode}";
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getNodeList($arr_input = '' , $limit_query = null , $order = null){
		$dbh = DB::get_db_reader();
		$str_query = "select id,pid,link_path,icon,background_path,name,node_type,`desc`,order_id,order_type,display_type,status,create_time,update_time from b_node_publish";
		$str_query .= " where status >= 0";
		if(!empty($arr_input)){
			foreach ($arr_input as $key => $value)
			$str_query .=" and $key = '{$value}'";
		}
		$str_query .= " and chncode = {$this->chncode}";
		if(!empty($order))
			$str_query .= " order by $order";
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function getNodeMenuListCount(){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from b_node_publish";
		$str_query .= " where status = 1";
		$str_query .= " and chncode = {$this->chncode}";
		$str_query .= " and (node_type = 1 or node_type = 2)";
		$arr_output = DB::selectQuery($str_query);
		
		return $arr_output[0][0];
	}
	
	public function getNodeMenuList($limit_query = null , $order = null){
		$dbh = DB::get_db_reader();
		$str_query = "select id,pid,link_path,icon,name,node_type from b_node_publish";
		$str_query .= " where status = 1";
		$str_query .= " and chncode = {$this->chncode}";
		$str_query .= " and (node_type = 1 or node_type = 2)";
		if(!empty($order))
			$str_query .= " order by $order";
		if ($limit_query != null) {
			$str_query .= ' '.$limit_query;
		}
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output;
	}
	
	public function addNode($arr_input){
		if($arr_input['pid'] > 0){
			$link_path = self::getLinkPathByid($arr_input['pid']);
			if($link_path)
				$link_path .= "-".$arr_input['pid'];
			else
				$link_path = $arr_input['pid'];
		}else{
			$link_path = '';
		}
		
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " b_node_publish";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", pid = {$arr_input['pid']}";
		$str_query .= ", link_path = '{$link_path}'";
		$str_query .= ", icon = '{$arr_input['icon']}'";
		$str_query .= ", background_path = '{$arr_input['background_path']}'";
		$str_query .= ", name = '{$arr_input['name']}'";
		$str_query .= ", node_type = {$arr_input['node_type']}";
		$str_query .= ", `desc` = '{$arr_input['desc']}'";
		$str_query .= ", content = '{$arr_input['content']}'";
		$str_query .= ", order_id = {$arr_input['order_id']}";
		$str_query .= ", order_type = {$arr_input['order_type']}";
		$str_query .= ", display_type = '{$arr_input['display_type']}'";
		$str_query .= ", is_locked = {$arr_input['is_locked']}";
		$str_query .= ", status = {$arr_input['status']}";
		$str_query .= ", child_type = '{$arr_input['child_type']}'";

		$result = DB::executeQuery($str_query);
		if($result)
			return $node_id = DB::getInsertId();
	}

	public function modifyNode($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " b_node_publish";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode = {$arr_input['chncode']}";
		}
		if (array_key_exists('pid', $arr_input)) {
			$str_query .= ", pid = {$arr_input['pid']}";
		}
		if (array_key_exists('link_path', $arr_input)) {
			$str_query .= ", link_path = '{$arr_input['link_path']}'";
		}
		if (array_key_exists('icon', $arr_input)) {
			$str_query .= ", icon = '{$arr_input['icon']}'";
		}
		if (array_key_exists('background_path', $arr_input)) {
			$str_query .= ", background_path = '{$arr_input['background_path']}'";
		}
		if (array_key_exists('name', $arr_input)) {
			$str_query .= ", name = '{$arr_input['name']}'";
		}
		if (array_key_exists('node_type', $arr_input)) {
			$str_query .= ", node_type = {$arr_input['node_type']}";
		}
		if (array_key_exists('desc', $arr_input)) {
			$str_query .= ", `desc` = '{$arr_input['desc']}'";
		}
		if (array_key_exists('order_id', $arr_input)) {
			$str_query .= ", order_id = {$arr_input['order_id']}";
		}
		if (array_key_exists('order_type', $arr_input)) {
			$str_query .= ", order_type = {$arr_input['order_type']}";
		}
		if (array_key_exists('display_type', $arr_input)) {
			$str_query .= ", display_type = {$arr_input['display_type']}";
		}
		if (array_key_exists('is_locked', $arr_input)){
			$str_query .= ", is_locked = {$arr_input['is_locked']}";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= ", status = {$arr_input['status']}";
		}
		if (array_key_exists('child_type', $arr_input)) {
			$str_query .= ", child_type = '{$arr_input['child_type']}'";
		}
		$str_query .= " where id = {$arr_input['id']}";
		
		return DB::executeQuery($str_query);
	}
	
	public function view($id){
		$arr_node_info = self::viewNode($id);
		switch($arr_node_info['node_type']){
			case "1":
			case "2":
			break;
			default:
				$arr_node_content = self::viewNodeContent($id);
				$arr_node_info['content_id'] = $arr_node_content['content_id'];
				$arr_node_info['content_type'] = $arr_node_content['content_type'];
		}
		return $arr_node_info;
	}
	
	public function viewNode($id){
		$dbh = DB::get_db_reader();
		$str_query = "select id,chncode,pid,link_path,icon,background_path,name,node_type,`desc`,content,order_id,order_type,display_type,status,child_type,create_time,update_time from b_node_publish";
		$str_query .= " where id = {$id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function viewNodeContent($node_id){
		$dbh = DB::get_db_reader();
		$str_query = "select id,chncode,node_id,node_name,node_desc,content_id,content_type,status,create_time,update_time from b_node_content";
		$str_query .= " where node_id = {$node_id}";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		
		return $arr_output[0];
	}
	
	public function deleteNode($ids){
		$dbh = DB::get_db_writer();
		
		if(is_array($ids)){
			$str_ids = join(" or id = " , $ids);
		}else{
			$str_ids = $ids;
		}
		
		$str_query = "update b_node_publish"
					." set"
					." status = -1"
					." where"
					." id  = {$str_ids}";
		
		return DB::executeQuery($str_query);
	}
	
	public function addNodeContent($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "insert into";
		$str_query .= " b_node_content";
		$str_query .= " set";
		$str_query .= " create_time = '{$date}'";
		$str_query .= ", chncode = '{$arr_input['chncode']}'";
		$str_query .= ", node_id = {$arr_input['node_id']}";
		$str_query .= ", node_name = '{$arr_input['node_name']}'";
		$str_query .= ", node_desc = '{$arr_input['node_desc']}'";
		$str_query .= ", content_id = {$arr_input['content_id']}";
		$str_query .= ", content_type = {$arr_input['content_type']}";
		$str_query .= ", status = {$arr_input['status']}";
		
		return DB::executeQuery($str_query);
	}
	
	public function modifyNodeContent($arr_input){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query .= "update";
		$str_query .= " b_node_content";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		if (array_key_exists('chncode', $arr_input)) {
			$str_query .= ", chncode = {$arr_input['chncode']}";
		}
		if (array_key_exists('node_name', $arr_input)) {
			$str_query .= ", node_name = '{$arr_input['node_name']}'";
		}
		if (array_key_exists('node_desc', $arr_input)) {
			$str_query .= ", node_desc = '{$arr_input['node_desc']}'";
		}
		if (array_key_exists('content_id', $arr_input)) {
			$str_query .= ", content_id = {$arr_input['content_id']}";
		}
		if (array_key_exists('content_type', $arr_input)) {
			$str_query .= ", content_type = {$arr_input['content_type']}";
		}
		if (array_key_exists('status', $arr_input)) {
			$str_query .= ", status = {$arr_input['status']}";
		}
		$str_query .= " where node_id = {$arr_input['node_id']}";
		return DB::executeQuery($str_query);
	}
	
	public function downNodeByContentId($content_id){
		$status = 1;//查询状态为上线的节点
		$arr_node_ids = self::getNodeByContentId($content_id , $status , true);
		if(count($arr_node_ids) > 0){
			$result1 = self::downNode($arr_node_ids);
			$result2 = self::downNodeContent($arr_node_ids);
			if($result1 && $result2)
				return $arr_node_ids;
			else
				return array();
		}
		return $arr_node_ids;
	}
	
	public function downNode($ids){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query = "update";
		$str_query .= " b_node_publish";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		$str_query .= " ,status = 0";
		$str_query .= " where status = 1";
		if(is_array($ids)){
			$str_ids = join("," ,$ids);
			$str_query .= " and id in ($str_ids)";
		}else{
			$str_query .= " and id  = $ids";
		}
		return DB::executeQuery($str_query);
	}
	
	public function downNodeContent($node_ids){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		
		$str_query = "update";
		$str_query .= " b_node_content";
		$str_query .= " set";
		$str_query .= " update_time = '{$date}'";
		$str_query .= " ,status = 0";
		$str_query .= " where status = 1";
		if(is_array($node_ids)){
			$str_ids = join("," ,$node_ids);
			$str_query .= " and node_id in ($str_ids)";
		}else{
			$str_query .= " and node_id  = $ids";
		}
		
		return DB::executeQuery($str_query);
	}
	
	public function getNodeByContentId($content_id , $status = 0 , $is_nodeids = false){
		$dbh = DB::get_db_reader();
		
		$str_query = "select node_id , node_name from b_node_content";
		$str_query .= " where content_id = {$content_id}";
		$str_query .= " and status = $status";
		
		$arr_output = DB::selectQueryAssoc($str_query);
		if($is_nodeids){
			$arr_hash_ids = array();
			if(count($arr_output) > 0){
				foreach ($arr_output as $row){
					$arr_hash_ids[] = $row['node_id'];
				}
				return $arr_hash_ids;
			}else{
				return ;
			}
		}
		return $arr_output;
	}
	
	public function updownNode($ids, $act){
		$dbh = DB::get_db_writer();
		$date = DB::currentTime();
		$str_query = "update";
		$str_query .= " b_node_publish";
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
			$str_query .= " and id in ($str_ids);";
		}else{
			$str_query .= " and id  = $ids;";
			$arr_node_content = self::viewNodeContent($ids);
		}
		if(!empty($arr_node_content) && $arr_node_content['content_id'] > 0){
			$arr_product_info = Product::viewProduct($arr_node_content['content_id']);
			if($arr_product_info['status'] == 1 || ($act == 1)){
				DB::executeQuery($str_query);
				$str_query = "update";
				$str_query .= " b_node_content";
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
					$str_query .= " and node_id in ($str_ids);";
				}else{
					$str_query .= " and node_id  = $ids;";
				}
				return DB::executeQuery($str_query);
			}else{
				return 2;
			}
		}else{
			return DB::executeQuery($str_query);
		}
		
	}
}