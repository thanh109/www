<?php
	require_once './common.inc.php'; 
	
	function returnlog($logtyp)
	{
		if($logtyp == 0)
		{
			$arr=array('msg'=>'t');
			$callback = $_REQUEST['callback'];
			exit( $callback.'('.json_encode($arr).')');
		}else{
			$arr=array('msg'=>'f');
			$callback = $_REQUEST['callback'];
			exit( $callback.'('.json_encode($arr).')');
		}
	}
	
	$uip = $_SERVER["REMOTE_ADDR"];
	if($uip!="182.254.149.175"  AND $uip!="115.159.29.132" AND $uip!="182.254.231.97")
	{
		returnlog(1);
	}

	$gmType = $_REQUEST['gmtype'];
	$value = $_REQUEST['gmvalue'];

	if($gmType =="" OR $value == "")
	{
		returnlog(1);
	}
	$sqlcmdg = "";
	switch ($gmType)
	{
		case 1://¹«¸æ
		  $value = urldecode($value);
		  $value = iconv('UTF-8//IGNORE','gb2312',$value); 
		  $value = str_replace(" ","",$value);
		  $txt = "-bull 1 1 1 ".$value;	
		  $sqlcmdg = "INSERT INTO t_gmmsg (msg) VALUES('$txt')";
		  break;
		default:
		  $sqlcmdg = "";
	}
	if($sqlcmdg != "")
	{
	 	$result = $db ->query($sqlcmdg); 
	 	if($result != NULL)
		{
			returnlog(0);
		}else{
			returnlog(1);
		}
	}else {
		returnlog(1);
	}
	
 ?>