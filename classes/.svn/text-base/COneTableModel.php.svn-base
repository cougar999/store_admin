<?php
class COneTableModel implements ITableModel{
	public $tm_table   = '';
	public $tm_prikey  = 0;
	public $tm_field   = array();
	public $tm_columns = array();
	public $tm_dbo     = null;
	
	public function __construct($table='')
	{
		!empty($table) && $this->initModel($table);
	}
	public function initModel($table){
		$tmp_exp = explode('.',$table);
		$this->tm_dbo     = (1<count($tmp_exp)?DB::get_db_reader($tmp_exp[0]):DB::get_db_reader());
		$sql 			  = "DESC `{$table}`";
		$tmp_column       = DB::selectQueryAssoc($sql);
		foreach((array)$tmp_column as $item){
			$this->tm_columns[$item['Field']] = $item;
		}
		$this->tm_table   = $table;
		$this->tm_field   = $this->getColumn('field','*');
		$tmp 		      = $this->getColumn('key','PRI');
		$this->tm_prikey  = $tmp[0]['Field'];
	}
	public function getColumn($key,$val){
		$rt = array();
		foreach((array)$this->tm_columns as $k=>$v){
			if('*'==$val) $rt[] = $v[ucwords($key)];
			else if($v[ucwords($key)]==$val) $rt[] = $v;
		}
		return $rt;
	}
	public function doFilterField($feild,$val,$type='select'){
		$type = $this->tm_columns[$feild]['Type'];
		if(false === stripos($type,'int')){
			$val = mysql_escape_string(trim($val));
		}else $val = floatval($val);
		return $val;
	}
	
	public function select($pra){
		!$pra['sel']  && $pra['sel'] = '*';
		
		$sql  		  = "select {$pra['sel']}
						 from `".$this->tm_table."`
						 where 1";
		foreach((array)$pra['where'] as $k=>$v){
			if(in_array($k,$this->tm_field)){
				if('' == $v) continue;
				if(false === stripos($v,"[*{$k}*]")){
					$v    = $this->doFilterField($k,$v);
					$sql .= " and `{$k}` ".(false===stripos($this->tm_columns[$k]['Type'],'int')?"like '%{$v}%'":"= {$v}");
				}else $sql .= " and ".str_ireplace("[*{$k}*]",$k,$v);
			}
		}
		$sql .= $pra['ots'];
		return (array)DB::selectQueryAssoc($sql);
	}
}
?>