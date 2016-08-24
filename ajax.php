<?php
require_once(dirname(__FILE__)."/config.php");

$controller = isset($controller) ? $controller : $_REQUEST['controller'];
$fc = isset($fc) ? $fc : $_REQUEST['fc'];

if(!empty($controller) && !empty($fc)){
	$class_name = $controller."Controller";
	$obj_class = new $class_name();
	
	$arr_result = $obj_class->$fc();
}else{
	//抛出异常
}