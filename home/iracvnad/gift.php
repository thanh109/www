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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">Trang chủ</a><span class="crumb-step">&gt;</span><span class="crumb-name">Quản lý Gift Code</span></div>
        </div>

        <div class="result-wrap">

                <div class="result-title">
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>Mã CODE</th>
                            <th>Số lượng sử dụng</th>
                            <th>Số lần đã sử dụng</th>
                            <th>Mã GameRes</th>
                            <th>Cho phép lặp</th>

                        </tr>
                        <?php
$conn = mysql_connect($config["DB_HOST"], $config["DB_USER"], $config["DB_PWD"]);
mysql_query("set names 'utf8'");
if (!$conn) {
    die("Kết nối cơ sở dữ liệu bị lỗi, cấu hình file config.php! ! !");
}
$db_select = mysql_select_db($config["DB_NAME1"]);
if (!$db_select) {
    die("Kết nối cơ sở dữ liệu " . $config["DB_NAME1"] . " trống! Vui lòng điền vào tên cơ sở dữ liệu ~~~~");
}
$page = $_GET['page'];
if (!is_numeric($page))
    $page = 1;
$queryCount = "SELECT * FROM t_linpinma ";
$query      = mysql_query($queryCount, $conn);
$num        = mysql_num_rows($query);
$per_page   = 50;
$start      = $per_page * ($page - 1);
$end        = min($num, $page * $per_page);
$sql        = "SELECT * FROM t_linpinma LIMIT $start, $per_page ";
$result     = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($result)) {
?>

                        <tr>
                            <td id="PlatformUID" name="PlatformUID"><?php
    echo $row['lipinma'];
?></td>
                            <td id="id" name="id"><?php
    echo $row['maxnum'];
?></td>
                            <td id="name" name="name"><?php
    echo $row['usednum'];
?></td>
                            <td id="level" name="level"><?php
    echo $row['ptid'];
?></td>
                            <td id="cs" name="cs"><?php
    echo $row['ptrepeat'];
?></td>

                        </tr> 
                         <?php
}
$pages = ceil($num / $per_page);
for ($s = 1; $s <= $pages; $s++) {
    if ($s == $page)
        $numPage .= "$s";
    else
        $numPage .= "<a href='gift.php?page=$s'>$s</a> ";
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