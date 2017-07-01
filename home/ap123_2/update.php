<?php
 require_once('myftp.php');
 	
 	$uip = $_SERVER["REMOTE_ADDR"];
	if($uip!="101.251.105.180" AND $uip!="106.39.11.26" AND $uip!="182.254.149.175" AND $uip!="124.127.243.74" AND $uip!="115.159.75.99" AND $uip!="120.132.74.13")
	{
		exit('');
	}
	
	if( !isset($_REQUEST['path']) OR !isset($_REQUEST['app']))
	{
		exit('');
	}
	$filepath = $_SERVER['SCRIPT_FILENAME']; 
	$path = $_REQUEST['path'];
	$isapp= $_REQUEST['app'];
	$arr = explode("\\",$filepath);

	if($isapp =='true' )
	{		
		$localpath = $arr[0]."/".$arr[1]."/".$arr[2]."/";
		
	}else 
	{
		$localpath = $arr[0].'/'.$arr[1]."/";
	}
	
 	if($path =="" OR $localpath=="/" )
	{
		exit('');
	}
	
	$config = array(
	             'hostname' => 'g.tianmashikong.com',
	             'username' => 'nuzhanupdate',
	             'password' => '6HkbBpqVjO',
	             'port' => 9366
	);
	$ftp = new Ftp();
	$ftp->connect($config);
	
	if($ftp->ftp_download_directory($path,$localpath))
	{
		$arr=array('msg'=>'t');
		$callback = $_REQUEST['callback'];
		echo $callback.'('.json_encode($arr).')';
	}
	else
	{
		$arr=array('msg'=>'f');
		$callback = $_REQUEST['callback'];
		echo $callback.'('.json_encode($arr).')';
	}

 ?>