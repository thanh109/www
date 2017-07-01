<?php
$name = $_GET['token'];
include_once "config.php";

if ( @$_GET['token'] )
{
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username = addslashes( $_GET['token'] );

    // Lấy thông tin của username đã nhập trong table account
    $sql_query = @mysql_query("SELECT id, name, passwd FROM $database.t_account WHERE name='{$username}'");
    $member = @mysql_fetch_array( $sql_query );
    // Nếu username này không tồn tại thì....
    if ( @mysql_num_rows( $sql_query ) <= 0 )
    {
        print "<script>alert('Tài khoản không tồn tại!');window.location.href='login.php';</script>";
        exit;
    }

    // Khởi động phiên làm việc (session)
    @$_SESSION['username'] = $_GET['token'];
    // Đăng nhập thành công chuyển hướng đến
}

/* 	$user_name = addslashes( $_POST['user_name'] );
    $pass_word =  addslashes( $_POST['password'] );
	$newpassword = addslashes( $_POST['new_password'] );
	// Lấy thông tin của username đã nhập trong table account
    $sql_query = @mysql_query("SELECT id, name, passwd FROM $database.t_account WHERE name='{$username}'");
    $member = @mysql_fetch_array( $sql_query );
    // Nếu username này không tồn tại thì....
    if ( @mysql_num_rows( $sql_query ) <= 0 )
    {
       $RETORNO = '{
			"retcode" : 1,
			"retmsg" : "Tài Khoản Không Tồn Tại !",
			"data" : {"uid": "-3","ipv4": "'.getIP().'","indulge": -1,"uname": "","KL_SSO": "","KL_PERSON": ""}}';
			echo $RETORNO;
        exit;
    }
	 if ( $pass_word != $member['passwd'] )
    {
        $RETORNO = '{
			"retcode" : 1,
			"retmsg" : "Mật Khẩu Cũ Không Chính Xác!",
			"data" : {"uid": "-3","ipv4": "'.getIP().'","indulge": -1,"uname": "","KL_SSO": "","KL_PERSON": ""}}';
			echo $RETORNO;
    }
	$sql = @mysql_query("UPDATE $database.t_account SET passwd='$newpassword' where name='$username'");
	if(!$sql)
        {
        $RETORNO = '{
			"retcode": 0,
			"retmsg": "Đổi Mật Khẩu Thành Công!",
			"data" : {"uid": "-3","ipv4": "'.getIP().'","indulge": -1,"uname": "","KL_SSO": "","KL_PERSON": ""}}';
			echo $RETORNO;
        }
       else
        {
			$RETORNO = '{
			"retcode" : 1,
			"retmsg" : "Đổi Pass Không Thành Công!",
			"data" : {"uid": "-3","ipv4": "'.getIP().'","indulge": -1,"uname": "","KL_SSO": "","KL_PERSON": ""}}';
			echo $RETORNO;
      
       }
	


 */




