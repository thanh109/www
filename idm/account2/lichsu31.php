<?php
include "navbar.php";
include_once "config.php";
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
$lichsu   = $_GET['type'];
$lichsu   = $lichsu ? $lichsu : 'doigold';
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
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="?type=doigold" >
                                Lịch Sử Đổi Gold
                            </a>
                    </li>
                    <li class="active">
                        <a href="?type=webshop" >
							Lịch Sử Mua Sắm
							</a>
                    </li>
                    <li class="active">
                        <a href="?type=nap_thanhcong" >
							Lịch Sử Nạp Thẻ
							</a>
                    </li>
                    <li class="active">
                        <a href="?type=phuchoi" >
							Lịch Sử Phục Hồi Nhân Vật
							</a>
                    </li>
                    <li class="active">
                        <a href="?type=thethang" >
							Lịch Sử Mua Thẻ Tháng
							</a>
                    </li>
                    <li class="active">
                        <a href="?type=nap_thatbai" >
							Lịch Sử Nạp Lỗi
							</a>
                    </li>
                    
                </ul>
<?php
$sql    = "SELECT * FROM $database.t_hitlogs WHERE userid='" . $_SESSION['username'] . "' and type = '". $lichsu ."'";
$query  = mysql_query($sql);
while ($row = mysql_fetch_array($query)) {
    $type = $row['type'];
	switch ($type) {
        case "doigold":
            $ten = "Lịch Sử Đổi Gold";
            break;
        case "webshop":
            $ten = "Lịch Sử Mua Sắm";
            break;
        case "nap_thanhcong":
            $ten = "Lịch Sử Nạp Thẻ";
            break;
        case "nap_thatbai":
            $ten = "Lịch Sử Nạp Lỗi";
            break;
        case "phuchoi":
            $ten = "Lịch Sử Phục Hồi Nhân Vật";
            break;
        case "thethang":
            $ten = "Lịch Sử Mua Thẻ Tháng";
            break;
        case "":
            $ten = "Lịch Sử Trống";
            break;
		
    }
}
?>
                <div class="tab-content m-t-10">
				<div id="<?php echo $lichsu ?>" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                <i class="ti-list-ol"></i> <?php echo $ten ?>
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
                                                        
                                                        <th>ID</th>
                                                        <th>Loại Giao Dịch</th>
                                                        <th>Ghi Chú</th>
                                                        <th>Ngày Giao Dịch</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												
<?php
$sql    = "SELECT * FROM $database.t_hitlogs WHERE userid='" . $_SESSION['username'] . "' and type = '". $lichsu ."'";
$query  = mysql_query($sql);
while ($row = mysql_fetch_array($query)) {
    $type = $row['type'];
	$id = $row['id'];
	$comment = $row['comment'];
	$date = $row['date'];
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
	if(!empty($row['type'])){
    echo <<<hit
			<tr>
												<td class="bg-default"><font color="blue"><b>$id</font></b></td>
												<td class="bg-default"><b><font color="red">$tinhtrang</font></b></td>
												<td class="bg-default"><b>$comment</b></td>
												<td class="bg-default"><b><font color="red">$date</font></b></td>
												</tr>
												
hit;
    }else
	{
echo<<<page
			<div id="doigold" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                <i class="ti-list-ol"></i> Lịch Sử Trống
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
                                                        
                                                        <th>ID</th>
                                                        <th>Loại Giao Dịch</th>
                                                        <th>Ghi Chú</th>
                                                        <th>Ngày Giao Dịch</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<tr>
												<td class="bg-default"><font color="blue"><b>No Data</font></b></td>
												<td class="bg-default"><b><font color="red">No Data</font></b></td>
												<td class="bg-default"><b>No Data</b></td>
												<td class="bg-default"><b><font color="red">No Data</font></b></td>
												</tr>
												</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
page;
	}
    
    
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