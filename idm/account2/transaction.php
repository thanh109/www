<?php
session_start();
setlocale(LC_MONETARY, 'vi_VN');
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Ho_Chi_Minh');

// lay thong tin tu paytopay - muc tich hop website trong quan ly tai khoan
$merchant_id  = 57;
//$merchant_id = 77;
$api_user     = "b4ad86ace3be4af99437a0a3a39326ac";
//$api_user = "9481312152d442a48b859287aed05bcd";
$api_password = "4c16633c451f4ba19e7b525e7d550973";
//$api_password = "8375491f2c1b44cd9cd81b9449388f48";
include_once "config.php";

$seri      = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin     = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
$mang      = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
$user      = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
$card_type = 0;
if ($mang == 'MOBI') {
    $card_type = 2;
    $ten       = "Mobifone";
} else if ($mang == 'VIETTEL') {
    $card_type = 1;
    $ten       = "Viettel";
} else if ($mang == 'GATE') {
    $card_type = 4;
    $ten       = "Gate";
} else if ($mang == 'VTC') {
    $card_type = 5;
    $ten       = "VTC";
} else if ($mang == 'MEGA') {
    $card_type = 17;
    $ten       = "Megacard";
} else if ($mang == 'VNM') {
    $card_type = 10;
    $ten       = "Vietnammobile";
} else {
    $card_type = 3;
    $ten       = "Vinaphone";
}



$fields = array(
    'merchant_id' => $merchant_id,
    'pin' => $sopin,
    'seri' => $seri,
    'card_type' => intval($card_type),
    'note' => $_SERVER['HTTP_HOST'] . ' - ' . $user
);

$ch = curl_init("https://api.paytopay.vn/api/card");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERPWD, $api_user . ":" . $api_password);
$result  = curl_exec($ch);
$result  = json_decode($result);
$code    = intval($result->code);
$error   = $result->msg;
$menhgia = intval($result->info_card);

$time = time('Y-m-d, H:i:s');
if ($code === 0 && $menhgia >= 10000) {
    $amount = $menhgia;
    if (time() >= strtotime('2017-06-12 00:00:00') && time() <= strtotime('2017-06-14 23:39:59')) {
        $rate      = 2;
        $extraRate = 2;
    } else {
        $rate      = 1;
        $extraRate = 1;
    }
  //  if ($ten == "Gate") {
    //    $rate      = 1.1;
   //     $extraRate = 1.1;
   // }
    switch ($amount) {
        case 10000:
            $xu = 100 * $rate;
            break;
        case 20000:
            $xu = 200 * $rate;
            break;
        case 30000:
            $xu = 300 * $rate;
            break;
        case 50000:
            $xu = 500 * $rate;
            break;
        case 100000:
            $xu = 1000 * $rate;
            break;
        case 200000:
            $xu = 2000 * $rate;
            break;
        case 300000:
            $xu = 3000 * $rate;
            break;
        case 500000:
            $xu = 5000 * $extraRate;
            break;
        case 1000000:
            $xu = 10000 * $extraRate;
            break;
    }
    // Chuyển Gold vào tài khoản
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "hipcon123";
    $dbname = "mu_android_stat";
    $db = mysql_connect($dbhost, $dbuser, $dbpass) or die("cant connect db");
    mysql_select_db($dbname, $db) or die("cant select db");
    if (time() >= strtotime('2017-05-26 00:00:00') && time() <= strtotime('2017-05-26 23:39:59')) {
        $sql = "UPDATE t_account SET diemthuong = diemthuong + $xu, thenap = thenap + $amount, napngay = napngay + $amount  WHERE name  ='$user'";
        
    } else {
        $sql = "UPDATE t_account SET diemthuong = diemthuong + $xu, thenap = thenap + $amount WHERE name  ='$user'";
    }
    
    mysql_query($sql);
    
    $file     = "log/carddung.dat";
    $time_GMT = new DateTime('@' . $time);
    $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
    $time         = $time_GMT->format('d/m/Y, H:i:s');
    $filetongtien = "log/tongcong.dat";
    $tennn        = urlencode($user);
    $fileusernap  = "./lognap/{$tennn}.dat";
    $hienco       = $hit->Read_File($filetongtien);
    $congtien     = ($hienco + $amount);
    $luutien      = $hit->Write_File($filetongtien, $congtien, 'w');
    $tongcong     = $hit->Read_File($filetongtien);
    $mess         = "Tài khoản: " . $user . ", Loại thẻ: " . $ten . ", Mệnh giá: " . $amount . ", Thời gian: " . $time . ", Tổng số tiền: " . money_format('%(#10n', $tongcong);
    $mess2        = "Tài khoản: " . $user . ", Loại thẻ: " . $ten . ", Mệnh giá: " . $amount . ", Thời gian: " . $time . ", Tổng số tiền: " . money_format('%(#10n', $tongcong) . "\r\n";
    $luuevent     = "|" . $amount . "-" . $time . "-" . $ten;
    $hit->Write_File($fileusernap, $luuevent, 'a');
    $hit->telegram($mess, $api, $chatid);
    $hit->Write_File($file, $mess2, 'a');
    $idgiaodich = $hit->random(5);
    $comment    = "Mệnh giá: " . $amount . ", Mã thẻ: " . $sopin . ", Seri: " . $seri . ", Loại thẻ: " . $ten;
    $sql2       = "INSERT INTO $dbname.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$user', 'nap_thanhcong', '$comment', '$time')";
    mysql_query($sql2);
    echo '<script>alert("Bạn đã thanh toán thành công thẻ ' . $ten . ' mệnh giá ' . $amount . ' ");window.history.back()</script>';
} else {
    // echo $error;
    $file     = "log/cardsai.dat";
    $time_GMT = new DateTime('@' . $time);
    $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
    $time = $time_GMT->format('d/m/Y, H:i:s');
    $fh = fopen($file, 'a') or die("cant open file");
    $mess3 = "Tài khoản: " . $user . ", Mã thẻ: " . $sopin . ", Seri: " . $seri . ", Nội dung: " . $error . ", Loại thẻ: " . $ten . ", Thời gian: " . $time;
    fwrite($fh, $mess3);
    fwrite($fh, "\r\n");
    fclose($fh);
  // $hit->telegram($mess3, $api, $chatid);
    $ngaygiaodich = time();
    $idgiaodich   = $hit->random(5);
    $comment      = "Mã thẻ: " . $sopin . ", Seri: " . $seri . ", Loại thẻ: " . $ten;
    $sql3         = "INSERT INTO $dbname.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$user', 'nap_thatbai', '$comment', '$time')";
    mysql_query($sql3);
    echo '<script>alert("' . $error . '");window.history.back()</script>';
}

mysql_close($db);
?>