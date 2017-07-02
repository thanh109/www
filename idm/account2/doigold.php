<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include "navbar.php";


?>


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
                    Đổi Gold
                </li>
            </ol>
        </section>
        <!--section ends-->
        </aside>
		 <aside class="right-side">
<div class="row">
<div class="col-lg-12 col-xs-12">
        <table>	
				<!--form action="recharge.php?act=50gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">50 Vàng<br>75.000 Kim Cương</button>
		</form>
		<form action="recharge.php?act=100gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">100 Vàng<br>150.000 Kim Cương</button>
		</form>
		<form action="recharge.php?act=200gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">200 Vàng<br>300.000 Kim Cương</button>
		</form>
		<form action="recharge.php?act=400gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">400 Vàng<br>600.000 Kim Cương</button>
		</form>
		
		<form action="recharge.php?act=700gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">700 Vàng<br>1.050.000 Kim Cương</button>
		</form>
		<form action="recharge.php?act=1000gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">1000 Vàng<br>1.500.000 Kim Cương</button>
		</form-->
		<form action="recharge.php?act=5000gold&username=<?php echo $_SESSION['username'];?>" method="post">
		<button style="width:200px;height:80px;margin:5px" type="submit" class="btn btn-lg btn-primary">5000 Vàng<br>7.500.000 Kim Cương</button>
		</form>
        </table>
</div>
</div>

<?php include("footer.php");?>

