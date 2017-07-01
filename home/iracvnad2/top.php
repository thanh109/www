<?php
//error_reporting(0);
session_start();
 if($_SESSION['admin'] == 1 & $_SESSION['user'] == "admin"){

 }
 else{

    header("location: login.php");
    exit;
 }
 require_once './hitlibs/class.php'; 
 $hit = new hitandrun;
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="shortcut icon" href="../favicon.ico">
    <title>Admin Panel - Mu Nhất Kiếm</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">Quản lý</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">Trang chủ</a></li>
                <li><a href="http://www.Irac.info/" target="_blank">Game Irac</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li>Chào bạn: <?php echo $_SESSION['user'];?></li>
                <li><a href="action.php?action=logout">Thoát</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
echo $hit->showonline();
?>