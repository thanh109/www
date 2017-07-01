<?php
try
 {
	require_once './common.inc.php'; 
	if(!isset($_REQUEST['u']) OR !isset($_REQUEST['type']) OR !isset($_REQUEST['s']) OR !isset($_REQUEST['sign']))
	{
		echo -1;
		return ;
	}

	$users = stripslashes($_REQUEST['u']);
	$type = stripslashes($_REQUEST['type']);
	$serverid = $_REQUEST['s'];
	$sign = stripslashes($_REQUEST['sign']);

  	if( $users=="" OR $type=="" OR $serverid=="" OR $sign=="")
	{
		echo -1;
		return ;
	}

	$MYmd5 = md5($users.$_REQUEST['s'].$type.$loginkey);
	
	if($MYmd5 != $sign)
	{
		echo -1;
		return ;
	}
	
	$sql = "SELECT m.lipinma,r.userid FROM t_linpinma m,t_roles r WHERE m.usednum=0 AND r.userid=$users AND m.ptid=$type limit 1";
	$sqlquery = $db ->query($sql); 
	if( $db ->num_rows($sqlquery)==0 )
	{
		echo 4;
		return ;
	}
	echo mysql_result($sqlquery,0,"lipinma");
	$sql = "UPDATE t_linpinma SET usednum=1 WHERE lipinma='".mysql_result($sqlquery,0,"lipinma")."'";
	$db ->query($sql);
	
}catch(Exception $e)
{
	echo -103 ;
}

?>