<?php require_once("includes/connection.php");?>
<?php
	if(isset($_POST["btn_submit"])){
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$password = $_POST["password"];
		$name = $_POST["name"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if($username == "" || $email == "" || $phone == "" || $address == "" || $password =="" || $name == ""){
			echo '<script language="javascript">';
     		echo 'alert("Bạn vui lòng nhập đầy đủ thông tin")';
     		echo '</script>';
		}else{		
			$sql = "INSERT INTO customers(Name, Address, Phone, Email,  UserName,  Password, Createdate) VALUES ('$name','$address', '$phone', '$email','$username',  '$password', now()) ";
			mysqli_query($conn,$sql);
			header('Location: index.php');
			echo '<script language="javascript">';
     		echo 'alert("Chúc mừng bạn đăng ký thành công")';
     		echo '</script>';
		}
	}
?>
<?php include "includes/header.php"?>
	<br>
	<!-- user-login-area-start -->
		<div class="user-login-area mb-70">
			<div class="container">
				<form action="dang-ky.php" method="post" >
				<div class="row" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="col-lg-12">
						<div class="login-title text-center mb-30">
							<h2>Sign Up</h2>
						</div>
					</div>
					<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
						<div class="billing-fields">
							<div class="row">
								<div class="col-xs-12">
									<div  class="single-register">
											<p>Username<span>*</span></p>
											<input class="register-signup-infor" type="text" id="username" name="username"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="single-register">
											<p>Email Address<span>*</span></p>
											<input class = "register-emailaddress-phone" type="email" id="email" name="email"/>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="single-register">
											<p>Phone<span>*</span></p>
											<input class = "register-emailaddress-phone"  type="text" id="phone" name="phone"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="single-register">
											<p>Fullname<span>*</span></p>
											<input class="register-signup-infor" type="text" id="name" name="name"/>
									</div>
								</div>
							</div>
							<div class="single-register">
									<p>Address<span>*</span></p>
									<input class="register-signup-infor" type="text" id="address" name="address" placeholder="Street address"/>
							</div>
							<div class="single-register">
								
									<p>Password<span>*</span></p>
									<input class="register-signup-infor" type="password" id="password" name="password" placeholder="Password"/>
								
							</div>
							<div class="single-register" align ="center">
									<input type="submit" name="btn_submit" value="Register">
							</div>
						</div>
					</div>
				</div>
</form>
			</div>
		</div>
		<!-- user-login-area-end -->
<?php include "includes/footer.php"?>