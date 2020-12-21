<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="public/backend/css/bootstrap.min.css" >
<link rel="stylesheet" href="public/backend/css/bootstrap.css" type="text/css" media="all" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="public/backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="public/backend/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="public/backend/css/font.css" type="text/css"/>
<link href="public/backend/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="public/backend/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="public/backend/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="public/backend/js/jquery2.0.3.min.js"></script>
<script src="public/backend/js/raphael-min.js"></script>
<script src="public/backend/js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="admin-dashboard.php" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> --> 
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <!-- <img alt="" src="images/2.png"> -->
                <span class="username">My Account</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="admin-dangxuat.php"><i class="fa fa-key"></i> Log Out</a></li>
                <?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" >
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin-dangxuat.php">Đăng xuất</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="admin-sanpham.php">Sản phẩm</a></li>
                        <!-- <li><a href="admin-danhmucsp.php">Danh mục sản phẩm</a></li> -->
                        <!-- <li><a href="admin-thuonghieu.php">Thương hiệu</a></li> -->
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="admin-xulydonhang.php">Đơn hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý khách hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="admin-xulykhachhang.php">Danh sách khách hàng</a></li>
						
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->