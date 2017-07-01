<?php
include "config.php";
setlocale(LC_MONETARY, 'vi_VN');
$conn = mysql_connect($config["DB_HOST"], $config["DB_USER"], $config["DB_PWD"]);
mysql_query("set names 'utf8'");
if (!$conn) {
    die("Kết nối cơ sở dữ liệu bị lỗi, cấu hình file config.php! ! !");
} //!$conn
$db_select = mysql_select_db($config["DB_NAME"]);
if (!$db_select) {
    die("Kết nối cơ sở dữ liệu " . $config["DB_NAME"] . " trống! Vui lòng điền vào tên cơ sở dữ liệu ~~~~");
} //!$db_select
$sql    = "SELECT * FROM `t_account` ORDER BY `napngay` DESC LIMIT 5";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    if ($row['napngay'] == 0) {
        echo <<<hitpro
	<tr>
                                       
                                        <td>Not Data</td>
                                       
                                   
                                        <td>Not Data</td>
                                        
                                    </tr>
hitpro;
    } //$row['napngay'] == 0
    else {
?>

                  <tr>
                                       
                                        <td><?php
        echo $row['name'];
?></td>
                                       
                                   
                                        <td><?php
        echo  money_format('%(#10n', $row['napngay']);
?></td>
                                        
                                    </tr>
	 
<?php
    }
} //$row = mysql_fetch_array($result)
mysql_close($conn);
?>