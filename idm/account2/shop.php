<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";
$uname2     = $_SESSION['username'];
$sql        = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
$result     = mysql_query($sql);
$total      = mysql_num_rows($result);
$row        = mysql_fetch_array($result);
$sql2       = "select * from $database2.t_roles where userid='QMQJ" . $uname2 . "' and isdel='0'";
$result2    = mysql_query($sql2);
$row2       = mysql_fetch_array($result2);
$tennhanvat = $row2['rname'];
$sql        = "SELECT * FROM $database2.t_roles WHERE userid='QMQJ" . $uname2 . "' and isdel='0'";
$query      = mysql_query($sql);
$myrow      = mysql_fetch_array($query);
$myrow1     = mysql_fetch_array($query);
$myrow2     = mysql_fetch_array($query);
$myrow3     = mysql_fetch_array($query);
$form       = "<option value='null'>Chưa tạo nhân vật</option>";
if (!empty($myrow)) {
    $form = "<option value=" . $myrow['rid'] . "|" . $myrow['rname'] . ">" . $myrow['rname'] . "</option>";
}
if (!empty($myrow1)) {
    $form = "<option value=" . $myrow['rid'] . "|" . $myrow['rname'] . ">" . $myrow['rname'] . "</option><option value=" . $myrow1['rid'] . "|" . $myrow1['rname'] . ">" . $myrow1['rname'] . "</option>";
}
if (!empty($myrow2)) {
    $form = "<option value=" . $myrow['rid'] . "|" . $myrow['rname'] . ">" . $myrow['rname'] . "</option><option value=" . $myrow1['rid'] . "|" . $myrow1['rname'] . ">" . $myrow1['rname'] . "</option><option value=" . $myrow2['rid'] . "|" . $myrow2['rname'] . ">" . $myrow2['rname'] . "</option>";
}
if (!empty($myrow3)) {
    $form = "<option value=" . $myrow['rid'] . ">" . $myrow['rname'] . "</option><option value=" . $myrow1['rid'] . "|" . $myrow1['rname'] . ">" . $myrow1['rname'] . "</option><option value=" . $myrow2['rid'] . "|" . $myrow2['rname'] . ">" . $myrow2['rname'] . "</option><option value=" . $myrow3['rid'] . "|" . $myrow3['rname'] . ">" . $myrow3['rname'] . "</option>";
}
if (isset($_POST['mua'])) {
    $domua       = $_POST['mua'];
    $nguoinhan1  = $_POST['idnhan'];
    $nhanvat     = explode("|", $nguoinhan1);
    $idnguoinhan = $nhanvat[0];
    $tennhanvat  = $nhanvat[1];
    $name        = explode("-", $domua);
    $ten         = $name[1];
    $id          = $name[0];
    $gia         = $name[2];
    if ($id !== "") {
        switch ($id) {
            case 1005090:
                $gia = 200;
                break;
            case 1005091:
                $gia = 400;
                break;
            case 1005092:
                $gia = 650;
                break;
            case 1005093:
                $gia = 750;
                break;
            case 1005094:
                $gia = 1000;
                break;
            case 1005095:
                $gia = 2000;
                break;
            case 1005096:
                $gia = 2800;
                break;
            case 1005097:
                $gia = 4000;
                break;
            case 1000507:
                $gia = 500;
                break;
            case 1000508:
                $gia = 700;
                break;
            case 1000509:
                $gia = 900;
                break;
            case 1000510:
                $gia = 1200;
                break;
            case 1000511:
                $gia = 1500;
                break;
            case 1000607:
                $gia = 600;
                break;
            case 1000608:
                $gia = 800;
                break;
            case 1000609:
                $gia = 1000;
                break;
            case 1000610:
                $gia = 1200;
                break;
            case 1000611:
                $gia = 1600;
                break;
            case 1015090:
                $gia = 200;
                break;
            case 1015091:
                $gia = 400;
                break;
            case 1015092:
                $gia = 650;
                break;
            case 1015093:
                $gia = 750;
                break;
            case 1015094:
                $gia = 1000;
                break;
            case 1015095:
                $gia = 2000;
                break;
            case 1015096:
                $gia = 2800;
                break;
            case 1015097:
                $gia = 4000;
                break;
            case 1010507:
                $gia = 500;
                break;
            case 1010508:
                $gia = 700;
                break;
            case 1010509:
                $gia = 900;
                break;
            case 1010510:
                $gia = 1200;
                break;
            case 1010511:
                $gia = 1500;
                break;
            case 1010607:
                $gia = 600;
                break;
            case 1010608:
                $gia = 800;
                break;
            case 1010609:
                $gia = 1000;
                break;
            case 1010610:
                $gia = 1200;
                break;
            case 1010611:
                $gia = 1600;
                break;
            case 1025590:
                $gia = 200;
                break;
            case 1025591:
                $gia = 400;
                break;
            case 1025592:
                $gia = 650;
                break;
            case 1025593:
                $gia = 750;
                break;
            case 1025594:
                $gia = 1000;
                break;
            case 1025595:
                $gia = 2000;
                break;
            case 1025596:
                $gia = 2800;
                break;
            case 1025597:
                $gia = 4000;
                break;
            case 1020507:
                $gia = 500;
                break;
            case 1020508:
                $gia = 700;
                break;
            case 1020509:
                $gia = 900;
                break;
            case 1020510:
                $gia = 1200;
                break;
            case 1020511:
                $gia = 1500;
                break;
            case 1020607:
                $gia = 600;
                break;
            case 1020608:
                $gia = 800;
                break;
            case 1020609:
                $gia = 1000;
                break;
            case 1020610:
                $gia = 1200;
                break;
            case 1020611:
                $gia = 1600;
                break;
            case 2005:
                $gia = 2;
                break;
            case 2000:
                $gia = 10;
                break;
            case 1030914:
                $gia = 3000;
                break;
            case 1030915:
                $gia = 4000;
                break;
            case 1030916:
                $gia = 5500;
                break;
            case 4030:
                $gia = 500;
                break;
            case 50033:
                $gia = 5;
                break;
            case 5087:
                $gia = 10;
                break;
        }
        if ($total > 0 and $row['gold'] >= $gia) {
            $gui          = $hit->senditem($idnguoinhan, $id,1);
            $remain_money = $row['gold'] - $gia;
            $mess         = "{$_SESSION['username']} Vừa Mua {$ten} Cho Nhân Vật {$tennhanvat} Với Giá {$gia} GOLD Trên WEBSHOP ( Số Tiền Còn Lại {$remain_money} Gold )";
            $mess2        = "{$tennhanvat} Vừa Mua {$ten} Với Giá {$gia} Trên WEBSHOP";
           // $hit->telegram($mess, $api, $chatid);
            $mess = $hit->khongdau($mess2);
            $hit->thongbao($mess);
            $date   = date("d/m/y, G:i:s");
            $logggg = $date . "-" . $mess . "\r\n";
            $hit->Write_File("./log/muado.dat", $logggg, 'a');
            if (!empty($gui)) {
                $sql3     = "UPDATE $database.t_account SET gold = gold - {$gia} WHERE name ='" . $_SESSION['username'] . "'";
                $result3  = mysql_query($sql3);
                $uname2   = $_SESSION['username'];
                $time     = time('Y-m-d, H:i:s');
                $time_GMT = new DateTime('@' . $time);
                $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
                $time       = $time_GMT->format('d/m/Y, H:i:s');
                $idgiaodich = $hit->random(5);
                $comment    = "Mua {$ten} Cho Nhân Vật {$tennhanvat} Với Giá {$gia} GOLD Trên WEBSHOP ( Số Tiền Còn Lại ".number_format($remain_money)." Gold )";
                $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'webshop', '$comment', '$time')";
                $result4    = mysql_query($updatelog);
                echo '<script>alert("Bạn đã Mua Thành Công  ' . $ten . ' mệnh giá ' . $gia . ' Gold. Vào hòm thư trong game kiểm tra nhé !");window.location = "shop.php"</script>';
            } else {
                echo '<script>alert("Lỗi không thể mua!");</script></div>';
            }
        } else {
            echo '<script>alert("Bạn Không Đủ Gold!");</script></div>';
        }
        
    }
}
?>
 <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h1>
                MU <?php
