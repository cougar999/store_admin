<?php
function mkdirs($path, $mode = 0777){ 
	$dirs = explode('/',$path); 
	$pos = strrpos($dirs[(count($dirs)-1)], "."); 
	if ($pos === false) { 
		$subamount=0; 
	} 
	else { 
		$subamount=1; 
	} 
	
	for ($c=0;$c < count($dirs) - $subamount; $c++) { 
		$thispath=""; 
		for ($cc=0; $cc <= $c; $cc++) { 
			$thispath.=$dirs[$cc].'/'; 
		} 
		if (!file_exists($thispath)) { 
			mkdir($thispath,$mode); 
		} 
	} 
}

/**
	* Get a value from $_POST / $_GET
	* if unavailable, take a default value
	*
	* @param string $key Value key
	* @param mixed $default_value (optional)
	* @return mixed Value
*/
function getValue($key, $default_value = false)
{
	if (!isset($key) || empty($key) || !is_string($key))
		return false;
	$ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

	if (is_string($ret) === true)
		$ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
	return !is_string($ret)? $ret : stripslashes($ret);
}

function getIsset($key)
{
	if (!isset($key) || empty($key) || !is_string($key))
		return false;
	return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
}

/**
	* Check if submit has been posted
	*
	* @param string $submit submit name
*/
function isSubmit($submit)
{
	return (
		isset($_POST[$submit]) || isset($_POST[$submit.'_x']) || isset($_POST[$submit.'_y'])
		|| isset($_GET[$submit]) || isset($_GET[$submit.'_x']) || isset($_GET[$submit.'_y'])
	);
}
/**
	* Encrypt password
	*
	* @param string $passwd String to encrypt
*/
function encrypt($passwd)
{
	return md5(_COOKIE_KEY_.$passwd);
}
/**
	* Display an error according to an error code
	*
	* @param string $string Error message
	* @param boolean $htmlentities By default at true for parsing error message with htmlentities
*/
function displayError($string = 'Fatal error', $htmlentities = true)
{
	global $_ERRORS;
	$_ERRORS = array();

	if (!is_array($_ERRORS))
		return str_replace('"', '&quot;', $string);
	
	$key = md5(str_replace('\'', '\\\'', $string));
	$str = (isset($_ERRORS) && is_array($_ERRORS) && array_key_exists($key, $_ERRORS)) ? ($htmlentities ? htmlentities($_ERRORS[$key], ENT_COMPAT, 'UTF-8') : $_ERRORS[$key]) : $string;
	return str_replace('"', '&quot;', stripslashes($str));
}

/**
	* Display a warning message indicating that the method is deprecated
	* (display in firefox console if Firephp is enabled)
*/
function displayAsDeprecated($message = null)
{
	if (_PS_DISPLAY_COMPATIBILITY_WARNING_)
	{
		$backtrace = debug_backtrace();
		$callee = next($backtrace);
		if (PS_USE_FIREPHP)
			FB::warn('Function <strong>'.$callee['function'].'()</strong> is deprecated in <strong>'.$callee['file'].'</strong> on line <strong>'.$callee['line'].'</strong><br />', 'Deprecated method');
		else
			trigger_error('Function <strong>'.$callee['function'].'()</strong> is deprecated in <strong>'.$callee['file'].'</strong> on line <strong>'.$callee['line'].'</strong><br />', E_USER_WARNING);

		$message = sprintf(
			Tools::displayError('The function %1$s (Line %2$s) is deprecated and will be removed in the next major version.'),
			$callee['function'],
			$callee['line']
		);
		Logger::addLog($message, 3, $callee['class']);
	}
}

/**
	* Get the server variable REMOTE_ADDR, or the first ip of HTTP_X_FORWARDED_FOR (when using proxy)
	*
	* @return string $remote_addr ip of client
*/
function getRemoteAddr()
{
	// This condition is necessary when using CDN, don't remove it.
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && (!isset($_SERVER['REMOTE_ADDR']) || preg_match('/^127\..*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^172\.16.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^192\.168\.*/i', trim($_SERVER['REMOTE_ADDR'])) || preg_match('/^10\..*/i', trim($_SERVER['REMOTE_ADDR']))))
	{
		if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ','))
		{
			$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			return $ips[0];
		}
		else
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $_SERVER['REMOTE_ADDR'];
}

function mathInPrice($price){
	return intval($price*100);
}

function mathOutPrice($price){
	return $price/100;
}
function GetCurlUrl() {
	if (! empty ( $_SERVER ['REQUEST_URI'] )) {
		$scriptName = $_SERVER ['REQUEST_URI'];
		$nowurl = $scriptName;
	} else {
		$scriptName = $_SERVER ['PHP_SELF'];
		if (empty ( $_SERVER ['QUERY_STRING'] )) {
			$nowurl = $scriptName;
		} else {
			$nowurl = $scriptName . "?" . $_SERVER ['QUERY_STRING'];
		}
	}
	return "http://" . $_SERVER ['HTTP_HOST'] . $nowurl;
}
/*
 * ��ȡ����
 */
function getUrlRoot($url){
	#���ͷ����β��
	$url = $url . "/";
	#�ж�����
	preg_match("/((\w*):\/\/)?\w*\.?([\w|-]*\.(com.cn|net.cn|gov.cn|org.cn|com|net|cn|org|asia|tel|mobi|me|tv|biz|cc|name|info))\//", $url, $ohurl);
	#�ж�IP
	if($ohurl[3] == ''){
        preg_match("/((\d+\.){3}\d+)\//", $url, $ohip);
        return $ohip[1];
	}
	return $ohurl[3];
}
function getFromUrl($default){
	return !empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!=GetCurlUrl() && getUrlRoot($_SERVER['HTTP_REFERER'])==getUrlRoot(GetCurlUrl()) ? $_SERVER['HTTP_REFERER'] : $default;
}

function guid(){
   if (function_exists('com_create_guid')){
       return com_create_guid();
   }else{
       mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
       $charid = strtoupper(md5(uniqid(rand(), true)));
       $hyphen = chr(45);// "-"
       $uuid = chr(123)// "{"
               .substr($charid, 0, 8).$hyphen
               .substr($charid, 8, 4).$hyphen
               .substr($charid,12, 4).$hyphen
               .substr($charid,16, 4).$hyphen
               .substr($charid,20,12)
               .chr(125);// "}"
       return $uuid;
   }
}

?>