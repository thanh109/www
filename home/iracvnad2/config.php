<?php
//error_reporting(0);
header('Content-Type:text/html; charset=utf-8');
/*
    Mu Nhất Kiếm Admin Panel by Irac
    Vui lòng giữ dòng bản quyền này khi sử dụng
    Tác giả: Irac
    Website: www.Irac.info

*/
require_once './hitlibs/class.php'; 
$config = array(
	'DB_HOST'=>'localhost',// ip mysql
	'DB_NAME1'=>'mu_game_2',// database game
	'DB_NAME'=>'mu_android_stat',// database account
	'DB_USER'=>'root',// user mysql
	'DB_PWD'=>'hipcon123',// pass user mysql
	'DB_PORT'=>3306,// port mysql
	'DB_CHARSET'=>'utf8',// database character
	'ADMIN_USER'=>'admin',   //user admin
	'ADMIN_PASS'=>'HipCon1234!@#$',   //pass user admin
);
$hit = new hitandrun;
?>
