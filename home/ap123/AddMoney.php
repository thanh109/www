<?php
	require_once './common.inc.php'; 
	
	function returnlog($logtyp)
	{
		if($logtyp == 0)
		{
			exit( 'ok');
		}else{
			exit('fail');
		}
	}
	
	$uip = $_SERVER["REMOTE_ADDR"];
	$whiteiplist = "124.127.243.74,182.254.149.175,182.254.231.97,115.159.29.132,202.31.214.12,203.69.146.41";
	$arrip = explode(",",$whiteiplist);
	if(!in_array($uip,$arrip))
	{
		exit('fail');
	}

	$MoneyType = $_REQUEST['moneytype'];
	$MoneyValue = $_REQUEST['moneyvalue'];
	$Rid = $_REQUEST['rid'];
	$Userid = $_REQUEST['userid'];
	$Sign = $_REQUEST['sign'];
 
    	$MoneyType = str_replace(" ","",$MoneyType );
	$MoneyValue = str_replace(" ","",$MoneyValue);	
	$Rid = str_replace(" ","",$Rid);	
	$Userid = str_replace(" ","",$Userid);	

	if($MoneyType =="" OR $MoneyValue == "" OR $Rid == "" OR $Userid=="")
	{
		returnlog(1);
	}

	$TypeList = "zaizao,mojing,lingjing,zuanshi";
	$Typearr = explode(",",$TypeList);
	if(!in_array($MoneyType,$Typearr))
	{
		returnlog(1);
	}

	if($MoneyValue>0)
	{
		returnlog(1);
	}

	$czkey="AD6SFaEWRr0aetR_Ety7u%67tyh*DFGh9DSrt";
	$MYmd5 = md5($MoneyType.$MoneyValue.$Rid.$Userid.$czkey);
	if ($MYmd5!=$Sign)
	{
		returnlog(1);
	}	
	
	$sroles = "SELECT userid FROM t_roles WHERE userid='$Userid' AND rid='$Rid' LIMIT 1";
	$isroles = $db ->query($sroles); 
	$rs = $db ->num_rows($isroles);
	
	if( $rs <= 0 )
	{
		returnlog(1);
	}
	
	$sqlcmdg = "";	 		 
	$sqlcmdg = "";
	$txt = "";
	if($MoneyType=="zuanshi")
	{
		$sqlcmdg = "INSERT INTO t_tempmoney (uid,addmoney) VALUES ('$Userid',$MoneyValue)"; 
		$txt = 't_tempmoney	'.$Userid.'	'.$MoneyValue;
	}
	else
	{
		$txt = "-modifyRoleHuobi ".$Rid." ".$MoneyType." ".$MoneyValue;	
		$sqlcmdg = "INSERT INTO t_gmmsg (msg) VALUES('$txt')";		
	}
	
	$dates = date('Y-m-d H:i:s');
	if($sqlcmdg != "")
	{
	 	$result = $db ->query($sqlcmdg); 
	 	if($result != NULL)
		{
			$fp=fopen("addMoneyLog.log","a");
			fwrite($fp,$dates."	".$txt."\r\n");
			fclose($fp);
			returnlog(0);
		}else{
			returnlog(1);
		}
	}else {
		returnlog(1);
	}
	
 ?>