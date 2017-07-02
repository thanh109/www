<?php

include_once "config.php";

if ( @$_GET['token'] )
{
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username = addslashes( $_GET['token'] );

    // Lấy thông tin của username đã nhập trong table account
    $sql_query = @mysql_query("SELECT id, name, passwd FROM $database.t_account WHERE name='{$username}'");
    $member = @mysql_fetch_array( $sql_query );
    // Nếu username này không tồn tại thì....
    if ( @mysql_num_rows( $sql_query ) <= 0 )
    {
        print "<script>alert('Tài khoản không tồn tại!');window.location.href='login.php';</script>";
        exit;
    }

    // Khởi động phiên làm việc (session)
    @$_SESSION['username'] = $_GET['token'];
	print "<script>window.location.href='index.php';</script>";
    // Đăng nhập thành công chuyển hướng đến
}

?>