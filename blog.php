<?php include "includes/header.php" ?>
<br>
<br>
<!-- about-main-area-start -->
<div class="about-main-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
				<div class="about-img">
					<a href="#"><img src="public/frontend/img/tintuc/1.jpg" alt="man" /></a>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				<div class="about-content">
					<h3>Why<span>We are?</span></h3>
					<p>Ngày nay, chọn một chiếc đồng hồ hoàn hảo cho phụ nữ sẽ giúp bạn hoàn thiện trang phục của mình và phản ánh rằng bạn có gu thời trang hay phong cách tuyệt vời. Có hàng trăm loại đồng hồ để bạn lựa chọn và có thể khá khó khăn để chọn chúng nên đeo trong những dịp và bữa tiệc nào.</p>
					<p>Ngày nay, có rất nhiều kiểu dáng đồng hồ trên mạng. Đồng hồ của họ thường sẽ đắt hơn. Để mua những chiếc đồng hồ thời trang này, hầu hết phụ nữ chọn phương án tốt nhất và đó là mua sắm trực tuyến. Bạn có thể tìm thấy có rất nhiều bộ sưu tập đồng hồ dành cho phụ nữ. Phụ nữ hãy thử một chiếc đồng hồ sang trọng có kiểu dáng rất đơn giản nhưng truyền thống.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- about-main-area-end -->

<!-- our-mission-area-start -->
<div class="our-mission-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="single-misson">
					<h3>Why<span>We do?</span></h3>
					<p>Đối với những phụ nữ yêu thích xu hướng về phong cách táo bạo, những chiếc đồng hồ thời trang và phong cách là lựa chọn tốt cho họ. Những chiếc đồng hồ này có thể có vỏ và mặt có hình dạng độc đáo cũng như nhiều màu sắc đang thịnh hành.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="single-misson">
					<h3>Our<span>Mission</span></h3>
					<p>Nếu bạn quyết định mua đồng hồ nữ thì trước khi mua đồng hồ, hãy nghĩ xem bạn sẽ đeo đồng hồ ở đâu và bạn sẽ kết hợp với trang phục nào. Và điều thứ hai, bạn chọn đúng trang web trực tuyến để mua được những chiếc đồng hồ nữ đẹp chất lượng và sành điệu.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="single-misson mrg-none-xs">
					<h3>Our<span>Vision</span></h3>
					<p>Bạn có thể chọn trang web trực tuyến tốt nhất fulltime, nơi cung cấp đồng hồ thời trang và thiết kế cho phụ nữ với giá cả hợp lý . Tại đây bạn có thể tìm thấy những chiếc đồng hồ sang trọng với đủ kiểu dáng và nhiều thương hiệu.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- our-mission-area-end -->
<!-- counter-area-start -->
<div class="counter-area ptb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="single-counter text-center">
					<h2 class="counter">99</h2>
					<span>Dự án đã hoàn thành</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="single-counter text-center">
					<h2 class="counter">180</h2>
					<span>Khách hàng hài lòng</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="single-counter text-center">
					<h2 class="counter">500</h2>
					<span>Sản phẩm bán chạy</span>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
				<div class="single-counter text-center mrg-none-sm mrg-none-xs">
					<h2 class="counter">320</h2>
					<span>Sản phẩm mới</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- counter-area-end -->
<!-- team-area-start -->
<div class="team-area ptb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="team-title text-center mb-50">
					<h2>Sản phẩm thu hút giới trẻ</h2>
				</div>
			</div>
			<?php include "includes/connection.php";
			$result = mysqli_query($conn, "SELECT * FROM product limit 78, 4");
			while ($row = mysqli_fetch_assoc($result)) { ?>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<div class="single-team">
						<div class="team-img-area">
							<div class="team-img">
								<a href="product-details.php?idproduct=<?php echo $row['ID'] ?>"><img src="public/frontend/img/tintuc/<?php echo $row['Image']; ?>" alt="man" /></a>
							</div>
							<div class="team-link">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="team-content text-center">
							<h3><?php echo $row['Name']; ?></h3>
							<span>Class Master</span>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- team-area-end -->
<!-- skill-area-start -->
<div class="skill-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="skill-content">
					<h3>Tuyệt tác tinh hoa</h3>
					<p>Nếu như phụ nữ làm đẹp cần phải lỉnh kỉnh đủ thứ phụ kiện, trang sức, mỹ phẩm thì đàn ông chỉ cần một chiếc đồng hồ đeo tay là đủ.
						Với dân sành đồng hồ, đặc biệt là phái nam, họ coi những chiếc đồng hồ đeo tay không chỉ là một công cụ xem giờ thông thường mà còn là những món trang sức cao cấp, bao hàm nghệ thuật cơ khí bậc thầy, sự tỉ mỉ, niềm đam mê và sức sáng tạo kì khôi ẩn chứa trong những cỗ máy bé nhỏ.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="skill-progress">
					<div class="progress">
						<div class="skill-title">Chiến lược 79%</div>
						<div class="progress-bar wow fadeInLeft" data-wow-delay="0.2s" role="progressbar" style="width: 79%;">
						</div>
					</div>
					<div class="progress">
						<div class="skill-title">Tiếp thị 96%</div>
						<div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar" style="width: 96%;">
						</div>
					</div>
					<div class="progress">
						<div class="skill-title">Quan tâm 65%</div>
						<div class="progress-bar wow fadeInLeft" data-wow-delay="0.4s" role="progressbar" style="width: 65%;">
						</div>
					</div>
					<div class="progress mrg-none-xs">
						<div class="skill-title">THIẾT KẾ UI/UX 92%</div>
						<div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar" style="width: 89%;">
						</div>
					</div>
				</div>
				<a href="#">
					<img src="public/frontend/img/tintuc/7.jpg" alt="book" class="primary" />
				</a>
			</div>
		</div>
	</div>
</div>
<!-- skill-area-end -->
<?php include "includes/footer.php" ?>