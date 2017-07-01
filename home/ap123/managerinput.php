<?php
try
 {
	require_once './common.inc.php'; 
	$uip = $_SERVER["REMOTE_ADDR"];
	header("Content-type: text/html; charset=utf-8"); 
	if($uip!="61.174.52.93" AND $uip!="101.64.178.103")
	{
	//	echo "fail";
	//	return;
	}

	if($uip!="182.254.149.175"  AND $uip!="115.159.29.132" AND $uip!="182.254.231.97" AND $uip!="202.31.214.12" AND $uip!="203.69.146.41")
	{
		exit('');
	}

	if(!isset($_REQUEST['amount']) OR !isset($_REQUEST['u']) OR !isset($_REQUEST['order_no']) OR !isset($_REQUEST['time']) OR !isset($_REQUEST['sign']) OR !isset($_REQUEST['serverid']))
	{
		echo "fail";
		return ;
	}

	$amount = stripslashes($_REQUEST['amount']);
	$u = stripslashes($_REQUEST['u']);
	$order_no = stripslashes($_REQUEST['order_no']);
	$time = stripslashes($_REQUEST['time']);
	$sign = stripslashes($_REQUEST['sign']);
	$dates = date('Y-m-d H:i:s');
	$rname = str_replace(" ","+",$_REQUEST['rname']);
	$rname = base64_decode($rname);
	$serverid = $_REQUEST['serverid'];

  	if($amount =="" OR $u=="" OR $order_no=="" OR $time=="" OR $sign=="" OR $rname=="")
	{
		echo "fail";
		return ;
	}
	
 	function err($err)
	{
		global $serverid;
 		global $amount ;
		global $u;
		global $order_no;
		global $time;
		global $sign;
		global $dates;
		global $db;
		
		$sqlerr = "";
		echo $err;
	}
	
 	function execute()
 	{
		global $serverid;
 		global $amount ;
		global $u;
		global $order_no;
		global $time;
		global $sign;
		global $dates;
		global $db;
		
		$log = "success";
 		$sql = "";
 		$sqllog = "";
 		$sqlMoney = "";
 		$sqlOrder="";
 		
		$sqllog = "INSERT INTO t_inputlog2 (amount,u,order_no,cporder_no,time,sign,inputtime,result,zoneid) VALUES ($amount,'$u','$order_no','$order_no',$time,'$sign',now(),'$log',$serverid)";
		$db ->query($sqllog);
 		
		$sqlAddMoney = "INSERT INTO t_tempmoney (uid,addmoney) VALUES ('$u',$amount)";
		$db ->query($sqlAddMoney); 
		$fp=fopen("ManagerinputLog.log","a");
		fwrite($fp,$dates."	".$sqlAddMoney."\r\n");
		fclose($fp);
		echo $log;
	}
	
	
	$Key ="podpfogiwwretx";
	$MYmd5 = md5($amount.$u.$order_no.$time.$Key);
	
	if($MYmd5 == $sign)
	{
		global $db;
		
		$sroles = "SELECT userid FROM t_roles WHERE userid='$u' AND rname='$rname' LIMIT 1";
 		$isroles = $db ->query($sroles); 
 		$rs = $db ->num_rows($isroles);
		
		if( $rs <= 0 )
		{
			exit("fail");
		}
		else
		{
			execute();//验证完写入正确数据
		} 
		
	}
	else
	{	
		err("err_sign");
		return ;
	}
}catch(Exception $e)
{
	echo "fail5" ;
}

?>