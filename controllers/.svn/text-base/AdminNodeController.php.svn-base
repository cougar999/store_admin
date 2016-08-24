<?php
class AdminNodeController extends AdminController{
	
	public function __construct(){
		//$this->template_info = true;
		$this->count = 20;
		
		parent::__construct();
	}
	
	public function initAction(){
		$this->view('node/catelog.html');
	}
	
	public function catelogAction(){
		$pageno = intval(getValue('pageno',1));
		
		$pid = intval(getValue('parentid', -1));
		/*if($pid > 0){
			$arr_node_info = Node::viewNode($pid);
			$this->assign('title_name' , $arr_node_info['name']);
		}*/
		$this->assign('page' , Node::getPageList($pid , $pageno));
		$this->view('node/index.html');
	}
	
	public function listAction(){
		$pageno = intval(getValue('pageno',1));
		$pid = intval(getValue('parentid', -1));
		$list = Node::getPageList($pid , $pageno);
		$this->assign('page' , $list);
		/*
		foreach($list["items"] as $row){
			$arr_child[$row['id']] = Node::getChildList($row['id']);
		}
		$this->assign('child' , $arr_child);
		*/
		$this->view('node/list.tpl' , '');
	}
	
	public function addAction(){
		if(!isSubmit('isNodeSubmit')){
			$parentid = intval(getValue("parentid"));
			if($parentid > 0){
				$arr_info = Node::viewNode($parentid);
				if(!empty($arr_info['child_type'])){
					$arr_child_type = explode(",", $arr_info['child_type']);
					if(count($arr_child_type) == 1){
						$arr_child_type = $arr_child_type[0];
					}
				}else{
					$arr_child_type = array(4);			//4表示为商品，这里如果节点的子节点集合为空，则默认给予子节点为商品类型
				}
				$this->assign("child_type" , $arr_child_type);
			}else{
				$this->assign("child_type" , array(1));//1表示为频道，这里判断为加入顶级节点都为频道节点类型
			}
			$this->view('node/add.html');
		} else {
			$chncode = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$pid = intval(getValue('parentid',-1));
			$name = trim(getValue('name'));
			$desc = trim(getValue('desc'));
			$content = trim(getValue('content'));
			if(!empty($_FILES['icon']['name'])){
				$obj_img = new Image();
				$icon = $obj_img->uploadFile($_FILES['icon']); 
			}
			$status = trim(getValue('status'));
			$node_type = intval(getValue('node_type'));
			switch($node_type){	//节点类型：3为商品分类 4为商品
				case 3:
				case 4:
					$content_id = intval(getValue('content_id'));
			}
			$order_id = intval(getValue('order_id'));
			$order_type = intval(getValue('order_type'));
			
			if(isSubmit("child_type")){
				$child_type = join(",", getValue("child_type"));
			}
			
			
			unset($arr_input);
			$arr_input['chncode'] = $chncode;
			$arr_input['pid'] = $pid;
			if(!empty($_FILES['icon']['name']))
				$arr_input['icon'] = $icon;
			$arr_input['name'] = $name;
			$arr_input['node_type'] = $node_type;
			$arr_input['desc'] = $desc;
			$arr_input['content'] = $content;
			$arr_input['order_id'] = $order_id;
			$arr_input['order_type'] = $order_type;
			$arr_input['status'] = $status;
			$arr_input['child_type'] = $child_type;
			
			if(isset($content_id) && !empty($content_id)){
				$arr_input['content_id'] = $content_id;
			}
			
			$node_id = Node::add($arr_input);
			if($node_id){
				$detail = self::setMemoryData($node_id);
				if(!Validate::isUpdateCache($detail)){
					$url = "/node" . ( ($pid > 0) ? "?parentid=" . $pid : '' );
					echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "'. $url .'";</script>';
				}else
					self::setMemoryAll();
					header("Location:/node" . ( ($pid > 0) ? "?parentid=" . $pid : '' ));
			}
		}
	}
	
