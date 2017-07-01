<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";
?>
<a class="navbar-brand" href="javascript: history.back(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
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
                                            <form action="http://napthe.munongdan.pro/transaction.php" method="post" class="form-horizontal" id="form-validation">
                                                    <div class="row marginTop">
                                                        <div class="col-xs-6 col-md-6">
                                                            <input type="submit" id="btncheck" value="Xác Nhận"
                                                                   class="btn btn-primary btn-block btn-md btn-responsive"
                                                                   tabindex="7">
                                                        </div>
                                                        <div class="col-xs-6 col-md-6">
                                                            <input type="reset" value="Nhập Lại"
                                                               class="btn btn-success btn-block btn-md btn-responsive">
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <input type="hidden" id="txtuser" class="form-control" name="txtuser"
                                                                       value="<?php
echo $_SESSION['username'];
?>">
													<div class="form-group">
                                                    <label for="inputnumber3" class="col-md-3 control-label">
                                                            Loại Thẻ
                                                        </label>
                                                    <div class="col-md-6">
													 <div class="am-form-group">
                               
                                <div class="am-u-sm-8">
                                    <div data-toggle="buttons">
                                        <label class="btn btn-default" style="margin-top: 5px;">
                                            <input type="radio" id="chonmang" name="chonmang" value="VIETTEL"> <img src="img/icon/viettel.png" width="105px" height="50px" class="custom_radio"/>
                                        </label>
                                        <label class="btn btn-default" style="margin-top: 5px;">
                                            <input type="radio" id="chonmang" name="chonmang" value="VINA"> <img src="img/icon/vinaphone.png" width="105px" height="50px" class="custom_radio"/>
                                        </label>
                                        <label class="btn btn-default" style="margin-top: 5px;">
                                            <input type="radio" id="chonmang" name="chonmang" value="MOBI"> <img src="img/icon/mobifone.png" width="105px" height="50px" class="custom_radio"/>
                                        </label>
                                        <label class="btn btn-default" style="margin-top: 5px;">
                                            <input type="radio" id="chonmang" name="chonmang" value="GATE"> <img src="img/icon/gate.png" width="105px" height="50px" class="custom_radio"/>
                                        </label>
                                        <label class="btn btn-default" style="margin-top: 5px;">
                                            <input type="radio" id="chonmang" name="chonmang" value="VNM"> <img src="img/icon/vietnamobile.png" width="105px" height="50px" class="custom_radio"/>
                                        </label>
                                        <label class="btn btn-default" style="margin-top: 5px;">
                                            <input type="radio" id="chonmang" name="chonmang" value="VTC"> <img src="img/icon/vcoin-vtc.png" width="105px" height="50px" class="custom_radio"/>
                                        </label>
                                    </div>
                                </div>
                            </div>

                                                    </div>
                                                </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="txtPhone">
                                                            Số Serie/Số thẻ
															 <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        <i class="fa fa-fw ti-pencil"></i>
                                                                    </span>
                                                                <input type="text" id="txtPhone" required name="txtseri" placeholder=" Số Serie/Số thẻ"
                                                                       class="form-control input-md">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label" for="txtPhone">
                                                            Mã Pin/Mã Nạp Tiền
															 <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                        <i class="fa fa-fw ti-pencil"></i>
                                                                    </span>
                                                                <input type="text" class="form-control input-md" required id="txtPhone" name="txtpin"
                                                                       placeholder="Mã Pin/Mã Nạp Tiền">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                    <div class="row marginTop">
                                                        <div class="col-xs-6 col-md-6">
                                                            <input type="submit" id="btncheck" value="Xác Nhận"
                                                                   class="btn btn-primary btn-block btn-md btn-responsive"
                                                                   tabindex="7">
                                                        </div>
                                                        <div class="col-xs-6 col-md-6">
                                                            <input type="reset" value="Nhập Lại"
                                                               class="btn btn-success btn-block btn-md btn-responsive">
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



<?php
include("footer.php");
?>