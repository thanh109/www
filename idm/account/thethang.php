<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";
$uname2 = $_SESSION['username'];
?>
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
                    Thẻ Tháng
                </li>
            </ol>
        </section>
        <!--section ends-->
        </aside>
		 <aside class="right-side">
<center>
Mua thẻ tháng :  500 Gold/30 ngày<br/>
		
		
		<form action="thethang.php" method="post">
		  <tbody>
		<tr>
		<hr>
		<input name="name" type="hidden" class="form-control" value="<?php
echo $_SESSION['username'];
?>">
<h3><td>Mua Cho Nhân Vật :</h3></td> <td><select name="rid" id="rid" class="form-control"></td>
				

<?php

$sql   = "SELECT * FROM $database2.t_roles WHERE userid='QMQJ" . $uname2 . "' and isdel='0'";
$query = mysql_query($sql);
while ($row = mysql_fetch_array($query)) {
    echo "<option value='" . $row['rid'] . "|" . $row['rname'] . "'>" . $row['rname'] . "</option>";
}

?>
	</select></td>		
		 <input class="btn btn-info" name="submit" type="submit" value="Mua"/></td>
		</tr>
		  </tbody>
		</form>
		</center>
<ul>

                            <div class="table-responsive">
                               
                            </div>
</ul>
            
 <?php
include("footer.php");
if (isset($_POST['submit'])) {
    
    //name=QMQJhitpro&rid=200004&submit=Mua: undefined
    
    $nguoinhan1 = $_POST['rid'];
    $nhanvat    = explode("|", $nguoinhan1);
    $rid        = $nhanvat[0];
    $tennhanvat = $nhanvat[1];
    
    //$rid = $_POST['rid'];
    
    $sql1   = "SELECT * FROM $database.t_account WHERE name='" . $uname2 . "'";
    $result = mysql_query($sql1);
    $total  = mysql_num_rows($result);
    $row0   = mysql_fetch_array($result);
    
    if ($total > 0 and $row0['gold'] >= 500) {
        
        $sql2    = "insert into $database2.t_gmmsg (msg) VALUES ('-buyyueka QMQJ$uname2 $rid');";
        $result2 = mysql_query($sql2);
        $sql3    = "UPDATE $database.t_account SET gold = gold - 500 WHERE name ='" . $uname2 . "'";
        $result3 = mysql_query($sql3);
        $result4 = mysql_query($sql4);
        
        #lưu giao dịch #
        
        $time2    = time('Y-m-d, H:i:s');
        $time_GMT = new DateTime('@' . $time2);
        $time_GMT->setTimeZone(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $time2      = $time_GMT->format('d/m/Y, H:i:s');
        $idgiaodich = $hit->random(5);
        $comment    = "Mua Thẻ Tháng Cho Nhân Vật " . $tennhanvat . " Với Giá 500 Gold.";
        $updatelog  = "INSERT INTO $database.t_hitlogs (id, userid, type, comment, date) VALUES ('$idgiaodich', '$uname2', 'thethang', '$comment', '$time2')";
        $result4    = mysql_query($updatelog);
        
        echo '<script>alert("Mua thành công thẻ tháng!");window.location = "thethang.php"</script></div>';
    } else {
        echo '<script>alert("Mua thất bại thẻ tháng!");window.location = "thethang.php"</script></div>';
    }
    
    
    
}

?>
</body>
</html>
