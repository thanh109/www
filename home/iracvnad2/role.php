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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">Trang chủ</a><span class="crumb-step">&gt;</span><span class="crumb-name">Quản lý nhân vật</span></div>
        </div>

        <div class="result-wrap">

                <div class="result-title">
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>User ID</th>
                            <th>RID</th>
                            <th>Nhân vật</th>
                            <th>Cấp độ</th>
                            <th>Chuyển Sinh</th>
                            <th>Kim Cương Khóa</th>
                            <th>Hành động</th>
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
$queryCount = "SELECT * FROM t_roles ";
$query      = mysql_query($queryCount, $conn);
$num        = mysql_num_rows($query);
$per_page   = 50;
$start      = $per_page * ($page - 1);
$end        = min($num, $page * $per_page);
$sql        = "SELECT * FROM t_roles LIMIT $start, $per_page ";
$result     = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($result)) {
?>

                        <tr>
                            <td id="PlatformUID" name="PlatformUID"><?php
    echo $row['userid'];
?></td>
                            <td id="id" name="id"><?php
    echo $row['rid'];
?></td>
                            <td id="name" name="name"><?php
    echo $row['rname'];
?></td>
                            <td id="level" name="level"><?php
    echo $row['level'];
?></td>
                            <td id="cs" name="cs"><?php
    echo $row['changelifecount'];
?></td>
                            <td id="kimcuong" name="kimcuong"><?php
    echo $row['yinliang'];
?></td>
                            <td>
                                <a class="link-update" href="chongzhiGM.php?userid=<?php
    echo $row['userid'];
?>&id=<?php
    echo $row['rid'];
?>&name=<?php
    echo $row['rname'];
?>">Thêm Kim Cương</a>
                                | <a class="link-update" href="gm.php?userid=<?php
    echo $row['userid'];
?>&id=<?php
    echo $row['rid'];
?>&name=<?php
    echo $row['rname'];
?>">Chức năng</a>
                            </td>
                        </tr> 
                         <?php
}
$pages = ceil($num / $per_page);
for ($s = 1; $s <= $pages; $s++) {
    if ($s == $page)
        $numPage .= "$s";
    else
        $numPage .= "<a href='role.php?page=$s'>$s</a> ";
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