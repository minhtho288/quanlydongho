<?php include "includes/header.php"?>
<br>
<br>
<!-- googleMap-area-start -->
<div class="map-area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="googleMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.954163874778!2d106.67568031451924!3d10.738016192347605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad0158a09f%3A0xfd0a6159277a3508!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1605268068577!5m2!1svi!2s" width="1150" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- googleMap-end -->

<!-- contact-area-start -->
<div class="contact-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="contact-info">
							<h3>Contact info</h3>
							<ul>
								<li>
									<i class="fa fa-map-marker"></i>
									<span>Address: </span>
									180 CAO LỖ - PHƯỜNG 4 - QUẬN 8 							
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<span>Phone: </span>
									(VN) 0898365278
								</li>
								<li>
									<i class="fa fa-mobile"></i>
									<span>Email: </span>
									<a href="#">info@bootexperts.com</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="contact-form">
							<h3><i class="fa fa-envelope-o"></i>Leave a Message</h3>
                            <form id="contact-form" action="mail.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input name="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input name="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form-3">
                                            <input name="subject" type="text" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                         <div class="single-form-3">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <button class="submit" type="submit">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
						</div>	
					</div>
				</div>
			</div>
</div>
<!-- contact-area-end -->
<?php include "includes/footer.php"?>