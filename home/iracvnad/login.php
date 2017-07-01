<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="shortcut icon" href="../favicon.ico">
    <title>Đăng nhập - Admin Panel - Mu Nhất Kiếm</title>
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>ĐĂNG NHẬP</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="action.php?action=login" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">Tài khoản:</label>
                        <input type="text" name="username" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">Mật khẩu:</label>
                        <input type="password" name="pwd" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="Đăng nhập" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright">&copy; 2016 Powered by <a tabindex="5" href="http://www.Irac.info/" target="_blank">Irac</a></p>
</div>
</body>
</html>