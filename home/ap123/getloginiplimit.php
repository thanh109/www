<?php
try
 {
	require_once './common.inc.php'; 
	$uip = $_SERVER["REMOTE_ADDR"];
	header("Content-type: text/html; charset=utf-8"); 
	$whiteiplist = "115.159.75.99,115.159.75.233,182.254.148.230,115.159.24.238,182.254.208.126,115.159.4.19,115.159.72.175,182.254.151.168,115.159.75.96,115.159.72.41,115.159.1.140,115.159.29.132,119.29.5.76,119.29.10.108,119.29.10.118,182.254.231.97";
	$arrip = explode(",",$whiteiplist);
	if(!in_array($uip,$arrip))
	{
		exit('');
	}
	$userid= $_REQUEST['userid'];
	$time= $_REQUEST['time'];
	$sign = stripslashes($_REQUEST['sign']);
	$MYmd5 = md5($userid.$time.$czkey);
	
	if($MYmd5 != $sign)
	{
		exit('');
	}

	// 找出最近登录的两个城市名
 	$selectorder = "SELECT userid,dayid,region,cityname,onlinesecs,usedmoney,inputmoney,activeval,lastip,starttime,logouttime FROM t_cityinfo WHERE userid='$userid' ORDER BY starttime desc limit 2";
 	$isorder = $db ->query($selectorder); 
	$count = $db ->num_rows($isorder);
	
	// 不够两个认为是合法的
	if($count<=1)
 	{
 		exit('');
 	}

	// 最近个两个城市信息要返回
	$strcityname="";
	$strdayid="";
	$strstarttime = "";
	$limitips = "";
	for($i=0;$i<$count;$i++)
	{
		$limitips = $limitips.mysql_result($isorder,$i,"userid").",";
		$limitips = $limitips.mysql_result($isorder,$i,"dayid").",";
		$limitips = $limitips.iconv("gb2312","UTF-8//IGNORE",mysql_result($isorder,$i,"region")).",";
		$limitips = $limitips.iconv("gb2312","UTF-8//IGNORE",mysql_result($isorder,$i,"cityname")).",";
		$limitips = $limitips.mysql_result($isorder,$i,"onlinesecs").",";
		$limitips = $limitips.mysql_result($isorder,$i,"usedmoney").",";
		$limitips = $limitips.mysql_result($isorder,$i,"inputmoney").",";
		$limitips = $limitips.mysql_result($isorder,$i,"activeval").",";
		$limitips = $limitips.mysql_result($isorder,$i,"lastip").",";
		$limitips = $limitips.mysql_result($isorder,$i,"starttime").",";
		$limitips = $limitips.mysql_result($isorder,$i,"logouttime")."|";
		if($i==0)
		{
			$strstarttime = mysql_result($isorder,$i,"starttime");
			$strdayid = mysql_result($isorder,$i,"dayid");
			$strcityname = mysql_result($isorder,$i,"cityname");
			
		}
	}

	if($strcityname=="" OR $strdayid =="")
	{
		// 第一个城市名为空，不作处理
	}
	else
	{
		// 找出与第一条记录的城市相同的、最近的记录
		$selectsum2 = "SELECT userid,dayid,region,cityname,onlinesecs,usedmoney,inputmoney,activeval,lastip,starttime,logouttime FROM t_cityinfo WHERE userid='$userid' AND cityname='$strcityname' AND starttime<'$strstarttime' AND inputmoney>0 ORDER BY starttime desc LIMIT 1";
		$sumresult2 = $db ->query($selectsum2); 
		$sumcount2 = $db ->num_rows($sumresult2);
		
		if($sumcount2<=0)
		{
			// 是在新城市第一次登录
		}
		else
		{
			// 之前也在最新登录的城市登录过
			$limitips3 = "";
			$limitips3 = mysql_result($sumresult2,0,"userid").",";		
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"dayid").",";		
			$limitips3 = $limitips3.iconv("gb2312","UTF-8//IGNORE",mysql_result($sumresult2,0,"region")).",";
			$limitips3 = $limitips3.iconv("gb2312","UTF-8//IGNORE",mysql_result($sumresult2,0,"cityname")).",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"onlinesecs").",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"usedmoney").",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"inputmoney").",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"activeval").",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"lastip").",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"starttime").",";
			$limitips3 = $limitips3.mysql_result($sumresult2,0,"logouttime")."|";
			$str2starttime = mysql_result($sumresult2,0,"starttime");
			$limitips = $limitips.$limitips3;

			// 最新登录城市的前相同城市的上一个登录城市
			$selectsum3 = "SELECT userid,dayid,region,cityname,onlinesecs,usedmoney,inputmoney,activeval,lastip,starttime,logouttime FROM t_cityinfo WHERE userid='$userid' AND starttime>'$str2starttime' ORDER BY starttime asc LIMIT 1";
			$sumresult3 = $db ->query($selectsum3); 
			$sumcount3 = $db ->num_rows($sumresult3);

			if($sumcount3<=0)
			{
				
			}
			else
			{
				$limitips2 = "";
				$limitips2 = mysql_result($sumresult3,0,"userid").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"dayid").",";
				$limitips2 = $limitips2.iconv("gb2312","UTF-8//IGNORE",mysql_result($sumresult3,0,"region")).",";
				$limitips2 = $limitips2.iconv("gb2312","UTF-8//IGNORE",mysql_result($sumresult3,0,"cityname")).",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"onlinesecs").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"usedmoney").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"inputmoney").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"activeval").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"lastip").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"starttime").",";
				$limitips2 = $limitips2.mysql_result($sumresult3,0,"logouttime")."|";
				$limitips = $limitips.$limitips2;
			}
		}
	}

	// $selectsum = "SELECT SUM(onlinesecs) AS onlincs,SUM(usedmoney) AS usemey,SUM(inputmoney) AS inpumey,SUM(activeval) AS actv FROM t_cityinfo WHERE userid='$userid' AND cityname='$strcityname' AND dayid<$strdayid";
	$selectsum = "SELECT SUM(onlinesecs) AS onlincs,SUM(usedmoney) AS usemey,SUM(inputmoney) AS inpumey,SUM(activeval) AS actv, cityname FROM t_cityinfo WHERE userid='$userid' AND dayid<$strdayid group by cityname LIMIT 10";
 	$sumresult = $db ->query($selectsum); 
	$sumcount = $db ->num_rows($sumresult);

	if($sumcount<=0)
 	{
 		$limitips = $limitips."0,";
		$limitips = $limitips."0,";
		$limitips = $limitips."0,";
		$limitips = $limitips."0,";
		$limitips = $limitips."";
 	}
	else
	{
		for($i=0;$i<$sumcount;$i++)
		{
			$limitips = $limitips.mysql_result($sumresult,$i,"onlincs").",";
			$limitips = $limitips.mysql_result($sumresult,$i,"usemey").",";
			$limitips = $limitips.mysql_result($sumresult,$i,"inpumey").",";
			$limitips = $limitips.mysql_result($sumresult,$i,"actv").",";
			if($i == ($sumcount - 1))
			{
				$limitips = $limitips.iconv("gb2312","UTF-8//IGNORE",mysql_result($sumresult,$i,"cityname"));
			}
			else
			{
				$limitips = $limitips.iconv("gb2312","UTF-8//IGNORE",mysql_result($sumresult,$i,"cityname")).",";
			}

		}
	}
	echo trim($limitips, " ");
		
}catch(Exception $e)
{
	exit('');
}

?>