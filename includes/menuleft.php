<!-- blog-main-area-start -->
<div class="blog-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding-left: 0px;">
						<div class="single-blog mb-50">
							<div class="blog-left-title">
								<h3>Search</h3>
							</div>
							<div class="side-form">
								<form action="#">
									<input type="text" placeholder="Search...." />
									<a href="#"><i class="fa fa-search"></i></a>
								</form>
							</div>
						</div>
						<div class="single-blog mb-50">
							<div class="blog-left-title">
								<h3>Thương hiệu</h3>
							</div>
							<div class="blog-side-menu">
								<ul>
									<li><a href="#">OP Olym Pianus</a></li>
									<li><a href="#">Orient</a></li>
									<li><a href="#">Bentley</a></li>
									<li><a href="#">Ogival</a></li>
									<li><a href="#">Citizen</a></li>
									<li><a href="#">Freelook</a></li>
									<li><a href="#">SRwatch</a></li>
									<li><a href="#">Elixa</a></li>
									<li><a href="#">Festina</a></li>
									<li><a href="#">Bulova</a></li>
								</ul>
							</div>
						</div>
						<div class="single-blog mb-50">
							<div class="blog-left-title">
								<h3>Loại dây</h3>
							</div>
							<div class="blog-side-menu">
								<ul>
									<li><a href="#">Thép Không Gỉ</a></li>
									<li><a href="#">Dây Da</a></li>
									<li><a href="#">Dây Cao Su</a></li>
									<li><a href="#">Titanium</a></li>
									<li><a href="#">Dây nhựa</a></li>
								</ul>
							</div>
						</div>
						<div class="single-blog mb-50">
							<div class="blog-left-title">
								<h3>Xuất xứ</h3>
							</div>
							<div class="blog-side-menu">
								<ul>
									<li><a href="#">Nhật Bản</a></li>
									<li><a href="#">Thụy Sỹ</a></li>
									<li><a href="#">Hoa Kỳ</a></li>
									<li><a href="#">Đức</a></li>
									<li><a href="#">Pháp</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
<!-- blog-main-area-end -->
<div class="blog-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding-left: 0px;">
				<div class="left-title mb-20">
					<h4>Random</h4>
				</div>

				<?php include "includes/connection.php";
                        $result = mysqli_query($conn, "SELECT * FROM product limit 59, 3");

                        $row = mysqli_fetch_assoc($result);
                           foreach($result as $row)  
                        {
                            ?>
					<div class="single-most-product bd mb-18">
						<div class="most-product-img">
							<a href="#"><img src="public/frontend/img/random/<?php echo $row['Image'] ?>" alt="book" /></a>
						</div>
						<div class="most-product-content">
							<div class="product-rating">
								<ul>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
								</ul>
							</div>
							<h4><a href="#"><?php echo $row['Name'] ?></a></h4>
							<div class="product-price">
								<ul>
									<li>$30.00</li>
									<li class="old-price"><?php echo $row['Price'] ?></li>
								</ul>
							</div>
						</div>
					</div>	
					<?php } ?>
			</div>
		</div>
	</div>
</div>