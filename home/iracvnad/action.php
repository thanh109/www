<?php 
session_start();
include "config.php";

$act = $_GET['action'];
$user = $_POST['username'];
$pass = $_POST['pwd'];

if("login" == $act){
	if($user == $config["ADMIN_USER"] & $pass == $config["ADMIN_PASS"] ){
		$_SESSION['admin'] = 1;
		$_SESSION['user'] = "admin";
		header("location: index.php");
	}
	else{
		echo "Không phải quản trị không được phép!";
		header("location: login.php");

	}
}

if("logout" == $act){
	$_SESSION['admin'] = 0;
	$_SESSION['user'] = "";
	header("location: login.php");
}

if("userlogin" == $act){
	$conn = mysql_connect($config["DB_HOST"],$config["DB_USER"],$config["DB_PWD"]);
    mysql_query("set names 'utf8'");
    if(!$conn){
        die("Kết nối cơ sở dữ liệu bị lỗi, cấu hình file config.php! ! !");
    }
    $db_select = mysql_select_db($config["DB_NAME1"]);
    if(!$db_select){
        die("Kết nối cơ sở dữ liệu ".$config["DB_NAME1"]." trống! Vui lòng điền vào tên cơ sở dữ liệu ~~~~");
    }

	$sql = "SELECT COUNT(*) AS COUNT, userId from user WHERE userName='".$user."' and passWord='".$pass."' and gm = 1";
	$result = mysql_query($sql);
	$field = mysql_fetch_object($result);
	if ($field->COUNT != 1) {
		$arr = array('code'=>1,'errmsg'=>'Đăng nhập thất bại, mật khẩu sai');
		header("location: user.php");
	}
	else {
		$_SESSION['user'] = $user;
		header("location: user_gm.php");
	}
}

?>