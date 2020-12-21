<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>watchstyle</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

	<!-- all css here -->
	<!-- bootstrap v3.3.6 css -->
	<link rel="stylesheet" href="public/frontend/css/bootstrap.min.css">
	<!-- animate css -->
	<link rel="stylesheet" href="public/frontend/css/animate.css">
	<!-- meanmenu css -->
	<link rel="stylesheet" href="public/frontend/css/meanmenu.min.css">
	<!-- owl.carousel css -->
	<link rel="stylesheet" href="public/frontend/css/owl.carousel.css">
	<!-- font-awesome css -->
	<link rel="stylesheet" href="public/frontend/css/font-awesome.min.css">
	<!-- flexslider.css-->
	<link rel="stylesheet" href="public/frontend/css/flexslider.css">
	<!-- chosen.min.css-->
	<link rel="stylesheet" href="public/frontend/css/chosen.min.css">
	<!-- style css -->
	<link rel="stylesheet" href="public/frontend/style.css">
	<!-- responsive css -->
	<link rel="stylesheet" href="public/frontend/css/responsive.css">
	<!-- modernizr css -->
	<script src="public/frontend/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<!-- header-area-start -->
<header>
	<!-- header-top-area-start -->
	<div class="header-top-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="language-area">
						<ul>
							<li><img src="public/frontend/img/flag/1.jpg" alt="flag" /><a href="#">English<i class="fa fa-angle-down"></i></a>
								<div class="header-sub">
									<ul>
										<li><a href="#"><img src="public/frontend/img/flag/2.jpg" alt="flag" />france</a></li>
										<li><a href="#"><img src="public/frontend/img/flag/3.jpg" alt="flag" />croatia</a></li>
									</ul>
								</div>
							</li>
							
							<li><a href="#">USD $<i class="fa fa-angle-down"></i></a>
								<div class="header-sub dolor">
									<ul>
										<li><a href="#">EUR €</a></li>
										<li><a href="#">USD $</a></li>
									</ul>
								</div>
							</li>
							<li><a href="https://github.com/tamnguyen28/quanlydongho.git"> DOWNLOAD SOURCE GITHUB</a>
							<!-- <li><a href="#">Danh mục sản phẩm<i class="fa fa-angle-down"></i></a>
								<div class="header-sub" name="datadanhmuc">
									<ul>
										<?php
										include "includes/connection.php";
										$sql_groupproduct = mysqli_query($conn, "SELECT * FROM groupproduct WHERE groupproduct.ID_GroupProduct");
										while ($row = mysqli_fetch_assoc($sql_groupproduct)) {
										?>
											<li><a href="danhmuc.php"><?php echo $row['Name_GP'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</li> -->
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="account-area text-right">
						<ul>
							<li><a href="login.php">Sign in</a></li>
							<li><a href="dang-ky.php">Sign up</a></li>
							<li><a href="dangxuat.php">Log out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-top-area-end -->
	<!-- header-mid-area-start -->
	<div class="header-mid-area ptb-40">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
					<div class="header-search">
						<form action="timkiem.php" method="post" id="formtk">
							<input type="text" name="datatk" placeholder="Search entire store here..." />
							<a href="#" id="asubmit"><i class="fa fa-search"></i></a>
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
					<div class="logo-area text-center logo-xs-mrg">
						<a href="index.php"><img src="public/frontend/img/logo/logo1.png" alt="logo" /></a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="my-cart">
						<ul>
							<li><a href="#"><i class="fa fa-shopping-cart"></i>My Cart</a>
								<span>2+</span></span>
								<div class="mini-cart-sub">
									<div class="cart-product">
										<?php
										include "includes/connection.php";
										$result = mysqli_query($conn, "SELECT * FROM cart");
										$i = 0;
										$total = 0;
										while ($row = mysqli_fetch_assoc($result)) {
											$tongtien = $row['quantity'] * $row['price_product'];
											$total += $tongtien;
											$i++; ?>
											<div class="single-cart">
												<div class="cart-img">
													<a href="#"><img src="public/frontend/img/product/<?php echo $row['image_product']; ?>" alt="book" /></a>
												</div>
												<div class="cart-info">
													<h5><a href="#"><?php echo $row['name_product']; ?></a></h5>
													<p><?php echo $row['quantity'] ?> x <?php echo $row['price_product']; ?></p>
												</div>
												<div class="cart-icon">
													<a href="#"><i class="fa fa-remove"></i></a>
												</div>
											</div>
										<?php } ?>
									</div>
									<div class="cart-totals">
										<h5>Tổng tiền <span><?php echo number_format($total); ?></span></h5>
									</div>
									<div class="cart-bottom">
										<a class="view-cart" href="giohang.php">Giỏ hàng</a>
										<a href="donhang.php">Thanh toán</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-mid-area-end -->
	<!-- main-menu-area-start -->
	<div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="menu-area">
						<nav>
							<ul>
								<li class="active"><a href="index.php">Home<i class="fa fa-angle-down"></i></a></li>
								<li><a href="thuong-hieu.php">Thương hiệu<i class="fa fa-angle-down"></i></a></li>
								<li><a href="donghonam.php">Đồng hồ Nam<i class="fa fa-angle-down"></i></a></li>
								<li><a href="donghonu.php">Đồng hồ Nữ<i class="fa fa-angle-down"></i></a></li>
								<li><a href="blog.php">Tin tức<i class="fa fa-angle-down"></i></a></li>
								<li><a href="lienhe.php">Liên hệ<i class="fa fa-angle-down"></i></a></li>
								<li><a href="khuyenmai.php">Khuyến mãi<i class="fa fa-angle-down"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- header-area-end -->

<script>
	document.getElementById('asubmit').onclick = function() {
		document.getElementById('formtk').submit();
	}
</script>