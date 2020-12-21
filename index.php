<?php include "includes/connection.php";?>
<?php
if(isset($_POST['addtocart'])){
	$tensanpham = $_POST['tensanpham'];
	$sanpham_id = $_POST['sanpham_id'];
	$gia = $_POST['giasanpham'];
	$hinhanh = $_POST['hinhanh'];
	$soluong = $_POST['soluong'];
    $sql_select_giohang = mysqli_query($conn, "SELECT * FROM cart WHERE id_product = '$sanpham_id'");
    $sql_giohang = "";
	$count = mysqli_num_rows($sql_select_giohang);
	if($count > 0){
		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
        $soluong = $row_sanpham['quantity'] + 1;
        $tongtiendb = $soluong * $gia;
		$sql_giohang = "UPDATE cart SET quantity = '$soluong', Total_amount = '$tongtiendb' WHERE id_product = '$sanpham_id'";
	}else{
        $soluong = $soluong;
        $tongtiendb = $soluong * $gia;
		$sql_giohang = "INSERT INTO cart (name_product, id_product, price_product, image_product, quantity, Total_amount) 
		VALUES ('$tensanpham', '$sanpham_id', '$gia', '$hinhanh', '$soluong', '$tongtiendb')";
	}
	$insert_row = mysqli_query($conn, $sql_giohang);
	if($insert_row == 0){
		header('Location:product-details.php?idproduct=' . $sanpham_id);
	}else{
		header('Location: giohang.php');
	}
}?>
<?php include "includes/header.php" ?>
<!doctype html>
<html class="no-js" lang="en">

<body>
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider pt-125 pb-130 bg-img" style="background-image:url(public/frontend/img/6.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="slider-content slider-animated-1 text-center">
                                <h1>Huge Sale</h1>
                                <h2>Fulltime</h2>
                                <h3>Now starting at £99.00</h3>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" style="background-image:url(public/frontend/img/5.jpg);">
                <div class="container">
                    <div class="slider-content slider-content-2 slider-animated-1">
                        <h1>We can help get your</h1>
                        <h2>Watches in Order</h2>
                        <a href="#">Contact Us Today!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- product-area-start -->
    <div class="product-area pt-95 xs-mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Best selling model</h2>
                        <p>Browse the collection of our best selling and top interresting products.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-40 text-center">
                        <ul>
                            <li class="active"><a href="#Audiobooks" data-toggle="tab">New Arrival </a></li>
                            <li><a href="#books" data-toggle="tab">Deal hot</a></li>
                            <li><a href="#bussiness" data-toggle="tab">Featured Products</a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <?php include "BESTNEW.php" ?>
                
                <?php include "BESTDEAL.php"?>

                <?php include "BESTFEATURED.php"?>
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->
    <!-- banner-area-start -->
    <div class="banner-area-5 mtb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img-2">
                        <a href="#"><img src="public/frontend/img/banner/xe3.jpg" alt="banner" /></a>
                        <div class="banner-text">
                            <h3>G. Meyer Books & Spiritual Traveler Press</h3>
                            <h2>Sale up to 30% off</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- bestseller-area-start -->
    <?php include "DREW.php" ?>
    <!-- bestseller-area-end -->
    <?php include "FEATURED.php" ?>

    <!-- recent-post-area-start -->
    <?php include "LATER.php" ?>
    <!-- recent-post-area-end -->
</body>
</html>
<?php include "includes/footer.php" ?>