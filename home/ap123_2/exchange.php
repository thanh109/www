<?php
try
 {
	require_once './common.inc.php'; 
	$uip = $_SERVER["REMOTE_ADDR"];
	header("Content-type: text/html; charset=utf-8"); 
	$whiteiplist = "115.159.75.99,115.159.75.233,182.254.148.230,115.159.24.238,182.254.208.126,115.159.4.19,115.159.72.175,182.254.151.168,115.159.75.96,115.159.72.41,115.159.1.140,115.159.29.132";
	$arrip = explode(",",$whiteiplist);
	if(!in_array($uip,$arrip))
	{
		echo "fail";
		return;
	}

	if(!isset($_REQUEST['amount']) OR !isset($_REQUEST['u']) OR !isset($_REQUEST['zoneid']) OR !isset($_REQUEST['order_no']) OR !isset($_REQUEST['cporder_no']) OR !isset($_REQUEST['time']) OR !isset($_REQUEST['sign']))
	{
		echo "fail";
		return ;
	}

	$amount = stripslashes($_REQUEST['amount']);
	$u = stripslashes($_REQUEST['u']);
	$zoneid = stripslashes($_REQUEST['zoneid']);
	$order_no = stripslashes($_REQUEST['order_no']);
	$cporder_no = stripslashes($_REQUEST['cporder_no']);
	$time = stripslashes($_REQUEST['time']);
	$sign = stripslashes($_REQUEST['sign']);
	$dates = date('Y-m-d H:i:s');
	
  	if($amount =="" OR $u=="" OR $order_no=="" OR $time=="" OR $sign=="")
	{
		echo "fail";
		return ;
	}
  	if(!is_numeric($amount))
	{
		echo "fail";
		return ;
	}
 	function err($err)
	{
		global $serverid;
 		global $amount ;
		global $u;
		global $zoneid;
		global $order_no;
		global $cporder_no;
		global $time;
		global $sign;
		global $dates;
		global $db;
		
		$sqlerr = "";
		$sqlerr = "INSERT INTO t_inputlog (amount,u,order_no,cporder_no,time,sign,inputtime,result,zoneid) VALUES ($amount,'$u','$order_no','$cporder_no',$time,'$sign','$dates','$err',$zoneid)";
		$db ->query($sqlerr); 
		echo $err;
	}
	
 	function execute()
 	{
		global $serverid;
 		global $amount ;
		global $u;
		global $zoneid;
		global $order_no;
		global $cporder_no;
		global $time;
		global $sign;
		global $dates;
		global $db;
		
		$log = "success";
 		$sql = "";
 		$sqllog = "";
 		$sqlMoney = "";
 		$sqlOrder="";
 		$u = iconv("utf-8","gb2312//IGNORE",$u);
 		$selectorder = "SELECT order_no FROM t_order WHERE order_no='$order_no'";
 		$isorder = $db ->query($selectorder); 
 		$row = $db ->num_rows($isorder);
 		if($row>0)
 		{
			$log = "success";
 			//$sql = "INSERT INTO t_inputlog (amount,u,order_no,cporder_no,time,sign,inputtime,result,zoneid) VALUES ($amount,'$u','$order_no','$cporder_no',$time,'$sign','$dates','$log',$zoneid)";
			//$db ->query($sql); 
 		}
 		else 
 		{			
			$sqlOrder = "INSERT INTO t_order (order_no) VALUES ('$order_no')";
			$isinserorder = $db->query($sqlOrder); 
			if($isinserorder != null)
			{	
	 			$sqllog = "INSERT INTO t_inputlog (amount,u,order_no,cporder_no,time,sign,inputtime,result,zoneid) VALUES ($amount,'$u','$order_no','$cporder_no',$time,'$sign','$dates','$log',$zoneid)";
				$db ->query($sqllog);

				$sqlAddMoney = "INSERT INTO t_tempmoney (uid,addmoney) VALUES ('$u',$amount)";
				$db ->query($sqlAddMoney); 
			}else
			{
				$log = "fail" ;
			}
 		}
		echo $log;
	}
	
	$MYmd5 = md5($amount.$u.$zoneid.$order_no.$cporder_no.$time.$czkey);
	
	if($MYmd5 == $sign)
	{
		execute();//验证完写入正确数据
		return ;
	}
	else
	{
		err("err_sign");
		return ;
	}
	
	
}catch(Exception $e)
{
	echo "fail" ;
}

?>