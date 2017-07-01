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
                Tài Khoản
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
                        <a href="#thongtin" data-toggle="tab">
                                Thông Tin
                            </a>
                    </li>
                    <li>
                        <a href="#matkhau" data-toggle="tab">
							Mật Khẩu
							</a>
                    </li>
                    
                </ul>
                <div class="tab-content m-t-10">
                    <div id="thongtin" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                <i class="ti-list-ol"></i> Danh Sách Nhân Vật
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
                                                        <th>Trạng Thái</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
$sql        = "select * from $database.t_account where name='" . $_SESSION['username'] . "'";
$result     = mysql_query($sql);
$total      = mysql_num_rows($result);
$row        = mysql_fetch_array($result);
$userid     = $row['ACCOUNT_KL_SSO'];
$sql2       = "select * from $database2.t_roles where userid='" . $userid . "'";
$result2    = mysql_query($sql2);
$row2       = mysql_fetch_array($result2);
$tennhanvat = $row2['rname'];
$sql        = "SELECT * FROM $database2.t_roles WHERE userid='" . $userid . "'";
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
        case 5:
            $ten = "<img src ='./img/icon/05.png' alt='Triệu Hoán Sư'>";
            break;
    }
    switch ($row["isdel"]) {
        case 0:
            $tt = "<font color='green'>Tồn Tại</font>";
            break;
        case 1:
            //$tt = "<font color='red'><b><s>Đã Xóa</s></b></font> Lúc : " . $row["deltime"];
            $tt = "<font color='red'><b><s>Đã Xóa</s></b></font>";
            break;
    }
	
	
    echo '<tr><td class="bg-default"><font color="blue"><b>' . $row["rname"] . '</font></b></td><td class="bg-default"><b><font color="red">' . number_format($row["combatforce"]) . '</font></b></td><td class="bg-default">' . $row["level"] . '</td><td class="bg-default">' . $row["changelifecount"] . '</td><td class="bg-default">' . $ten . '</td><td class="bg-default">' . $tt . '</td></tr>';
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
                    <div id="matkhau" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                                <i class="fa fa-fw ti-pencil"></i> Đổi Mật Khẩu
                                            </h3>
                                        <span class="pull-right hidden-xs">
                                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                                    <i class="fa fa-fw ti-close removepanel clickable"></i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <div>
										<form method="POST" action="changepass.php">
                                            <div class="col-md-6">
                                                
                                                    <div class="form-group has-warning">
                                                        <label class="col-md-2 control-label" for="inputWarning1"></label>
                                                        <div class="col-md-10">
                                                            <input name="password" type="password" id="inputWarning1" class="form-control" placeholder="Mật Khẩu Cũ">
                                                            <input name="username" type="hidden" class="form-control" value="<?php
echo $_SESSION['username'];
?>">
                                                            <span class="help-block">
                                                                        Mật Khẩu Cũ
                                                                    </span>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="form-group has-warning has-feedback">
                                                        <div class="col-md-10">
                                                            <input name="newpassword" type="password" id="inputWarning2" class="form-control" placeholder="Mật Khẩu Mới">
                                                            <input name="confirmnewpassword" type="password" id="inputWarning2" class="form-control" placeholder="Nhập Lại Mật Khẩu Mới">
                                                            <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                                                            <span class="help-block">
                                                                        Mật Khẩu Mới
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Đổi Mật Khẩu
                                                            </button>
                                                        </div>
                                                    </div>
                                               
                                            </div>
											</form>
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