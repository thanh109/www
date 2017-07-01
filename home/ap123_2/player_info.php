<?php
try
 {
	require_once './common.inc.php'; 
	header("content-Type: text/html; charset=Utf-8"); 
 	
	if(!isset($_REQUEST['u']) OR !isset($_REQUEST['sign']))
	{
		exit('-1');
	}
	
	$user = $_REQUEST['u'];
	$sign = $_REQUEST['sign'];
	
	mysql_query("SET NAMES latin1");

  	if( $user=="" OR $sign=="")
	{
		echo -1;
		return ;
	}
 	

	if($sign != MD5($user.$serverid.$loginkey))
	{
		exit('-1');
	}

	
	$arrayuser = "";
	$temp = "";
	$sql = "SELECT rname,level FROM t_roles WHERE userid='$user' AND zoneid=$serverid AND isdel=0 limit 3";
	$sqlquery = $db ->query($sql); 
	$rnum = $db ->num_rows($sqlquery);
	
	if( $rnum <= 0 )
	{
		exit('-1');
	}	
	
	echo "{";
	echo '"'.$user.'":';
	//循环输出每个角色信息
	echo "[";
	for($i=0;$i<$rnum;$i++)
	{
		$temp= array('name'=>iconv("gb2312","UTF-8//IGNORE",mysql_result($sqlquery,$i,"rname")),'level'=>mysql_result($sqlquery,$i,"level"));
		echo json_encode($temp);
		if($rnum>($i+1))
		{
			echo ",";
		}
	}
	echo "]}";

	
	
}catch(Exception $e)
{
	exit('-1');
}

?>