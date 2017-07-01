<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";
$uname2 = $_SESSION['username'];
?>
<link rel="stylesheet" type="text/css" href="css/form_layouts.css">
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
                Khôi Phục Nhân Vật
            </li>
        </ol>
    </section>
    <!--section ends-->


    <section class="content">
        <div class="row">
            <div class="col-lg-12">
			 <div class="panel-body">
                <div class="am-g am-g-fixed am-margin-top">
                            <div class="col-lg-12">
                                <div class="panel ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                <i class="ti-list-ol"></i> Danh Sách Nhân Vật Đã Xóa
                            </h3>
                                        <span class="pull-right">
                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                    <i class="fa fa-fw ti-close removepanel clickable"></i>
                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                       
                                                        <th>Tên</th>
                                                        <th>Lực Chiến</th>
                                                        <th>Cấp</th>
                                                        <th>Chuyển</th>
                                                        <th>Class</th>
                                                        <th>Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<div class="col-lg-12 col-md-3">
                                    <div class="panel  panel-default hvr-sweep-to-right">
                                        <div class="panel-body ok_message text-center">
                                            <h5> Phí Phục Hồi là 500 Gold<br>
												Bạn Cần Đảm Bảo Sau Khi Phục Hồi 3h Sau Mới Đăng Nhập Lại Game!<i class="fa fa-thumbs-o-up"></i></h5>
                                        </div>
                                    </div>
                                </div>
														<?php
$sql        = "select * from $database.t_account where name='" . $_SESSION['username'] . "'";
$result     = mysql_query($sql);
$total      = mysql_num_rows($result);
$row        = mysql_fetch_array($result);
$userid     = $row['ACCOUNT_KL_SSO'];
$sql2       = "select * from $database2.t_roles where userid='" . $userid . "' and isdel ='1'";
$result2    = mysql_query($sql2);
$row2       = mysql_fetch_array($result2);
$tennhanvat = $row2['rname'];
$sql        = "SELECT * FROM $database2.t_roles WHERE userid='" . $userid . "' and isdel ='1'";
$query      = mysql_query($sql);
while ($row = mysql_fetch_array($query)) {
    switch ($row["occupation"]) {
        case 0:
            $ten = "<img src ='./img/icon/00.png' alt='Kiếm Sỹ'>";
            break;
        case 1:
            $ten = "<img src ='./img/icon/01.png' alt='Ma Pháp Sư'>";
            break;
        case 2:
            $ten = "<img src ='./img/icon/12.png' alt='Cung Thủ'>";
            break;
        case 3:
            $ten = "<img src ='./img/icon/03.png' alt='Đấu Sĩ'>";
            break;
    }
    
    echo '<tr><td class="bg-default"><font color="blue"><b>' . $row["rname"] . '</font></b></td><td class="bg-default"><b><font color="red">' . number_format($row["combatforce"]) . '</font></b></td><td class="bg-default">' . $row["level"] . '</td><td class="bg-default">' . $row["changelifecount"] . '</td><td class="bg-default">' . $ten . '</td><td class="bg-default"><b><a href="?phuchoi=nhanvat&rid=' . $row["rid"] . '&rname=' . $row["rname"] . '" class="btn btn-info" style="color:red">Lấy Lại</a></b></td></tr>';
}
?>
												
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>


                        </div>
               </div>
               </div>



<div class="background-overlay"></div>
</section>

<?php
include("footer.php");

if (isset($_GET['phuchoi']) && $_GET['phuchoi'] = "nhanvat") {
    
    //name=QMQJhitpro&rid=200004&submit=Mua: undefined
    
    $rid        = $_GET['rid'];
    $tennhanvat = $_GET['rname'];
    
    $sql1   = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql1);
    $total  = mysql_num_rows($result);
    $row0   = mysql_fetch_array($result);
    
    if ($total > 0 and $row0['gold'] >= 500) {
        $sql2    = "UPDATE $database2.t_roles SET isdel = 0 WHERE rid ='$rid'";
        $result2 = mysql_query($sql2);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 500 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $time   = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time       = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Phục Hồi Nhân Vật " . $tennhanvat . " Hết 500 Gold.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'phuchoi', '$comment', '$time')";
        $result4    = mysql_query($updatelog);
        echo '<script>alert("Phục hồi nhân vật thành công");window.location = "phuchoi.php"</script></div>';
    } else {
        echo '<script>alert("Phục hồi nhân vật thất bại, bạn không đủ Gold");window.location = "phuchoi.php"</script></div>';
    }
    
    
    
}

?>
</body>

</html>