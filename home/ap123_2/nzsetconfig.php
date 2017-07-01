<?php
	require_once './common.inc.php'; 
	
	$serverID = $_REQUEST['sid'];
 	$uip = $_SERVER["REMOTE_ADDR"];

	if($uip!="182.254.149.175"  AND $uip!="115.159.29.132" AND $uip!="182.254.231.97" AND $uip!="202.31.214.12" AND $uip!="203.69.146.41")
	{
		exit("Err IP");
	}

	if(!isset($_REQUEST['gmvalue']) OR !isset($_REQUEST['gmtype']))
	{
		if( !isset($_REQUEST['paramname']) OR !isset($_REQUEST['paramvalue']))
		{
			exit("Err Empty param");
		}
		$paramname = $_REQUEST['paramname'];
		$paramvalue = $_REQUEST['paramvalue'];
		
	 	if($paramvalue =="" OR $paramvalue=="" )
		{
			exit("Err Empty param");
		}
		
		$sqlcmd = "INSERT INTO t_config (paramname, paramvalue) VALUES('$paramname', '$paramvalue') ON DUPLICATE KEY UPDATE paramvalue='$paramvalue'";
	 	$result = $db ->query($sqlcmd); 
	 	$strGmCmd = '-config '.$paramname.' '.$paramvalue;
	 	
		$sqlcmd2 = "INSERT INTO t_gmmsg (msg) VALUES('$strGmCmd')";
	 	$result2 = $db ->query($sqlcmd2); 
		if($result != NULL AND $result2 != NULL)
		{
			exit("Success");
			$fp=fopen("MgLog.log","a");
			fwrite($fp,$dates."	".$sqlcmd2."\r\n");
			fclose($fp);
		}else{
			exit("Err SQL");
		}
	}else {
		
		$gmType = $_REQUEST['gmtype'];
		$value = $_REQUEST['gmvalue'];

		if($gmType =="" OR $value == "")
		{
			exit("Err Empty gmType");
		}
		$sqlcmdg = "";
		$string = "";
		switch ($gmType)
		{
			case 1://公告
			  $value = urldecode($value);
			  $value = iconv('UTF-8//IGNORE','gb2312',$value); 
			  $value = str_replace(" ","",$value);
			  $txt = "-bull 1 1 1 ".$value;	
			  $sqlcmdg = "INSERT INTO t_gmmsg (msg) VALUES('$txt')";
			  $string = "GongGao";
			  break;
			case 2://加载配置文件
			  $sqlcmdg = "INSERT INTO t_gmmsg (msg) VALUES('-reloadall')";
			  $string = "reloadall";
			  break;
			case 3://加载GM配置文件
			  $sqlcmdg = "INSERT INTO t_gmmsg (msg) VALUES('-reloadgm')";
			  $string = "reloadgm";
			  break;
			case 4://加载跨服配置文件
			  $sqlcmdg = "INSERT INTO t_gmmsg (msg) VALUES('-reload kuafu')";
			  $string = "reload kuafu";
			  break;
			default:
			  $sqlcmdg = "";
		}
		if($sqlcmdg != "")
		{
		 	$result = $db ->query($sqlcmdg); 
		 	if($result != NULL)
			{
				exit("Success ".$string);
				$fp=fopen("MgLog.log","a");
				fwrite($fp,$dates."	".$sqlcmdg."\r\n");
				fclose($fp);
			}else{
				
			}
		}else {
			exit("Err ".$string);
		}
	}
		
	
 ?>