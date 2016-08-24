<?php
date_default_timezone_set('PRC');
require_once(dirname(__FILE__)."/config.php");
require_once(TP_DATA_DIR."site.php");
require_once(TP_LIB_DIR."template.php");
require_once(TP_LIB_DIR."post.php");

$site_info = $arr_site[1];

$tp_tpl_appname = $site_info;
$tp_tpl_layout = isset($tp_tpl_layout) ? $tp_tpl_layout : "layout.html";
$tp_tpl_assign = array('tp' => $tp, 'ap_int' => $ap_int);
$tp_tpl_instance = tp_tpl_engine($tp_tpl_appname);

$tp_tpl_page = isset($tp_tpl_page) ? $tp_tpl_page : ($_GET['tp_tpl_page'] != '' ? $_GET['tp_tpl_page'] : 'index.html');
$tp_tpl_page_group = explode("/", $tp_tpl_page);
$str_controller = (strpos($tp_tpl_page_group[0], ".") ? ucfirst(strtolower(substr($tp_tpl_page_group[0], 0, strpos($tp_tpl_page_group[0], ".")))) : ucfirst(strtolower($tp_tpl_page_group[0])));

include TP_APP_DIR.'/init.php';

$tp_tpl_assign['tp_tpl_page'] = $tp_tpl_page;
$tp_tpl_assign['tp_tpl_page_group'] = $tp_tpl_page_group;
$tp_tpl_assign['tp_tpl_page_plugin'] = $tp_tpl_page_plugin;
$tp_tpl_assign['tp_tpl_layout'] = $tp_tpl_layout;

tp_tpl_display($tp_tpl_instance, $tp_tpl_page, $tp_tpl_layout, $tp_tpl_assign, $tp_tpl_page_plugin);
?>