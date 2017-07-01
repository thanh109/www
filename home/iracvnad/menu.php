<?php
session_start();
 if($_SESSION['admin'] == 1 & $_SESSION['user'] == "admin"){
 }
 else{

    header("location: login.php");
    exit;
 }
?>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>Danh mục</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="index.php"><i class="icon-font">&#xe003;</i>Hoạt động chung</a>
                    <ul class="sub-menu">
                        <li><a href="role.php"><i class="icon-font">&#xe058;</i>Quản lý nhân vật</a></li>
                        <li><a href="account.php"><i class="icon-font">&#xe065;</i>Quản lý tài khoản</a></li>
						 <li><a href="gift.php"><i class="icon-font">&#xe065;</i>Quản lý GiftCode</a></li>
                    </ul>
                </li>
            
            </ul>
        </div>
    </div>
 