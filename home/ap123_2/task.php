<?php
try
 {
	require_once './common.inc.php'; 

 		$selectorder = "SELECT rid,rname,level,changelifecount,regtime,totalonlinesecs,username FROM t_roles WHERE regtime>'2014-08-31 00:00:00' and lasttime<'2014-08-31 23:59:59' ORDER BY changelifecount, level ASC";
 		$isorder = $db ->query($selectorder); 

		$count = $db ->num_rows($isorder);

		
		$fp=fopen("filename.txt","a");
		
		for($i=0;$i<$count;$i++)
		{
			fwrite($fp,mysql_result($isorder,$i,"username")."	");
			$id = $db ->result($isorder,$i);
			$sql = "SELECT Count(rid) from t_tasks WHERE rid=$id";
			$task = $db ->query($sql);
			$input=mysql_result($isorder,$i,"rname");
			fwrite($fp,$input."	");
			fwrite($fp,mysql_result($isorder,$i,"changelifecount")."	");
			fwrite($fp,mysql_result($isorder,$i,"level")."	");
			fwrite($fp,mysql_result($isorder,$i,"regtime")."	");
			fwrite($fp,mysql_result($isorder,$i,"totalonlinesecs")."	");
			fwrite($fp,$db ->result($task,0)."	");
			$sql2 = "SELECT taskid from t_tasks WHERE isdel=0 AND rid=$id";
			$task2 = $db ->query($sql2);
			$count2 = $db ->num_rows($task2);
			for($ii=0;$ii<$count2;$ii++)
			{
				fwrite($fp,$db ->result($task2,0)."	");
			}

			fwrite($fp,"\r\n");
		}
 		fclose($fp);
	
}catch(Exception $e)
{
	echo "fail" ;
}

?>