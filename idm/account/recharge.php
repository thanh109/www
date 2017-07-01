<?php
session_start();
include_once "config.php";
$uname2 = $_GET['username'];
$note   = $_POST['note'];
$mailId = $_POST['idp'];
$date2  = date("Y-m-d, G:i:s");
//2017-05-14 01:19:55
$time2  = time('Y-m-d, H:i:s');
$rand   = rand(100, 999);
// ĐỔI 50 VÀNG
if (@$_GET['act'] == "50gold") {
    $kimcuong = 7500;
    $sql      = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result   = mysql_query($sql);
    $total    = mysql_num_rows($result);
    $row      = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 50) {
        $sql1    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1 = mysql_query($sql1);
        $row1    = mysql_fetch_array($result1);
        $uid     = $row1['ACCOUNT_KL_SSO'];
        $order   = time() . rand(100, 999);
        $time    = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $sql3    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result2 = mysql_query($sql2);
        $result3 = mysql_query($sql3);
        $sql4    = "UPDATE $database.t_account SET gold = gold - 50 WHERE name ='" . $uname2 . "'";
        $result4 = mysql_query($sql4);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
}
// ĐỔI 100 VÀNG
if (@$_GET['act'] == "100gold") {
    $sql    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 100) {
        $kimcuong = 15000;
        $sql1     = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1  = mysql_query($sql1);
        $row1     = mysql_fetch_array($result1);
        $uid      = $row1['ACCOUNT_KL_SSO'];
        $order    = time() . rand(100, 999);
        $time     = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $result2 = mysql_query($sql2);
        $sql4    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result4 = mysql_query($sql4);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 100 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
}
// ĐỔI 200 VÀNG
if (@$_GET['act'] == "200gold") {
    $sql    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 200) {
        $kimcuong = 30000;
        $sql1     = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1  = mysql_query($sql1);
        $row1     = mysql_fetch_array($result1);
        $uid      = $row1['ACCOUNT_KL_SSO'];
        $order    = time() . rand(100, 999);
        $time     = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $result2 = mysql_query($sql2);
        $sql4    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result4 = mysql_query($sql4);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 200 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
}
// ĐỔI 400 VÀNG
if (@$_GET['act'] == "400gold") {
    $sql    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 400) {
        $kimcuong = 60000;
        $sql1     = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1  = mysql_query($sql1);
        $row1     = mysql_fetch_array($result1);
        $uid      = $row1['ACCOUNT_KL_SSO'];
        $order    = time() . rand(100, 999);
        $time     = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $result2 = mysql_query($sql2);
        $sql4    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result4 = mysql_query($sql4);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 400 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
}
// ĐỔI 700 VÀNG
if (@$_GET['act'] == "700gold") {
    $sql    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 700) {
        $kimcuong = 105000;
        $sql1     = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1  = mysql_query($sql1);
        $row1     = mysql_fetch_array($result1);
        $uid      = $row1['ACCOUNT_KL_SSO'];
        $order    = time() . rand(100, 999);
        $time     = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $result2 = mysql_query($sql2);
        $sql4    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result4 = mysql_query($sql4);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 700 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
}
// ĐỔI 1000 VÀNG
if (@$_GET['act'] == "1000gold") {
    $kimcuong = 150000;
    $sql      = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result   = mysql_query($sql);
    $total    = mysql_num_rows($result);
    $row      = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 1000) {
        $sql1    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1 = mysql_query($sql1);
        $row1    = mysql_fetch_array($result1);
        $uid     = $row1['ACCOUNT_KL_SSO'];
        $order   = time() . rand(100, 999);
        $time    = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $result2 = mysql_query($sql2);
        $sql4    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result4 = mysql_query($sql4);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 1000 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
}
// ĐỔI 5000 VÀNG
if (@$_GET['act'] == "5000gold") {
    $sql    = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql);
    $total  = mysql_num_rows($result);
    $row    = mysql_fetch_array($result);
    
    if ($total > 0 and $row['gold'] >= 5000) {
        $kimcuong = 750000;
        $sql1     = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
        $result1  = mysql_query($sql1);
        $row1     = mysql_fetch_array($result1);
        $uid      = $row1['ACCOUNT_KL_SSO'];
        $order    = time() . rand(100, 999);
        $time     = time();
        
        $sql2    = "insert into $database2.t_tempmoney (uid,addmoney) VALUES ('$uid', '$kimcuong');";
        $result2 = mysql_query($sql2);
        $sql4    = "INSERT INTO $database2.t_inputlog(`amount`, `u`, `order_no`, `cporder_no`, `time`, `sign`, `inputtime`, `result`, `zoneid` ) VALUES ('$kimcuong', '$uid', '$order', '$order', '$time2', 'success', '$date2', 'success', '1');";
        $result4 = mysql_query($sql4);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 5000 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $date    = date("d/m/y, G:i:s");
        $logggg  = $date . "-" . $sql2 . "\r\n";
        $hit->Write_File("./log/doigold.dat", $logggg, 'a');
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Đổi ".number_format($kimcuong)." Kim Cương vào Game.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'doigold', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Đổi thành công hãy kiểm tra trong game!");window.location = "doigold.php"</script></div>';
    } else {
        echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");window.location = "doigold.php"</script></div>';
    }
    
}
//thong bao

if (isset($_POST['act']) && $_POST['act'] == "1") {
    $msg = "-bull 1 1 1 {$note}";
    
    $sql2    = "insert into $database2.t_gmmsg (Id, msg) VALUES ('1', '$msg');";
    $result2 = mysql_query($sql2);
    //echo $msg;
} else {
    echo '<script>alert("Đổi thất bại vui lòng kiểm tra!");</script></div>';
}
?>