echo $gamename;
?>
  </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">
                        <i class="fa fa-fw ti-home"></i> Trang Chủ
                    </a>
                </li>
                <li>
                    <a href="#">Chức Năng</a>
                </li>
                <li>
                    WEB SHOP
                </li>
            </ol>
        </section>
        <!--section ends-->
        </aside>
		 <aside class="right-side">


               <center>
		<form action="shop.php" method="post">
		  <tbody>
		<tr>
                <h3><td>Mua Cho Nhân Vật :</h3></td> <td><select name="idnhan" id="mua" class="form-control"></td>
				
  <?php
echo $form;
?>
</select></td>
</tr><tr>
		<hr>
				<td><h3>Danh Sách Item :</h3></td><td><td><select name="mua" id="mua" class="form-control"></td>

<?php
header('Content-Type:text/html; charset=utf-8');
$handler = fopen('item.txt', 'r');
while (!feof($handler)) {
    $m[] = fgets($handler);
}
fclose($handler);
for ($i = 0; $i < count($m); $i++) {
    $info  = explode(" | ", $m[$i]);
    $ten   = $info[1];
    $class = $info[0];
    $id    = $info[2];
    $gia   = $info[3];
    $img   = "imgs/" . $info[4] . ".png";
    echo "<option value='{$id}-{$ten}-{$gia}'>{$class} | Tên Đồ: {$ten} | Giá Tiền : {$gia} Gold </option>";
}
?>

</select>
		 <input class="btn btn-info" type="submit" value="Mua"/></td>
		</tr>
		  </tbody>
		</form>
		</center>
<ul>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    
<?php
header('Content-Type:text/html; charset=utf-8');
$handler2 = fopen('item.txt', 'r');
while (!feof($handler2)) {
    $m1[] = fgets($handler2);
}
fclose($handler2);
for ($i = 0; $i < count($m1); $i++) {
    $info2  = explode(" | ", $m1[$i]);
    $ten1   = $info2[1];
    $class1 = $info2[0];
    $id1    = $info2[2];
    $gia1   = $info2[3];
    $img1   = "imgs/" . $info2[4] . ".png";
    echo "<img src=\"{$img1}\" alt=\"ITEM MU HUYENTHOAI\" height=\"42\" width=\"42\"><li> Class : {$class1} | Tên Đồ: {$ten1} | Giá Tiền : {$gia1} Gold </li>";
}
?>
</table>
                            </div>
</ul>
            
 <?php
include("footer.php");
?>
</body>
</html>
