<?php
include "./config.php";

$acc = $_POST['acc'];
$type = $_POST['type2'];

$sql = "UPDATE mu_android_stat.t_account SET gold = gold + $type WHERE ACCOUNT_KL_SSO  ='$acc'";
//echo $sql;
                            $conn = mysql_connect($dbhost,$dbuser,$dbpw);
                            mysql_query("set names 'utf8'");
                            if(!$conn){
                                die("Kết nối cơ sở dữ liệu bị lỗi, cấu hình file config.php! ! !");
                            }
                            $db_select = mysql_select_db($dbname);
                            if(!$db_select){
                                die("Kết nối cơ sở dữ liệu ".$dbname." trống! Vui lòng điền vào tên cơ sở dữ liệu ~~~~");
                            }
                            $result = mysql_query($sql,$conn);
                            if($result){
								echo "Add thành công";
							}else{
								echo "Add thất bại";
							}
?>