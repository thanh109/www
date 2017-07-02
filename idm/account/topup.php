<?php
include_once "config.php";
$rid1 = "4058001";
$rid2 = "4058002";
$rand = $hit->random(17);
if (isset($_GET['rid']) AND ($_GET['rid'] == $rid1)) {
	$token = $_GET['token'];
header("Location: http://idm.munongdan.pro/account/dangnhap.php?token={$token}&loginkey=".base64_encode($rand));
} 
elseif (isset($_GET['rid']) AND ($_GET['rid'] == $rid2)) {
	$token = $_GET['token'];
header("Location: http://idm.munongdan.pro/account2/dangnhap.php?token={$token}&loginkey=".base64_encode($rand));
}else{
	header("Location: http://munongdan.pro");
}
?>
