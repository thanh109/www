<?php
include_once "config.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
error_reporting(0);

$sql        = "select * from $database.t_account where name='" . $_SESSION['username'] . "'";
$sql        = "select * from $database.t_account where name='" . $_SESSION['username'] . "'";
$result     = mysql_query($sql);
$total      = mysql_num_rows($result);
$row        = mysql_fetch_array($result);
$userid     = $row['ACCOUNT_KL_SSO'];
$sql2       = "select * from $database2.t_roles where userid='" . $userid . "' and isdel ='0'";
$result2    = mysql_query($sql2);
$row2       = mysql_fetch_array($result2);
$tennhanvat = $row2['rname'];
$sql        = "SELECT * FROM $database2.t_roles WHERE userid='" . $userid . "' and isdel ='0'";
$query      = mysql_query($sql);
$myrow      = mysql_fetch_array($query);
$myrow1     = mysql_fetch_array($query);
$myrow2     = mysql_fetch_array($query);
$myrow3     = mysql_fetch_array($query);
$form       = "<option value='null'>Chưa tạo nhân vật</option>";
if (!empty($myrow)) {
    $form = "<option value=" . $myrow['rid'] . "-" . $myrow['rname'] . ">" . $myrow['rname'] . "</option>";
} //!empty($myrow)
if (!empty($myrow1)) {
    $form = "<option value=" . $myrow['rid'] . "-" . $myrow['rname'] . ">" . $myrow['rname'] . "</option><option value=" . $myrow1['rid'] . "-" . $myrow1['rname'] . ">" . $myrow1['rname'] . "</option>";
} //!empty($myrow1)
if (!empty($myrow2)) {
    $form = "<option value=" . $myrow['rid'] . "-" . $myrow['rname'] . ">" . $myrow['rname'] . "</option><option value=" . $myrow1['rid'] . "-" . $myrow1['rname'] . ">" . $myrow1['rname'] . "</option><option value=" . $myrow2['rid'] . "-" . $myrow2['rname'] . ">" . $myrow2['rname'] . "</option>";
} //!empty($myrow2)
if (!empty($myrow3)) {
    $form = "<option value=" . $myrow['rid'] . ">" . $myrow['rname'] . "</option><option value=" . $myrow1['rid'] . "-" . $myrow1['rname'] . ">" . $myrow1['rname'] . "</option><option value=" . $myrow2['rid'] . "-" . $myrow2['rname'] . ">" . $myrow2['rname'] . "</option><option value=" . $myrow3['rid'] . "-" . $myrow3['rname'] . ">" . $myrow3['rname'] . "</option>";
} //!empty($myrow3)
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MU <?php echo $gamename;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" href="css/app.css" rel="stylesheet"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="vendors/swiper/css/swiper.min.css">
    <link href="vendors/ihover/css/ihover.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/animate/animate.min.css">
	<link href="css/datatable.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/custom_css/widgets.css">
	<link rel="stylesheet" type="text/css" href="vendors/sweetalert2/css/sweetalert2.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom_css/sweet_alert2.css">
    <link href="vendors/hover/css/hover-min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendors/laddabootstrap/css/ladda-themeless.min.css">
    <link href="css/buttons_sass.css" rel="stylesheet">
    <link href="css/advbuttons.css" rel="stylesheet">
	<link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/passtrength/passtrength.css">
	<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom_css/datatables_custom.css">
    <link rel="stylesheet" href="css/custom_css/form2.css"/>
    <link rel="stylesheet" href="css/custom_css/form3.css"/>




    <!--end of page level css-->
</head>
<body class="skin-default">
<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <!--a href="napthe.php" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <!--img src="img/logo.png" alt="logo">
			<h4 class="media-heading">
			Nông Dân - 1
			</h4>
			<a class="navbar-brand" href="javascript: history.back(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </a-->
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
		<a class="navbar-brand" href="javascript: history.back(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
		
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        
        
        <div class="navbar-right">
		<a class="navbar-right" href="#" onclick="document.location = 'js-oc:kunlunClose:null';return false"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
            <!--ul class="nav navbar-nav">
               <!--rightside toggle-->
                <!--li>
                    <a href="#" class="dropdown-toggle toggle-right">
                        <i class="fa fa-fw ti-view-list black"></i>
                        <span class="label label-danger">9</span>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown-->
                <!--li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="img/authors/avatar1.jpg" width="35" class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                <?php
echo $name;
?>
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <!--li class="user-header">
                            <img src="img/authors/avatar1.jpg" class="img-circle" alt="User Image">
                            <p> <?php
