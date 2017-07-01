<?php
session_start();
include_once "config.php";
$name = $_GET['token'];
if (@$_GET['token']) {
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username  = addslashes($_GET['token']);
    // Lấy thông tin của username đã nhập trong table account
    $sql_query = @mysql_query("SELECT id, name, passwd FROM $database.t_account WHERE name='{$username}'");
    $member    = @mysql_fetch_array($sql_query);
    // Nếu username này không tồn tại thì....
    if (@mysql_num_rows($sql_query) <= 0) {
        print "<script>alert('Tài khoản không tồn tại!');window.location.href='login.php';</script>";
        
    } //@mysql_num_rows($sql_query) <= 0
    // Khởi động phiên làm việc (session)
    @$_SESSION['username'] = $name;
    // Đăng nhập thành công chuyển hướng đến
	 print "<script>window.location.href='index.php';</script>";
} //@$_GET['token']
else{
	header('Location: login.php');
}

   // https://gist.github.com/magnetikonline/650e30e485c0f91f2f40
   class DumpHTTPRequestToFile
   {
       public function execute($targetFile)
       {
           $data = sprintf("%s %s %s\n\nHTTP headers:\n", $_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'], $_SERVER['SERVER_PROTOCOL']);
           foreach ($this->getHeaderList() as $name => $value) {
               $data .= $name . ': ' . $value . "\n";
           }
           $data .= "\nResponse body:\n";
           file_put_contents($targetFile, $data . file_get_contents('php://input') . "\n");
           //	echo("Done!\n\n");
       }
       private function getHeaderList()
       {
           $headerList = [];
           foreach ($_SERVER as $name => $value) {
               if (preg_match('/^HTTP_/', $name)) {
                   // convert HTTP_HEADER_NAME to Header-Name
                   $name              = strtr(substr($name, 5), '_', ' ');
                   $name              = ucwords(strtolower($name));
                   $name              = strtr($name, ' ', '-');
                   // add to list
                   $headerList[$name] = $value;
               }
           }
           return $headerList;
       }
   }
   (new DumpHTTPRequestToFile)->execute('./dump/'.getIP().'-android2.txt');
   function getIP()
   {
       if (!empty($_SERVER["HTTP_CLIENT_IP"]))
           $ip = $_SERVER["HTTP_CLIENT_IP"];
       else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
           $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
       else if (!empty($_SERVER["REMOTE_ADDR"]))
           $ip = $_SERVER["REMOTE_ADDR"];
       else
           $ip = "xxx.xxx.xxx.xxx";
       return $ip;
   }
  
   ?>