<?php
try
 {
	require_once './common.inc.php'; 
	$uip = $_SERVER["REMOTE_ADDR"];
	header("Content-type: text/html; charset=utf-8"); 
	/*if($uip!="61.174.52.93" AND $uip!="101.64.178.103")
	{
		exit('');
	}*/

	$uip = $_SERVER["REMOTE_ADDR"];
	if($uip!="101.251.105.180" AND $uip!="106.39.11.26" AND $uip!="182.254.149.175" AND $uip!="101.95.156.206" AND $uip!="101.95.156.202" AND $uip!="180.173.115.215" AND $uip!="183.61.70.250" AND $uip!="180.173.216.141" AND $uip!="124.127.243.74" AND $uip!="115.159.75.99" AND $uip!="120.132.74.13" )
	{
		exit('');
	}

	$lasttime= $_REQUEST['lasttime'];
	$serverid= $_REQUEST['serverid'];
 	$selectorder = "SELECT order_no,amount,u,inputtime,zoneid FROM t_inputlog where inputtime>'$lasttime' AND result='success' AND zoneid=$serverid";
 	$isorder = $db ->query($selectorder); 
	$count = $db ->num_rows($isorder);
   	
	if($count<=0)
 	{
 		exit('');
 	}
 	
	for($i=0;$i<$count;$i++)
	{
		echo mysql_result($isorder,$i,"zoneid").",";
		echo mysql_result($isorder,$i,"u").",";
		echo mysql_result($isorder,$i,"amount").",";
		echo mysql_result($isorder,$i,"order_no").",";			
		echo mysql_result($isorder,$i,"inputtime")."|";
	}
		
}catch(Exception $e)
{
	exit('');
}

?>