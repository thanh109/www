<?php
session_start();
include_once "config.php";
$username    = $_POST['id'];
$uname       = $username;
$uname2      = $_SESSION['username'];
$nguoinhan   = $_POST['idnhan'];
$nhanvat     = explode("-", $nguoinhan);
$idnguoinhan = $nhanvat[0];
$tennhanvat  = $nhanvat[1];
// ĐỔI 100 VÀNG
if ($_POST['act'] == "1") {
    $sql    = "SELECT * FROM $database.t_account WHERE `name`='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    ///echo $row;
    
    if ($total > 0 and $row['diemthuong'] >= 1500) {
        $sql1    = "SELECT * FROM $database2.t_roles WHERE `rname`='" . $uname . "'";
        $result1 = mysql_query($sql1);
        $row1    = mysql_fetch_array($result1);
        $uid     = $row1['userid'];
        $order   = time() . rand(100, 999);
        $time    = time();
        
        $hit->sendgift($idnguoinhan, "1032211",$soluong);
        $file    = "log/nhanthuong.dat";
        $gionhan = date("d-m-Y G:i a");
        $mess2   = "{$uname2} Nhận Thưởng 1 Hộ Phù VIP 11 FULL Cho Nhân Vật {$tennhanvat} Vào Lúc {$gionhan}";
        $hit->telegram($mess2, $api, $chatid);
        $hit->Write_File($file, "\r\n" . $mess2, 'a');
        $mess = $hit->khongdau($mess2);
      //  $hit->thongbao($mess);
        $sql3    = "UPDATE $database.t_account SET diemthuong = diemthuong - 1500 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        echo '<script>alert("Nhận thành công hãy kiểm tra hòm thư trong game! ' . $tennhanvat . '");window.history.back()</script></div>';
    } else {
        echo '<script>alert("Nhận thất bại vui lòng kiểm tra lại! ' . $tennhanvat . ' ");window.history.back()</script></div>';
    }
}

elseif ($_POST['act'] == "2") {
    $sql    = "SELECT * FROM $database.t_account WHERE `name`='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    ///echo $row;
    
    if ($total > 0 and $row['diemthuong'] >= 500) {
        $sql1    = "SELECT * FROM $database2.t_roles WHERE `rname`='" . $uname . "'";
        $result1 = mysql_query($sql1);
        $row1    = mysql_fetch_array($result1);
        $uid     = $row1['userid'];
        $order   = time() . rand(100, 999);
        $time    = time();
        
        $hit->sendgift($idnguoinhan, 1032212, 1, 95158272, 15, 0);
		//   sendgift($rid, $itemid, $soluong, $exinfo, $level, $kc)
        $file    = "log/nhanthuong.dat";
        $gionhan = date("d-m-Y G:i a");
        $mess2   = "Nhân vật {$tennhanvat} nhận thưởng thành công Hộ Phù VIP 12 Vào Lúc {$gionhan}";
        $hit->telegram($mess2, $api, $chatid);
        $hit->Write_File($file, "\r\n" . $mess2, 'a');
        $mess = $hit->khongdau($mess2);
        $hit->thongbao($mess);
        $sql3    = "UPDATE $database.t_account SET diemthuong = diemthuong - 500 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        echo '<script>alert("Nhận thành công hãy kiểm tra hòm thư trong game! ' . $tennhanvat . '");window.history.back()</script></div>';
    } else {
        echo '<script>alert("Nhận thất bại vui lòng kiểm tra lại! ' . $tennhanvat . ' ");window.history.back()</script></div>';
    }
} elseif ($_POST['act'] == "3") {
    $sql    = "SELECT * FROM $database.t_account WHERE `name`='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    ///echo $row;
    
    if ($total > 0 and $row['diemthuong'] >= 500) {
        $sql1    = "SELECT * FROM $database2.t_roles WHERE `rname`='" . $uname . "'";
        $result1 = mysql_query($sql1);
        $row1    = mysql_fetch_array($result1);
        $uid     = $row1['userid'];
        $order   = time() . rand(100, 999);
        $time    = time();
        
        $hit->sendgift($idnguoinhan, 1030915, 1, 99999999999999999, 99, 0);
		//   sendgift($rid, $itemid, $soluong, $exinfo, $level, $kc)
        $file    = "log/nhanthuong.dat";
        $gionhan = date("d-m-Y G:i a");
        $mess2   = "Nhân vật {$tennhanvat} nhận thưởng thành công pet Thiên Chước VIP Vào Lúc {$gionhan}";
        $hit->telegram($mess2, $api, $chatid);
        $hit->Write_File($file, "\r\n" . $mess2, 'a');
        $mess = $hit->khongdau($mess2);
        $hit->thongbao($mess);
        $sql3    = "UPDATE $database.t_account SET diemthuong = diemthuong - 500 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        echo '<script>alert("Nhận thành công hãy kiểm tra hòm thư trong game! ' . $tennhanvat . '");window.history.back()</script></div>';
    } else {
        echo '<script>alert("Nhận thất bại vui lòng kiểm tra lại! ' . $tennhanvat . ' ");window.history.back()</script></div>';
    }
} else {
    die();
}