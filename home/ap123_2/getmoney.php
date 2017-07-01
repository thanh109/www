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
	
 	$selectorder = "SELECT userid,money,realmoney FROM t_money WHERE money > 0";
 	$isorder = $db ->query($selectorder); 
	$count = $db ->num_rows($isorder);
   	
	if($count<=0)
 	{
 		exit('');
 	}
 	
	for($i=0;$i<$count;$i++)
	{
		echo mysql_result($isorder,$i,"userid").",";
		echo mysql_result($isorder,$i,"money").",";
		echo mysql_result($isorder,$i,"realmoney")."|";
	}
		
}catch(Exception $e)
{
	exit('');
}

?>