<?php
$rid1 = "858001";
$rid2 = "858002";
if (isset($_GET['rid']) AND ($_GET['rid'] == $rid1)) {
	$token = $_GET['token'];
header("Location: http://idm.munongdan.pro/account/dangnhap.php?token={$token}");
} 
elseif (isset($_GET['rid']) AND ($_GET['rid'] == $rid2)) {
	$token = $_GET['token'];
header("Location: http://idm.munongdan.pro/account2/dangnhap.php?token={$token}");
}else{
	header("Location: https://munongdan.pro");
}
?>