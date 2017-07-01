<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MU <?php echo $gamename;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" href="css/app.css" rel="stylesheet"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="vendors/swiper/css/swiper.min.css">
    <link href="vendors/ihover/css/ihover.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/animate/animate.min.css">
	<link href="css/datatable.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/custom_css/widgets.css">
	<link rel="stylesheet" type="text/css" href="vendors/sweetalert2/css/sweetalert2.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom_css/sweet_alert2.css">
    <link href="vendors/hover/css/hover-min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendors/laddabootstrap/css/ladda-themeless.min.css">
    <link href="css/buttons_sass.css" rel="stylesheet">
    <link href="css/advbuttons.css" rel="stylesheet">
	<link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/passtrength/passtrength.css">
	<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css">
    <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom_css/datatables_custom.css">
    <link rel="stylesheet" href="css/custom_css/form2.css"/>
    <link rel="stylesheet" href="css/custom_css/form3.css"/>
	<link href="vendors/iCheck/css/all.css" rel="stylesheet"/>
    <link href="vendors/toastr/css/toastr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="vendors/iCheck/css/minimal/blue.css">
    <link rel="stylesheet" type="text/css" href="css/custom_css/toastr_notificatons.css">



    <!--end of page level css-->
</head>
<body class="skin-default" >
<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>

	<script>
	    $('.success_alert').on('load', function (e) {
        e.preventDefault();
        swal({
            title: "thành công",
            text: "Bạn đã thanh toán thành công \nthẻ $ten\n mệnh giá: $amount",
            type: "success",
            confirmButtonColor: "#66cc99"
        });
    });

	
	</script>
	
<div class="panel-body success_alert text-center">
                                            <h5> Success Alert <i class="fa fa-check-circle-o"></i></h5>
                                        </div>
	<!-- global js -->
<script src="js/app.js" type="text/javascript"></script>
<!-- end of global js-->
<!-- page level js-->
<script src="js/custom_js/form_layouts.js" type="text/javascript"></script>
<script type="text/javascript" src="vendors/Buttons/js/buttons.js"></script>
<script type="text/javascript" src="vendors/laddabootstrap/js/spin.min.js"></script>
<script type="text/javascript" src="vendors/laddabootstrap/js/ladda.min.js"></script>
<script type="text/javascript" src="js/custom_js/button_main.js"></script>
<script type="text/javascript" src="vendors/countUp.js/js/countUp.js"></script-->
<script type="text/javascript" src="vendors/sweetalert2/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="js/custom_js/sweetalert.js"></script>
<!--Sparkline Chart-->
<script type="text/javascript" src="vendors/jquery-knob/js/jquery.knob.js"></script>
<!-- Swiper --->
<script src="vendors/swiper/js/swiper.min.js" type="text/javascript"></script>
<!-- sparkline chart-->
<script src="js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- wow plugin -->
<script type="text/javascript" src="vendors/wow/js/wow.min.js"></script>
<script type="text/javascript" src="js/custom_js/widgets.js"></script>
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/custom_js/datatables_custom.js"></script>
<script src="js/passtrength/passtrength.js"></script>
<script type="text/javascript" src="js/custom_js/form2.js"></script>
<script type="text/javascript" src="js/custom_js/form3.js"></script>
<script type="text/javascript" src="js/custom_js/form_validations.js"></script>
<script type="text/javascript" src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>
<script type="text/javascript" src="vendors/card/jquery.card.js"></script>
<script type="text/javascript" src="vendors/iCheck/js/icheck.js"></script>
<script src="vendors/toastr/js/toastr.min.js"></script>
<script type="text/javascript" src="js/custom_js/toastr_notifications.js"></script>
<!-- end of page level js -->
</body>
