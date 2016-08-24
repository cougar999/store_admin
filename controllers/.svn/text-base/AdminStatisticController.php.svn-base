<?php
class AdminStatisticController extends AdminController{
	
	public function __construct(){
		//$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		$this->assign('page', Statistic::getPageList($pageno) );
		$this->view('statistic/index.html');
	}
	
	public function statisticalGraphAction(){
		$arr_list = Statistic::getUVList($pageno);
		krsort($arr_list);
		foreach ($arr_list as $row){
			$graph['categories'][] = $row['stat_date'];
			$graph_hash['series']['pv'][] = intval($row['pv']);
			$graph_hash['series']['uv'][] = intval($row['uv']);
		}
		$graph['title']['text'] = '流量统计图';
		$graph['subtitle']['text'] = '日统计';
		$graph['series'][0]['name'] = 'pv';
		$graph['series'][0]['data'] = $graph_hash['series']['pv'];
		$graph['series'][1]['name'] = 'uv';
		$graph['series'][1]['data'] = $graph_hash['series']['uv'];
		$graph = json_encode($graph);
		$this->assign('stat_data', $graph);
		$this->view('statistic.tpl' , '');
	}
}

?>