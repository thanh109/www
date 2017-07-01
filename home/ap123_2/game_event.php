<?php
try
 {
	require_once './common.inc.php'; 
	
	//提取参数
	$serverid = $_GET['serverid'];
	$userid = $_GET['userid'];
	$eventid = $_GET['event'];
	$rectime = $_GET['time'];

	date_default_timezone_set("PRC");

  if(!isset($serverid) or !isset($userid) or !isset($eventid) 
		or !isset($rectime))
	{
		echo "params error";
		return ;
	}
	
	$rectime = time();
	$addloginnum = 0;
	if ($eventid >= 4)
	{
		$addloginnum = 1;
	}

	$sql = "INSERT INTO t_userstat (userid, serverid, eventid, rectime, loginnum) VALUES ($userid, $serverid, $eventid, $rectime, $addloginnum) ON DUPLICATE KEY UPDATE eventid=$eventid, rectime=$rectime, loginnum=loginnum+$addloginnum";
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "插入数据错误sql=".$sql;
		return;
	}

	echo "ok";
		
}catch(Exception $e)
{
	echo "fail" ;
}

?>