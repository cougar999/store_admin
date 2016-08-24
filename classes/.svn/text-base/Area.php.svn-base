<?php
class Area{
	
	const INDEX_FILE = 'cache/area.php';
	
	protected $root_dir;
	
	protected $index;
	
	public function __construct(){
		$this->root_dir = dirname(dirname(__FILE__)).'/';
		self::generateIndex();
		if (file_exists($this->root_dir.Area::INDEX_FILE))
			$this->index = include($this->root_dir.Area::INDEX_FILE);
	}
	
	public function generateIndex(){
		if(isset($this->index) && is_array($this->index)){
			return $this->index;
		}else{
			$total_count = self::getAreaListCount();
			if($total_count > 0){
				$arr_area_list = self::getAreaList();
			}else{
				$arr_area_list = array();
			}
			unset($arr_area_hash_list);
			foreach ($arr_area_list as $row) {
				$arr_area_hash_list[$row['id']] = $row;
			}
			/*foreach ($arr_area_list as $row){
				if($row['pid'] != -1){
					$filename = $this->root_dir . 'cache/map.txt';
					$data = 'map.put("' . $row['name'] . '","' . $row['id'] . '");';
					file_put_contents($filename, $data."\n" , FILE_APPEND);
				}
			}*/
			$filename = $this->root_dir . Area::INDEX_FILE;
			$content = '<?php return '.var_export($arr_area_hash_list, true).'; ?>';
			
			file_put_contents($filename, $content);
		}
	}
	
	public function getAllList(){
		return $this->index;
	}
	
	public function getAreaListCount($pid = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select count(*) from area";
		if(!empty($pid))
			$str_query .= " where pid = {$pid}";
			
		$arr_output = DB::selectQuery($str_query);
		return $arr_output[0][0];
	}
	
	public function getAreaList($pid = ''){
		$dbh = DB::get_db_reader();
		$str_query = "select * from area";
		if(!empty($pid))
			$str_query .= " where pid = {$pid}";
			
		$arr_output = DB::selectQueryAssoc($str_query);
		return $arr_output;
	}
	
}