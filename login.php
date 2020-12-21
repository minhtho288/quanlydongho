<?php
session_start();
?>
<?php 
require_once("includes/connection.php");
if (isset($_POST["btn_submit"])) {
	$username = $_POST["username"];
	$password = ($_POST["password"]);

	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password == "") {
		echo '<script language="javascript">';
     	echo 'alert("Username hoặc Password bạn không được để trống!")';
     	echo '</script>';
	} else {
		$sql = "SELECT * FROM customers WHERE UserName = '$username' AND Password ='$password'";
		$query = mysqli_query($conn, $sql);
		$num_row = mysqli_num_rows($query);
		if ($num_row == 0) {
			// echo "<h1>Tên đăng nhập hoặc mật khẩu không đúng!</h1>";
			echo '<script language="javascript">';
     		echo 'alert("Tên đăng nhập hoặc mật khẩu không đúng!")';
     		echo '</script>';
		} else {
			$row = mysqli_fetch_assoc($query);
			$_SESSION['idcustomer'] = $row['ID'];
			$_SESSION['username'] = $username;
			header('Location: giohang.php');
		}
	 } 
 }?>

<?php include "includes/header.php";?>
<div class="user-login-area mb-70">
	<div class="container">
		<form method="POST" action="login.php">
			<fieldset>
				<div class="row">
					<div class="col-lg-12">
						<div class="login-title text-center mb-30">
							<h2>Sign In</h2>
						</div>
					</div>
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
						<div class="login-form">
							<div class="single-login">
								<label>Username or email<span>*</span></label>
								<input type="text" id="username" name="username" />
							</div>
							<div class="single-login">
								<label>Passwords <span>*</span></label>
								<input type="password" id="password" name="password" />
							</div>
							<div class="single-login single-login-2">
								<input type="submit" name="btn_submit" value="Login">
							</div>
							<p>Chưa có tài khoản ? <a href="dang-ky.php">Đăng ký</a></p>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<?php include "includes/footer.php"?>
