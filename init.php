<?php
session_start();

if(in_array($tp_tpl_page,array("upload_file.html")))
{
	tp_tpl_display($tp_tpl_instance, $tp_tpl_page);
	exit;
}

if (isset($_GET['logout']))
		AdminUser::logout();

//判断登录
if(empty($_SESSION['admin_userid']) && !in_array($str_controller , array("Login")))
	header("Location:/login");

$tp_tpl_page_plugin = $str_controller . "Controller.php";
$controller = $str_controller . "Controller";

//加载admin控制器
if(!file_exists(TP_APP_DIR . '/controllers/' . $tp_tpl_page_plugin)){
	$str_controller = 'Admin' . $str_controller;
	$controller =  $str_controller . "Controller";
	$tp_tpl_page_plugin = $str_controller . "Controller.php";
}
if (file_exists(TP_APP_DIR . '/controllers/' . $tp_tpl_page_plugin) && $tp_tpl_page_plugin != 'index.php') { 
	$tp_tpl_assign['controller'] = $str_controller;
	$instance = new $controller();
	$instance->action();
	exit;
}