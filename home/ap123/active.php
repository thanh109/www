<?php
try
 {
	require_once './common.inc.php'; 

	if(!isset($_REQUEST['u']) OR !isset($_REQUEST['s']) OR !isset($_REQUEST['sign']))
	{
		echo "0";
		return ;
	}

	$u = stripslashes($_REQUEST['u']);
	$s = $_REQUEST['s'];
	$sign = stripslashes($_REQUEST['sign']);

  	if( $u=="" OR $s=="" OR $sign=="")
	{
		echo "0";
		return ;
	}

	$MYmd5 = md5($u.$s.$loginkey);

	if($MYmd5 == $sign)
	{
		$sroles = "SELECT userid FROM t_roles WHERE userid='$u' AND zoneid=$s";
 		$isroles = $db ->query($sroles); 
 		$rs = $db ->num_rows($isroles);
		if( $rs <= 0 )
		{
			echo 0;
			return;
		}
		else
		{
			echo 1;
			return;
		}
	}
	else
	{
		echo 0;
		return ;
	}

}catch(Exception $e)
{
	echo "0" ;
}

?>