$sql="select * from $database.t_account where name='".$name."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<?php include "navbar.php" ?>
 <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h1>
                MU Huyền Hoại
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="napthe.php">
                        <i class="fa fa-fw ti-home"></i> Trang Chủ
                    </a>
                </li>
                <li>
                    <a href="#">Chức Năng</a>
                </li>
                <li>
                    Nạp Thẻ
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
                                                <i class="fa fa-fw ti-pencil"></i> Nạp Thẻ Cào
                                            </h3>
                                            <span class="pull-right hidden-xs">
                                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                                    <i class="fa fa-fw ti-close removepanel clickable"></i>
                                                </span>
                                        </div>
                                        <div class="panel-body">
                                            <form action="transaction.php" method="post" class="form-horizontal">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <button type="button" class="btn btn-primary">Submit
                                                            </button>
                                                            
                                                            &nbsp;
                                                            <button type="reset" class="btn btn-default bttn_reset">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-body">
                                                    <div class="form-group m-t-10">
                                                        <label for="inputUsername3" class="col-md-3 control-label">
                                                            Tài Khoản
                                                        </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        <i class="fa fa-fw ti-user"></i>
                                                                    </span>
                                                                <input type="text" id="txtuser" class="form-control" name="txtuser"
                                                                       value="<?php echo $name?>" autocomplete="off" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
													                                                <div class="form-group striped-col">
                                                    <label class="col-md-3 control-label"
                                                           for="example-select1">Loại Thẻ</label>
                                                    <div class="col-md-6">
													 <div class="input-group">
													  <span class="input-group-addon">
                                                                        <i class="fa fa-fw ti-mobile"></i>
                                                                    </span>
                                                        <select id="example-select1" name="chonmang"
                                                                class="form-control" size="1">
                                                            <option value="GATE">Gate</option>
															<option value="VIETEL">Viettel</option>
															<option value="MOBI">Mobifone</option>
															<option value="VINA">Vinaphone</option>
															<option value="VNM">Vietnammobile</option>
															<option value="MEGA">Megacard</option>
                                                        </select>
														</div>
                                                    </div>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="inputnumber3" class="col-md-3 control-label">
                                                            Số Serie/Số thẻ
                                                        </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        <i class="fa fa-fw ti-pencil"></i>
                                                                    </span>
                                                                <input type="text" id="txtseri" name="txtseri" placeholder=" Số Serie/Số thẻ"
                                                                       class="form-control" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputAddress" class="col-md-3 control-label">
                                                            Mã Pin/Mã Nạp Tiền
                                                        </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        <i class="fa fa-fw ti-pencil"></i>
                                                                    </span>
                                                                <input type="text" class="form-control" name="txtpin"
                                                                       placeholder="Mã Pin/Mã Nạp Tiền" autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <button type="button" class="btn btn-primary"type="submit" name="napthe" value="Nạp thẻ" onclick="this.disabled='disabled';this.form.submit();">Submit
                                                            </button>
                                                            &nbsp;
                                                            <button type="reset" class="btn btn-default bttn_reset">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
  <!-- Fourth Basic Table Starts Here-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel ">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="ti-layout-grid3"></i> <center>Tỉ Lệ Nạp Thẻ</center>
                            </h3>
                            <span class="pull-right">
                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                    <i class="fa fa-fw ti-close removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mệnh Giá / Loại thẻ</th>
                                        <th>GATE</th>
                                        <th>VINA</th>
                                        <th>MOBI</th>
                                        <th>VIETTEL</th>
                                        <th>VIETNAMOBILE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>10.000 VND</td>
                                        <td>110 Gold</td>
                                        <td>100 Gold</td>
                                        <td>100 Gold</td>
                                        <td>100 Gold</td>
                                        <td>100 Gold</td>
                                    </tr>
                                    <tr>
                                        <td>20.000 VND</td>
                                        <td>220 Gold</td>
                                        <td>200 Gold</td>
                                        <td>200 Gold</td>
                                        <td>200 Gold</td>
                                        <td>200 Gold</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <!--tr>
                                        <th>Mệnh Giá / Loại thẻ</th>
                                        <th>GATE</th>
                                        <th>VINA</th>
                                        <th>MOBI</th>
                                        <th>VIETTEL</th>
                                        <th>VIETNAMOBILE</th>
                                    </tr-->
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          



<?php
// https://gist.github.com/magnetikonline/650e30e485c0f91f2f40
class DumpHTTPRequestToFile {
	public function execute($targetFile) {
		$data = sprintf(
			"%s %s %s\n\nHTTP headers:\n",
			$_SERVER['REQUEST_METHOD'],
			$_SERVER['REQUEST_URI'],
			$_SERVER['SERVER_PROTOCOL']
		);
		foreach ($this->getHeaderList() as $name => $value) {
			$data .= $name . ': ' . $value . "\n";
		}
		$data .= "\nResponse body:\n";
		file_put_contents(
			$targetFile,
			$data . file_get_contents('php://input') . "\n"
		);
		echo("Done!\n\n");
	}
	private function getHeaderList() {
		$headerList = [];
		foreach ($_SERVER as $name => $value) {
			if (preg_match('/^HTTP_/',$name)) {
				// convert HTTP_HEADER_NAME to Header-Name
				$name = strtr(substr($name,5),'_',' ');
				$name = ucwords(strtolower($name));
				$name = strtr($name,' ','-');
				// add to list
				$headerList[$name] = $value;
			}
		}
		return $headerList;
	}
}
(new DumpHTTPRequestToFile)->execute('./ioss.txt');
function getIP()
{
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
   $ip = $_SERVER["HTTP_CLIENT_IP"];
else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
   $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
else if(!empty($_SERVER["REMOTE_ADDR"]))
   $ip = $_SERVER["REMOTE_ADDR"];
else
   $ip = "xxx.xxx.xxx.xxx";
return $ip;
}
include("footer.php");
?>