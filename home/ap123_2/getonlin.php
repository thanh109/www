
<?php
try
 {
	require_once './common.inc.php'; 
	header("Content-type: text/html; charset=utf-8"); 
	
 	$selectorder = "SELECT num,rectime,mapnum FROM t_onlinenum ORDER BY id DESC limit 1";
 	$isorder = $db ->query($selectorder); 
	$count = $db ->num_rows($isorder);
   	
	if($count<=0)
 	{
 		exit('');
 	}
 	
	for($i=0;$i<$count;$i++)
	{
		$total =  mysql_result($isorder,$i,"num");
		$time = mysql_result($isorder,$i,"rectime");		
		$meminmap = mysql_result($isorder,$i,"mapnum");	
		$data = array(
		"online" => $total,
		"timecheck" => $time,
		"user_map" => $meminmap
		);
		echo json_encode($data);
	}
		
}catch(Exception $e)
{
	exit('');
}

?>