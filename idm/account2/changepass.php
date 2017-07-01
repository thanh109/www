<?php
include_once "config.php";
if(isset($_POST['submit']))
    {
        $username = $_POST['username']; 
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $confirmnewpassword = md5($_POST['confirmnewpassword']);

        //$result = mysql_query("SELECT password FROM registration WHERE email='$mail'");
        $result = mysql_query("SELECT id, name, passwd FROM $database.t_account WHERE name='$username'");
		$member = @mysql_fetch_array( $result );
        if(!$result)
        {
        echo '<script>alert("Tài Khoản Không Tồn Tại!!!");window.location = "taikhoan.php"</script>';
        }
        else if($password!= $member['passwd'])
        {
        echo '<script>alert("Mật Khẩu Cũ Không Đúng!!!");window.location = "taikhoan.php"</script>';
		break;
        }
        else if($newpassword==$confirmnewpassword)
			
        $sql=mysql_query("UPDATE $database.t_account SET passwd='$newpassword' where name='$username'");
        
		if($sql)
        {
         echo '<script>alert("Bạn đã đổi mật khẩu thành công!");window.location = "taikhoan.php"</script>';
        }
       else
        {
       echo '<script>alert("Mật Khẩu Mới Không Khớp");window.location = "taikhoan.php"</script>';
       }
	   }
?>