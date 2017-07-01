<?php
$webtitle='Mu Nông Dân';
$gamename='Nông Dân';
$weburl='http://loccalhost/';
$db_type='mysql';
$db_charset='utf8';
$db_host='localhost';
$db_username='root';
$db_password='hipcon123';
$database='mu_android_stat';
$database2='mu_game_2';
$api = "377781382:AAFRj9PRF39E_PTUr0SrL-XFc6OtxH6vQM4";
$chatid = "-239061613";
include './hitlibs/class.php';
$hit = new hitandrun;
$tgurl="";
if(empty($tgurl)) $url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
else $url_this =$tgurl;
$conn = @mysql_connect("$db_host","$db_username","$db_password") or die ("Đang cập nhật....Vui lòng lên FANPAGE cập nhật thông tin !");
@mysql_select_db("$database",$conn) or die ("cant select db");
mysql_query("set names UTF8");
?>