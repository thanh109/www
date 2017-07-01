<?php
try
 {
	require_once './common.inc.php'; 
	
	date_default_timezone_set("PRC");

	$starttime = 0;//time() - 1800;
	$lasttime = time() - 180;
	$sql = "SELECT * FROM t_userstat WHERE rectime>" . $starttime . " AND rectime<" . $lasttime;
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "数据错误sql=".$sql;
		return;
	}

	$totalcount = $db ->num_rows($isorder);

	$sql = "SELECT * FROM t_userstat WHERE eventid=0 AND rectime>" . $starttime . " AND rectime<" . $lasttime;
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "数据错误sql=".$sql;
		return;
	}

	$count0 = $db ->num_rows($isorder);


	$sql = "SELECT * FROM t_userstat WHERE eventid=1 AND rectime>" . $starttime . " AND rectime<" . $lasttime;
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "数据错误sql=".$sql;
		return;
	}

	$count1 = $db ->num_rows($isorder);

	$sql = "SELECT * FROM t_userstat WHERE eventid=2 AND rectime>" . $starttime . " AND rectime<" . $lasttime;
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "数据错误sql=".$sql;
		return;
	}

	$count2 = $db ->num_rows($isorder);


	$sql = "SELECT * FROM t_userstat WHERE eventid=3 AND rectime>" . $starttime . " AND rectime<" . $lasttime;
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "数据错误sql=".$sql;
		return;
	}

	$count3 = $db ->num_rows($isorder);

	$sql = "SELECT * FROM t_userstat WHERE eventid=4 AND rectime>" . $starttime . " AND rectime<" . $lasttime;
	$isorder = $db ->query($sql); 
	if(null == $isorder)
	{
		echo "数据错误sql=".$sql;
		return;
	}

	$count4 = $db ->num_rows($isorder);

	echo "总进入账户=" . $totalcount . ",加载页流失=" . $count0 . "(" . $count0 * 100 / $totalcount . "%)" . ",Flash加载后流失=" . $count1 . "(" . $count1 * 100 / $totalcount . "%)" . ",创建界面流失=" . $count2 . "(" . $count2 * 100 / $totalcount . "%)" . ",创建角色后流失=" . $count3  . "(" . $count3 * 100 / $totalcount . "%)" .  ",进入游戏用户=" . $count4 . "(" . $count4 * 100 / $totalcount . "%)";
		
}catch(Exception $e)
{
	echo "fail" ;
}

?>