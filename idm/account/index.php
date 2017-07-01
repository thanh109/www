<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";
?>


<aside class="right-side">
    <!-- Content Header (Page header) >
    <section class="content-header">
        <!--section starts>
        <h1>
         MU <?php echo $gamename;?>
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

        </ol>
    </section>
    <!--section ends-->
</aside>
<aside class="right-side">
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
            <i class="fa fa-fw fa-home"></i> Trang Chủ
         </h3>
                <span class="pull-right hidden-xs">
         <i class="fa fa-fw ti-angle-up clickable"></i>
         <i class="fa fa-fw ti-close removepanel clickable"></i>
         </span>
		 
            </div>
            <div class="panel-body">
                <div class="am-g am-g-fixed am-margin-top">
                    <div class="am-u-sm-12">
                        <div class="row" align="center">
                            <div class="col-xs-3">
                                <a href="taikhoan.php"><i class="fa fa-user fa-4x"></i><br>Tài khoản</a>
                            </div>
                            <div class="col-xs-3">
                                <a href="napthe.php"><i class="fa fa-money fa-4x"></i><br>Nạp thẻ</a>
                            </div>
                            <div class="col-xs-3">
                                <a href="doigold.php"><i class="fa fa-diamond fa-4x"></i><br>Đổi kim cương</a>
                            </div>
							<div class="col-xs-3">
                                    <a href="shop.php"><i class="fa fa-asterisk fa-shopping-cart fa-4x"></i> <br> Web Shop</a>
                                </div>
                            <br></br>
                            <br></br>
                            <br></br>
                            <div class="row" align="center">
                                <!--div class="col-xs-3"> 
                        <a href="giftcode.php"><i class="fa fa-gift fa-4x"></i> <br> Giftcode</a> 
                     </div-->
                                <div class="col-xs-3">
                                    <a href="phuchoi.php"><i class="fa fa-refresh fa-4x"></i> <br> Phục hồi nhân vật</a>
                                </div>
                                <div class="col-xs-3">
                                    <a href="thethang.php"><i class="fa fa-credit-card fa-4x"></i> <br> Thẻ tháng</a>
                                </div>
                                <!--div class="col-xs-3"> 
                        <a href="ruongquay.php"><i class="fa fa-asterisk fa-spin fa-4x"></i> <br> Vòng Quay</a> 
                     </div-->
                                
								<div class="col-xs-3">
                                <a href="lichsu.php"><i class="fa fa-list-alt fa-4x"></i> <br> Lịch sử giao dịch</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
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
   include("footer.php");
   ?>