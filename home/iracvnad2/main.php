<?php
session_start();
 if($_SESSION['admin'] == 1 & $_SESSION['user'] == "admin"){

 }
 else{

    header("location: login.php");
    exit;
 }
?>
<!doctype html>
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>Chào mừng bạn đến với Admin Panel Mu Nhất Kiếm</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>Tùy chọn</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="role.php"><i class="icon-font">&#xe001;</i>Thêm KNB</a>
                    <a href="role.php"><i class="icon-font">&#xe005;</i>Gửi Mail</a>
                    <a href="role.php"><i class="icon-font">&#xe048;</i>Quản lý</a>
                    <a href="account.php"><i class="icon-font">&#xe041;</i>Tài khoản</a>
                    <a href="index.php"><i class="icon-font">&#xe01e;</i>Thông tin</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>Thông tin hệ thống</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">Hệ điều hành</label><span class="res-info"><?php echo php_uname()?></span>
                    </li>
                    <li>
                        <label class="res-lab">Phiên bản PHP</label><span class="res-info"><?php echo PHP_VERSION?></span>
                    </li>
                    <li>
                        <label class="res-lab">PHP đang chạy</label><span class="res-info"><?php echo strtoupper(php_sapi_name())?></span>
                    </li>
                    <li>
                        <label class="res-lab">Máy chủ Web</label><span class="res-info"><?php echo $_SERVER['SERVER_SOFTWARE']?></span>
                    </li>
                    <li>
                        <label class="res-lab">Số CPU</label><span class="res-info"><?php echo $_SERVER["HTTP_HOST"]?></span>
                    </li>
                    <li>
                        <label class="res-lab">Thời gian</label><span class="res-info"><?php echo "20".date("y-m-d h:m:s")?></span>
                    </li>
                    <li>
                        <label class="res-lab">Tên miền/IP</label><span class="res-info"><?php echo $_SERVER["HTTP_HOST"]?></span>
                    </li>
                    <li>
                        <label class="res-lab">Ngôn ngữ máy chủ</label><span class="res-info"><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']?></span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!--/main-->