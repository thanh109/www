<?php

require_once './db_mysql.class.php'; 
require_once './config.php';

if(PHP_VERSION < '4.1.0') {
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}

$timestamp = time();
$PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];

if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
	$onlineip = getenv('HTTP_CLIENT_IP');
} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
	$onlineip = getenv('HTTP_X_FORWARDED_FOR');
} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
	$onlineip = getenv('REMOTE_ADDR');
} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
	$onlineip = $_SERVER['REMOTE_ADDR'];
}

$onlineip = preg_replace("/^([\d\.]+).*/", "\\1", $onlineip);

$pconnect=0;
$db = new dbstuff; 
$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect); 
unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);

?>