	public function modifyAction(){
		if(!isSubmit('isNodeSubmit')){
			$id = intval(getValue('id'));
			$arr_info = Node::view($id);
			
			if(!empty($arr_info['child_type'])){
				$arr_info['child_type'] = explode(",",$arr_info['child_type']);
			}
			$this->assign('info' , $arr_info);
			$this->assign('nodecont' , Node::viewNodeContent($id));
			$this->view('node/edit.html');
		}else{
			$chncode = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
			$id = intval(getValue('id'));
			$pid = intval(getValue('pid',-1));
			$name = trim(getValue('name'));
			$desc = trim(getValue('desc'));
			if(!empty($_FILES['icon']['name'])){
				$obj_img = new Image();
				$icon = $obj_img->uploadFile($_FILES['icon']); 
			}
			$status = trim(getValue('status'));
			$node_type = intval(getValue('node_type'));
			switch($node_type){	//节点类型：3为商品分类 4为商品
				case 3:
				case 4:
					$content_id = intval(getValue('content_id'));
			}
			$order_id = intval(getValue('order_id'));
			$order_type = intval(getValue('order_type'));
			
			unset($arr_input);
			if(!empty($_FILES['icon']['name']))
				$arr_input['icon'] = $icon;
				
			$arr_input['id'] = $id;
			$arr_input['chncode'] = $chncode;
			$arr_input['pid'] = $pid;
			$arr_input['name'] = $name;
			$arr_input['node_type'] = $node_type;
			$arr_input['desc'] = $desc;
			$arr_input['order_id'] = $order_id;
			$arr_input['order_type'] = $order_type;
			$arr_input['status'] = $status;
			if(isSubmit("child_type")){
				$arr_input['child_type'] = join(",", getValue("child_type"));
			}
			if(isset($content_id) && !empty($content_id)){
				$arr_input['content_id'] = $content_id;
			}
			$result = Node::modify($arr_input);
			if($result){
				$detail = self::setMemoryData($id);
				if(!Validate::isUpdateCache($detail)){
					$url = "/node" . ( ($pid > 0) ? "?parentid=" . $pid : '' );
					echo '<script language="javascript">alert("缓存更新失败!");window.location.href = "'. $url .'";</script>';
				}else
					self::setMemoryAll();
					header("Location:/node" . ( ($pid > 0) ? "?parentid=" . $pid : '' ));
			}else{
				echo "不能修改";
			}
		}
	}
	
	public function downAction(){
		$id = intval(getValue("id"));
		unset($arr_input);
		$result1 = Node::downNode($id);
		$result2 = Node::downNodeContent($id);
			if($result1 && $result2)
				return true;
			else
				return false;
	}
	
	public function setMemorydata($id = 0 , $is_data = false){
		if($id == 0)
			$id = intval(getValue("id"));
		$node_info = Node::view($id);
		$node_info['icon'] = empty($node_info['icon']) ? '' : (PIC_PATH . $node_info['icon']);
		
		$data['node'] = json_encode($node_info);
		$detail = ap_core_post("NODE_UPDATE_CACHE",$data);
		if (isSubmit('ajax') && !$is_data){
			die($detail);
		}else{
			return $detail;
		}
	}
	
	public function setMemoryAll(){
		$detail = ap_core_post("NODE_ALL_UPDATE_CACHE");
		if (isSubmit('ajax')){
			die($detail);
		}else{
			return $detail;
		}
	}
	
	//点击上线下线直接改变状态
	public function changeStatus(){
		$act = trim(getValue('status'));
		$id = trim(getValue('id'));
		
		$obj_node = new Node();
		$result = $obj_node->updownNode($id, $act);
		
		echo $result;
	}
	
	public function setMemoryDataAction(){
		$id = intval(getValue("id"));
		$detail = self::setMemorydata($id , true);
		if(Validate::isUpdateCache($detail))
			$detail1 = self::setMemoryAll();
		die($detail1);
	}
	
	public function updateCacheAll(){
		$arr_all_list = Node::getAllNodeList();
		
		die(json_encode($arr_all_list));
	}
	
	public function multiNodesAction() {
		$pid = intval(getValue('parentid',-1));
		$act = trim(getValue('statusOrder'));
		$ids = getValue('nodeids');
		$action = trim(getValue('actionOrder'));
		$url = getFromUrl('');
		
		if($action == 'updownNodesFlag') {
			$obj_node = new Node();
			$result = $obj_node->updownNode($ids, $act);
		}
		if ($result){
			header("Location:" .$url);
		}
	}
	
	public function getChildList(){
		$pid = intval(getValue('pid' , -1));
		echo json_encode(Node::getChildList($pid));
	}
	
	public function leftmenuAction(){
		$parentid = getValue('parentid');
		$total_count = Node::getNodeMenuListCount();
		if($total_count > 0){
			$arr_list = Node::getNodeMenuList();
			
			$arr_hash_list = array();
			foreach ($arr_list as $row){
					$arr_hash_list[$row['pid']][$row['id']] = $row;
			}
			$arr_node_tree = Node::getLevelNodeMenu(-1 , $arr_hash_list , array());
		}
		
		$this->assign('all_node' , $arr_node_tree);
		$this->assign('menu_hover' , $parentid);
		$this->view('node/leftmenu.tpl' , '');
	}
	
	public function getAllNodeList(){
		unset($arr_input);
		$total_count = Node::getNodeMenuListCount();
		if($total_count > 0){
			$arr_list = Node::getNodeMenuList();
			
			$arr_hash_list = array();
			foreach ($arr_list as $row){
					$arr_hash_list[$row['pid']][$row['id']] = $row;
			}
			$arr_node_tree = Node::getLevelNodeMenu(-1 , $arr_hash_list , array());
		}
		$this->assign('nodelist', $arr_node_tree);
		$this->view('node/nodelist.html', 'layout_block.html');
	}
}
?>
