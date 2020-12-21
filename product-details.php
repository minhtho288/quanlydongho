<?php include "includes/connection.php";
if (isset($_GET['idproduct'])) {
	$id = $_GET['idproduct'];
} else
	$id = '';
$sql_chitiet = mysqli_query($conn, "SELECT * from product WHERE product.ID = '$id'");
$row_chitiet = mysqli_fetch_assoc($sql_chitiet);
?>
<?php
if (isset($_POST['themgiohang'])) {
	$tensanpham = $_POST['tensanpham'];
	$sanpham_id = $_POST['sanpham_id'];
	$gia = $_POST['giasanpham'];
	$hinhanh = $_POST['hinhanh'];
	$soluong = $_POST['soluong'];
	$sql_select_giohang = mysqli_query($conn, "SELECT * FROM cart WHERE id_product = '$sanpham_id'");
	$count = mysqli_num_rows($sql_select_giohang);
	$tongtiendb = 0;
	$sql_giohang = "";
	if ($count > 0) {
		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
		$soluong = $row_sanpham['quantity'] + 1;
		$tongtiendb = $soluong * $gia;
		$sql_giohang = "UPDATE cart SET quantity = '$soluong', Total_amount = '$tongtiendb' WHERE id_product = '$sanpham_id'";
	} else {
		$soluong = $soluong;
		$tongtiendb = $soluong * $gia;
		$sql_giohang = "INSERT INTO cart (name_product, id_product, price_product, image_product, quantity, Total_amount) 
		VALUES ('$tensanpham', '$sanpham_id', '$gia', '$hinhanh', '$soluong', '$tongtiendb')";
	}
	$insert_row = mysqli_query($conn, $sql_giohang);
	if ($insert_row == 0) {
		header('Location:product-details.php?idproduct=' . $sanpham_id);
	} 
	else {
		header('Location: giohang.php');
	}
}
?>
<?php include "includes/header.php" ?>
<!-- product-main-area-start -->
<div class="product-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<!-- product-main-area-start -->
				<div class="product-main-area">
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="public/frontend/img/product/<?php echo $row_chitiet['Image']; ?>">
										<img src="public/frontend/img/product/<?php echo $row_chitiet['Image']; ?>" alt="woman" />
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
							<div class="product-info-main">
								<div class="page-title">
									<h1><?php echo $row_chitiet['Name']; ?></h1>
								</div>
								<div class="product-info-stock-sku">
									<span>In stock</span>
									<div class="product-attribute">
										<span>SKU</span>
										<span class="value">24-WB05</span>
									</div>
								</div>
								<div class="product-reviews-summary">
									<div class="rating-summary">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="reviews-actions">
										<a href="#">3 Reviews</a>
										<a href="#" class="view">Add Your Review</a>
									</div>
								</div>
								<div class="product-info-price">
									<div class="price-final">
										<span><?php echo number_format($row_chitiet['Price']) . 'vnd' ?></span>
										<span class="old-price">$40.00</span>
									</div>
								</div>
								<div class="product-add-form">
									<form action="product-details.php" method="post">
										<fieldset>
											<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['Name'] ?>" />
											<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['ID'] ?>" />
											<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['Price'] ?>" />
											<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['Image'] ?>" />
											<input type="hidden" name="soluong" value="1" />
											<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
										</fieldset>
									</form>
								</div>
								<div class="product-social-links">
									<div class="product-addto-links">
										<a href="#"><i class="fa fa-heart"></i></a>
										<a href="#"><i class="fa fa-pie-chart"></i></a>
										<a href="#"><i class="fa fa-envelope-o"></i></a>
									</div>
									<div class="product-addto-links-text">
										<p>Powerwalking to the gym or strolling to the local coffeehouse, the Savvy Shoulder Tote lets you stash your essentials in sporty style! A top-loading compartment provides quick and easy access to larger items, while zippered pockets on the front and side hold cash, credit cards and phone.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- product-main-area-end -->
				<!-- new-book-area-start -->
				<div class="new-book-area mt-60">
					<div class="section-title text-center mb-30">
						<h3>OTHER PRODUCTS</h3>
					</div>
					<div class="tab-active-2 owl-carousel">
						<?php
						$result = mysqli_query($conn, "SELECT * FROM product limit 72, 4");
						$row = mysqli_fetch_array($result);
						foreach ($result as $row) { ?>
							<!-- single-product-start -->
							<div class="product-wrapper">
								<div class="product-img">
									<a href="product-details.php?idproduct=<?php echo $row['ID'] ?>">
										<img src="public/frontend/img/khuyenmai/<?php echo $row['Image']; ?>" alt="book" class="primary" />
									</a>
									<div class="quick-view">
										<a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
											<i class="fa fa-search-plus"></i>
										</a>
									</div>
									<div class="product-flag">
										<ul>
											<li><span class="sale">new</span></li>
											<li><span class="discount-percentage">-5%</span></li>
										</ul>
									</div>
								</div>
								<div class="product-details text-center">
									<div class="product-rating">
										<ul>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
									<h4><a href="#"><?php echo $row['Name']; ?></a></h4>
									<div class="product-price">
										<ul>
											<li><?php echo $row['Price']; ?></li>
										</ul>
									</div>
								</div>
								<div class="product-link">
									<div class="product-button">
										<a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
									</div>
									<div class="add-to-link">
										<ul>
											<li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
						<!-- single-product-end -->
					</div>
				</div>
				<!-- new-book-area-start -->
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="shop-left">
					<div class="left-title mb-20">
						<h4>Related Products</h4>
					</div>
					<div class="random-area mb-30">
						<?php include "SIEUSALE.php" ?>
					</div>
					<div class="banner-area mb-30">
						<div class="banner-img-2">
							<a href="#"><img src="public/frontend/img/donghonu/1.jpg" alt="banner" /></a>
						</div>
					</div>
					<div class="left-title-2 mb-30">
						<h2>Compare Products</h2>
						<p>You have no items to compare.</p>
					</div>
					<div class="left-title-2">
						<h2>My Wish List</h2>
						<p>You have no items in your wish list.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- product-main-area-end -->
<?php include "includes/footer.php" ?>