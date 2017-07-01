<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";
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
                Lịch Sử Giao Dịch
            </li>
        </ol>
    </section>
    <!--section ends-->
</aside>
<aside class="right-side">

    <section class="content">
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel ">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="ti-layout-grid3"></i> Lịch Sử Giao Dịch
                            </h3>
                            <span class="pull-right">
                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                    <i class="fa fa-fw ti-close removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                                        <th>Loại Giao Dịch</th>
                                                        <th>Ghi Chú</th>
                                                        <th>Ngày Giao Dịch</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    

            <!-- First Basic Table Ends Here-->
<?php
$sql    = "SELECT * FROM $database.t_hitlogs WHERE userid='" . $_SESSION['username'] . "'";
$query  = mysql_query($sql);
while ($row = mysql_fetch_array($query)) {
    $type = $row["type"];
	$idm = $row["id"];
	$comment = $row["comment"];
	$ngay = $row["date"];
		switch ($type) {
        case "doigold":
            $ten = "Lịch Sử Đổi Gold";
			$tinhtrang = "Hoàn Thành";
            break;
        case "webshop":
            $ten = "Lịch Sử Mua Sắm";
			$tinhtrang = "Hoàn Thành";
            break;
        case "nap_thanhcong":
            $ten = "Lịch Sử Nạp Thẻ";
			$tinhtrang = "Hoàn Thành";
            break;
        case "nap_thatbai":
            $ten = "Lịch Sử Nạp Lỗi";
			$tinhtrang = "Lỗi";
            break;
        case "phuchoi":
            $ten = "Lịch Sử Phục Hồi Nhân Vật";
			$tinhtrang = "Hoàn Thành";
            break;
        case "thethang":
            $ten = "Lịch Sử Mua Thẻ Tháng";
			$tinhtrang = "Hoàn Thành";
            break;
    }
    $table = <<<hit
												<tr>
												<td class="bg-default"><font color="blue"><b>$idm</font></b></td>
												<td class="bg-default"><b><font color="red">$tinhtrang</font></b></td>
												<td class="bg-default"><b>$comment</b></td>
												<td class="bg-default"><b><font color="red">$ngay</font></b></td>
												</tr>

hit;
echo $table;
    
    //    echo '<td class="bg-default">' . $row["level"] . '</td><td class="bg-default">' . $row["changelifecount"] . '</td><td class="bg-default">' . $ten . '</td><td class="bg-default">' . $tt . '</td></tr>';
}
?>				

														
												
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="background-overlay"></div>
</section>

<?php
include("footer.php");
?>
</body>

</html>