echo $_SESSION['username'];
?></p>
                        </li>
                        <!-- Menu Body -->
                        <!--li class="p-t-3">
                            <!--a href="user_profile.html">
                                <i class="fa fa-fw ti-user"></i> My Profile
                            </a-->
                        <!--/li>
                        <li role="presentation"></li>
                        <li>
                            <!--a href="edit_user.html">
                                <i class="fa fa-fw ti-settings"></i> Account Settings
                            </a-->
                        <!--/li>
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <!--li class="user-footer">
                            <div class="pull-left">
                                <!--a href="lockscreen.html">
                                    <i class="fa fa-fw ti-lock"></i>
                                    Lock
                                </a-->
                            <!--/div>
                            <div class="pull-right">
                                <a href="logout.php">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul-->
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="#">
                            <img src="img/authors/avatar1.jpg" class="img-circle" alt="User Image">
                        </a>
                        <div class="content-profile">
                            <h4 class="media-heading">
                                <?php
echo $_SESSION['username'];
?>
                            </h4><br>
							<h5 class="media-heading">
                              
             Vàng: <?php
echo $row['gold'];
?><br>
              Điểm Thưởng: <?php
echo $row['diemthuong'];
?>
                            </h5>
                            <ul class="icon-list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-lock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-settings"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="navigation active">
                    <li>
                        <a href="index.php">
                            <i class="menu-icon ti-home"></i>
                            <span class="mm-text ">Trang Chủ</span>
                        </a>
                    </li>
					<li>
                        <a href="taikhoan.php">
                            <i class="menu-icon ti-user"></i>
							<span class="mm-text ">Tài Khoản</span>
                        </a>
                    </li>
					<li>
                        <a href="webshop.php">
                            <i class="fa fa-fw fa-shopping-cart"></i>
							<span class="mm-text ">Web Shop</span>
                        </a>
                    </li>
					<li>
                        <a href="phuchoi.php">
                            <i class="fa fa-fw fa-refresh"></i>
							<span class="mm-text ">Phục Hồi Nhân Vật</span>
                        </a>
                    </li>
                    <li>
                        <a href="thethang.php">
                            <i class="fa fa-fw fa-credit-card"></i>
                            <span class="mm-text ">Thẻ Tháng</span>
                        </a>
                    </li>  
					<li>
                        <a href="doigold.php">
                            <i class="fa fa-fw fa-diamond"></i>
                            <span class="mm-text ">Đổi Kim Cương</span>
                        </a>
                    </li>
                    <li>
                        <a href="napthe.php">
                            <i class="fa fa-fw fa-money"></i>
                            <span class="mm-text ">Nạp Thẻ</span>
                        </a>
                    </li>
                    
                            
                       
                </ul>
				
				<hr>
				
        <!-- /.sidebar -->
    </aside>
<?php
if (time() >= strtotime('2017-06-07 00:00:00') && time() <= strtotime('2017-12-15 23:59:59')) {
    if (($row['diemthuong'] >= 500) && empty($ok)) {
        print "<aside class=\"right-side\">
        <!-- Content Header (Page header) -->
        <section class=\"content-header\">
            <!--section starts-->
           <div class=\"panel \">
            <div class=\"panel-heading\">
                                            <h3 class=\"panel-title\">
                                                <i class=\"fa fa-fw ti-pencil\"></i> Nhận thưởng sự kiện
                                            </h3>
                                            <span class=\"pull-right hidden-xs\">
                                                    <i class=\"fa fa-fw ti-angle-up clickable\"></i>
                                                    <i class=\"fa fa-fw ti-close removepanel clickable\"></i>
                                                </span>
                                        </div>
										<div class=\"panel-body\">
                  <center><form action=\"nhanthuong.php\" method=\"post\">Nhân Vật Nhận Thưởng:<select name=\"idnhan\" id=\"mua\" > {$form} </select><br>Chọn Vật Phẩm :<select name=\"act\"><option  value=\"3\" >Pet Thiên Chước </option><option  value=\"2\">Hộ Phù Vip</option></select><input type=\"hidden\" value=\"{$_SESSION['username']}\" name=\"id\"><br><button type=\"submit\" class=\"btn btn-labeled btn-success\">
                                                <span class=\"btn-label\">
                                                <i class=\"glyphicon glyphicon-ok\"></i>
                                            </span> Nhận Thưởng
                                        </button><br><span>Lưu Ý Chọn Phù Hoặc Pet Nhé Các Nông Dân!!!</span></center></form>
               <br>
                </div>
				</div>
            
        </section>
        <!--section ends-->
        </aside>";
    } 

} //time() >= strtotime('2017-05-07 00:00:00') && time() <= strtotime('2017-05-15 23:59:59')
?>  