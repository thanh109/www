<?php
try
 {
	require_once './common.inc.php'; 
	$uip = $_SERVER["REMOTE_ADDR"];
	header("Content-type: text/html; charset=utf-8"); 
	//if($uip!="61.174.52.93" AND $uip!="101.64.178.103")
	//{
	//	exit('');
	//}
	
 	$selectorder = "SELECT *  FROM t_config WHERE paramname='gamedb_version' OR paramname='gameserver_version'";
 	$isorder = $db ->query($selectorder); 
	$count = $db ->num_rows($isorder);
   	
	if($count<=0)
 	{
 		exit('');
 	}
 	
	for($i=0;$i<$count;$i++)
	{
		echo mysql_result($isorder,$i,"paramvalue").",";
	}
		
}catch(Exception $e)
{
	exit('');
}

?>