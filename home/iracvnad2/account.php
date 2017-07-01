<!doctype html>
<?php
include "top.php";
include "config.php";
?>

<div class="container clearfix">
    <?php
include "menu.php";
?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">Trang chủ</a><span class="crumb-step">&gt;</span><span class="crumb-name">Quản lý tài khoản</span></div>
        </div>

        <div class="result-wrap">

                <div class="result-title">
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>User ID</th>
                            <th>Tài khoản</th>
                            <th>Đã Nạp</th>
                            <th>Gold</th>
                            <th>Điểm Thưởng</th>
                            <th>Nạp Ngày</th>
                            <th>Hành động</th>
                        </tr>
                        <?php
$conn = mysql_connect($config["DB_HOST"], $config["DB_USER"], $config["DB_PWD"]);
mysql_query("set names 'utf8'");
if (!$conn) {
    die("Kết nối cơ sở dữ liệu bị lỗi, cấu hình file config.php! ! !");
}
$db_select = mysql_select_db($config["DB_NAME"]);
if (!$db_select) {
    die("Kết nối cơ sở dữ liệu " . $config["DB_NAME"] . " trống! Vui lòng điền vào tên cơ sở dữ liệu ~~~~");
}
$page = $_GET['page'];
if (!is_numeric($page))
    $page = 1;
$queryCount = "SELECT * FROM t_account ";
$query      = mysql_query($queryCount, $conn);
$num        = mysql_num_rows($query);
$per_page   = 50;
$start      = $per_page * ($page - 1);
$end        = min($num, $page * $per_page);
$sql        = "SELECT * FROM t_account ORDER BY thenap DESC LIMIT $start, $per_page ";
$result     = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($result)) {
?>
                        <tr>
                            <td id="c_time" name="c_time"><?php
    echo "QMQJ".$row['name'];
?></td>
                            <td id="userName" name="userName"><?php
    echo $row['name'];
?></td>
                            <td id="passWord" name="passWord"><?php
    echo $row['thenap'];
?></td>
                            <td id="c_time" name="c_time"><?php
    echo $row['gold'];
?></td>
                            <td id="c_time" name="c_time"><?php
    echo $row['diemthuong'];
?></td>
                            <td id="c_time" name="c_time"><?php
    echo $row['napngay'];
?></td>
                            <td>
                                <a class="link-del" href="javascript:alert('Chức năng đang hoàn thiện!');">Đổi mật khẩu</a>
                                | <a class="link-del" href="javascript:alert('Chức năng đang hoàn thiện!');">Xóa</a>
                            </td>
                        </tr> 
                         <?php
}
$pages = ceil($num / $per_page);
for ($s = 1; $s <= $pages; $s++) {
    if ($s == $page)
        $numPage .= "$s";
    else
        $numPage .= "<a href='account.php?page=$s'>$s</a> ";
}
?>
                    </table>
                    <div class="list-page"><?php
echo $numPage;
?></div>
                </div>

        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>