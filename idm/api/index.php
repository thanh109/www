<?php
ob_start("ob_gzhandler");
$CONN_HOST = "localhost";
$CONN_USER = "root";
$CONN_PASS = "hipcon123";
$CONN_DATA = "mu_android_stat";

$CONN = mysql_connect($CONN_HOST, $CONN_USER, $CONN_PASS);
if (!$CONN) { die('Unable to connect: ' . mysql_error());}
$CONNDB = mysql_select_db($CONN_DATA,$CONN);

$PHP_ACT			= @$_REQUEST['act'];

$PHP_LOGIN_USERNAME	= @$_REQUEST['username'];
$PHP_LOGIN_USERPASS	= @$_REQUEST['userpass'];

$PHP_REGIS_USERNAME	= @$_REQUEST['user_name'];
$PHP_REGIS_USERPASS	= @$_REQUEST['password'];
$PHP_REGIS_EMAIL	= @$_REQUEST['email'];

switch ($PHP_ACT) 
{
    case "10":
	{
        $PHP_QUERY = "select * from T_ACCOUNT where name='$PHP_LOGIN_USERNAME' and passwd='$PHP_LOGIN_USERPASS'";
		$PHP_RESULT = mysql_query($PHP_QUERY);
		$PHP_LOGIN = mysql_num_rows($PHP_RESULT);
		if($PHP_LOGIN > 0)
		{
			$PHP_QUERY="select * from T_ACCOUNT where name='$PHP_LOGIN_USERNAME'";  
			$PHP_RESULT=mysql_query($PHP_QUERY);
			$row=mysql_fetch_array($PHP_RESULT, MYSQL_ASSOC);
			$RETORNO = '{
			"retcode": 0,
			"retmsg": "SUCCESS",
			"data" : {"uid": "'.$row["name"].'","ipv4": "'.$row["ACCOUNT_IP"].'","indulge": 1,"uname": "'.$row["name"].'","KL_SSO": "'.$row["name"].'","KL_PERSON": "'.$row["name"].'","isnew":"true"}}';
			echo $RETORNO;
		}
		else
		{
			$RETORNO = '{
			"retcode" : 1,
			"retmsg" : "Sai tên đăng nhập hoặc mật khẩu !",
			"data" : {"uid": "-3","ipv4": "'.getIP().'","indulge": -1,"uname": "","KL_SSO": "","KL_PERSON": ""}}';
			echo $RETORNO;
		}	
        break;
	}
	case "111":
	{
		$PHP_REGIS_QUERY = "select * from T_ACCOUNT where name='$PHP_REGIS_USERNAME'";
		$PHP_REGIS_RESULT = mysql_query($PHP_REGIS_QUERY);
		$PHP_REGISTER = mysql_num_rows($PHP_REGIS_RESULT);
		//echo $PHP_REGISTER;
		if($PHP_REGISTER == 0)
		{
			$PHP_REGIS_QUERY = ("INSERT INTO T_ACCOUNT (
							gold,
							diemthuong,
							thenap,
							napngay,
							name,
							passwd, 
							ACCOUNT_EMAIL, 
							ACCOUNT_IP,
							ACCOUNT_KL_SSO,
							ACCOUNT_KL_PERSON) 
							VALUES (
							'999999999',
							'0',
							'0',
							'0',
							'$PHP_REGIS_USERNAME',
							'$PHP_REGIS_USERPASS',
							'$PHP_REGIS_EMAIL',
							'".getIP()."',
							'QMQJ$PHP_REGIS_USERNAME',
							'$PHP_REGIS_USERNAME')");
			$PHP_REGIS_RESULT=mysql_query($PHP_REGIS_QUERY);
			if($PHP_REGIS_RESULT)
			{
				$PHP_REGIS_QUERY="select * from T_ACCOUNT where name='$PHP_REGIS_USERNAME'";  
				$PHP_REGIS_RESULT = mysql_query($PHP_REGIS_QUERY);
				$PHP_RESULT_ROW = mysql_fetch_array($PHP_REGIS_RESULT, MYSQL_ASSOC);
				echo $RETORNO = ('{
							"retcode": 0,
							"retmsg": "SUCCESS",
							"data": {
							"uid": "'.$PHP_RESULT_ROW["name"].'",
							"ipv4": "'.$PHP_RESULT_ROW["ACCOUNT_IP"].'",
							"indulge": 1,
							"uname": "'.$PHP_RESULT_ROW["name"].'",
							"KL_SSO": "'.$PHP_RESULT_ROW["name"].'",
							"KL_PERSON": "'.$PHP_RESULT_ROW["name"].'"}}');
			}
		}
		else
		{
			echo $RETORNO = ('{
						"retcode": 1,
						"retmsg": "Tài khoản này đã được đăng ký !",
						"data": { "uid": "-3", "ipv4": "'.getIP().'", "indulge": -1, "uname": "", "KL_SSO": "", "KL_PERSON": ""}}');
			
		}
		break;
	}
	case "push.init":
	{	
		break;
	}
}
function getIP()
{
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
   $ip = $_SERVER["HTTP_CLIENT_IP"];
else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
   $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
else if(!empty($_SERVER["REMOTE_ADDR"]))
   $ip = $_SERVER["REMOTE_ADDR"];
else
   $ip = "xxx.xxx.xxx.xxx";
return $ip;
}
?>