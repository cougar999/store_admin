<?php
define('TP_APP_DIR'			,	dirname(__FILE__));
define('TP_TPL_DIR'			,	TP_APP_DIR.'/templates/');
define('TP_LIB_DIR'			,	TP_APP_DIR.'/libs/includes/');
define('TP_PlG_DIR'			,	TP_APP_DIR.'/libs/plugins/');
define('TP_WGT_DIR'			,	TP_APP_DIR.'/widget/');
define('TP_CAH_DIR'			,	TP_APP_DIR.'/cache/');
define('TP_DATA_DIR'		,	TP_APP_DIR.'/data/');
define('TP_CONTROLLER_DIR'	,	TP_APP_DIR.'/controllers/');
/*
define('PIC_PATH'			,	"http://172.16.16.104:81");
define('_COOKIE_KEY_'		,	"xOoeDqI3Jjj3jyUcfGLHkkKFIUvf3EhSAtk3zdderOF6jIRstxD9FhtZ");*/

define('PIC_PATH'			,	"http://tadmin.apstore.cn");
define('_COOKIE_KEY_'		,	"xOoeDqI3Jjj3jyUcfGLHkkKFIUvf3EhSAtk3zdderOF6jIRstxD9FhtZ");
define('DEFAULT_ADMIN_USER' ,	1);
/****定义缓存更新接口********start**********/
define('PRODUCT_UPDATE_CACHE'		 , "http://172.16.16.169:8080/store_product_war/servlet/ProductServlet");	//单个分类更新缓存
define('CATEGORY_UPDATE_CACHE'		 , "http://172.16.16.169:8080/store_product_war/servlet/CategoryServlet");	//单个分类更新缓存
define('NODE_UPDATE_CACHE'			 , "http://172.16.16.105:12113/store_publish_war/inter/upnode.jsp");		//单个节点更新缓存
define('NODE_ALL_UPDATE_CACHE'		 , "http://172.16.16.105:12113/store_publish_war/inter/upcache.jsp");		//节点列表更新缓存
define('PROMOTE_UPDATE_CACHE'		 , "http://172.16.16.105:12112/store_promote_war/inter/uppromote.jsp");		//单个促销活动更新缓存
define('PROMOTE_ALL_UPDATE_CACHE'	 , "http://172.16.16.105:12112/store_promote_war/inter/upcache.jsp");		//全节点促销活动更新缓存
define('PRODUCT_INDEX_UPDATE_CACHE'	 , "http://172.16.16.105:12117/store_search_war/api/productIndexApi.jsp");	//商品索引更新缓存
define('SHOP_INDEX_UPDATE_CACHE'	 , "http://172.16.16.105:12117/store_search_war/api/shopIndexApi.jsp");		//店面索引更新缓存
define('SHOP_UPDATE_CACHE'			 , "http://172.16.16.105:12116/store_order_war/refreshShop.jsp");			//店面实体更新缓存
define('USER_QUESTION_UPDATE_CACHE'	 , "http://172.16.16.105:12114/store_user_war/remoting/question");			//问答更新缓存

/****定义缓存更新接口********start**********/
/*
define('PRODUCT_UPDATE_CACHE'            , "http://product.store.com/store_product_war/servlet/ProductServlet");        //单个分类更新缓存
define('CATEGORY_UPDATE_CACHE'           , "http://product.store.com/store_product_war/servlet/CategoryServlet");       //单个分类更新缓存
define('NODE_UPDATE_CACHE'               , "http://publish.store.com/store_publish_war/inter/upnode.jsp");              //单个节点更新缓存
define('NODE_ALL_UPDATE_CACHE'           , "http://publish.store.com/store_publish_war/inter/upcache.jsp");             //节点列表更新缓存
define('PROMOTE_UPDATE_CACHE'            , "http://promote.store.com/store_promote_war/inter/uppromote.jsp");           //单个促销活动更新缓存
define('PROMOTE_ALL_UPDATE_CACHE'        , "http://promote.store.com/store_promote_war/inter/upcache.jsp");             //全节点促销活动更新缓存
define('PRODUCT_INDEX_UPDATE_CACHE'      , "http://search.store.com/store_search_war/api/productIndexApi.jsp");			//商品索引更新缓存
define('SHOP_INDEX_UPDATE_CACHE'		 , "http://search.store.com/store_search_war/api/shopIndexApi.jsp");		//店面索引更新缓存
define('SHOP_UPDATE_CACHE'				 , "http://order.store.com/store_order_war/refreshShop.jsp");			//店面实体更新缓存
define('USER_QUESTION_UPDATE_CACHE'		 , "http://user.store.com/store_user_war/remoting/question");			//问答更新缓存
*/
/****定义缓存更新接口********end**********/

require_once(TP_APP_DIR.'/classes/Autoload.php');
require_once(TP_APP_DIR.'/classes/interfaces.php');
spl_autoload_register(array(Autoload::getInstance(), 'load'));

require_once(TP_DATA_DIR."common_array.php");
require_once(TP_LIB_DIR."common.php");
require_once(TP_CONTROLLER_DIR."Validate.php");
?>