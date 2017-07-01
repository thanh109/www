<?php
session_start();
// Cấu hình file config
//echo md5("123456");
require_once("config.php");
if ( @$_GET['act'] == "do" )
{
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username = addslashes( $_POST['username'] );
    $password =  addslashes( $_POST['password'] );

    // Lấy thông tin của username đã nhập trong table account
    $sql_query = @mysql_query("SELECT id, name, passwd FROM $database.t_account WHERE name='{$username}'");
    $member = @mysql_fetch_array( $sql_query );
    // Nếu username này không tồn tại thì....
    if ( @mysql_num_rows( $sql_query ) <= 0 )
    {
        print "<script>alert('Tài khoản không tồn tại!');window.location.href='login.php';</script>";
        exit;
    }
    // Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
    if ( md5($password) != $member['passwd'] )
    {
        print "<script>alert('Tài khoản hoặc mật khẩu không chính xác!');window.location.href='login.php';</script>";
        exit;
    }
    // Khởi động phiên làm việc (session)
    @$_SESSION['username'] = $member['name'];
    // Đăng nhập thành công chuyển hướng đến
    print "<script>window.location.href='index.php';</script>";
}
else
{
// Form đăng nhập
print <<<EOF
<!DOCTYPE html>
<html>

<head>
    <title>::Đăng Nhập Mu - Nông Dân::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- end of bootstrap -->
    <!--page level css -->
    <link type="text/css" href="vendors/themify/css/themify-icons.css" rel="stylesheet"/>
    <link href="vendors/iCheck/css/all.css" rel="stylesheet">
    <link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"/>
    <link href="css/login.css" rel="stylesheet">
    <!--end page level css-->
</head>

<body id="sign-in">
<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
            <div class="panel-header">
                <h2 class="text-center">
                    <!--img src="img/pages/clear_black.png" alt="Logo"-->
					<span>Nông Dân - 1</span>
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="login.php?act=do" id="authentication" method="post" class="login_validator">
                            <div class="form-group">
                                <label for="email" class="sr-only">Tài Khoản</label>
                                <input type="text" class="form-control  form-control-lg" id="username" name="username"
                                       placeholder="Tài Khoản" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password"
                                       name="password" placeholder="Mật Khẩu" required>
                            </div>
                            <div class="form-group checkbox">
                                <label for="remember">
                                    <input type="checkbox" name="remember" id="remember">&nbsp; Ghi nhớ lần sau!
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Đăng Nhập" class="btn btn-primary btn-block onclick="new PNotify({
                                        title: 'Chào Anh Hùng!',
                                        text: 'Chúng tôi rất mừng vì anh hùng đã quay trở lại với MU Nông Dân',
                                        type: 'info',
                                        hide: false
                                    });"/>
                            </div>
                            <!--a href="forgot_password.html" id="forgot" class="forgot"> Forgot Password ? </a-->

                            <!--span class="pull-right sign-up">New ? <a href="register.html">Sign Up</a></span-->
                        </form>
                    </div>
                </div>
                <!--div class="row text-center social">
                    <div class="col-xs-12">
                        <p class="alter">Sign in with</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-lg btn-facebook">
                                    <i class="ti-facebook"></i>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-lg btn-twitter">
                                    <i class="ti-twitter-alt"></i>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="btn btn-lg btn-google">
                                    <i class="ti-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div-->
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- end of global js -->
<!-- page level js -->
<!--script type="text/javascript" src="vendors/iCheck/js/icheck.js"></script>
<script src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script-->
<script type="text/javascript" src="js/custom_js/login.js"></script>
<!-- end of page level js -->

</body>

</html>
EOF;
}
?>
