<?php 
	session_start();
require_once("includes/connection.php");
if (isset($_POST["btn_submit"])) {
	$username = $_POST["username"];
	$password = MD5($_POST["password"]);
	
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password == "") {
		echo '<script language="javascript">';
     	echo 'alert("Username hoặc Password bạn không được để trống!")';
     	echo '</script>';
	} else {
		$sql = mysqli_query($conn,"SELECT * FROM admin WHERE UserName = '$username' AND Password ='$password' LIMIT 1");
		$count = mysqli_num_rows($sql);
		$row_dangnhap=mysqli_fetch_array($sql);
		if($count>0){
			$_SESSION['dangnhap'] = $row_dangnhap['Username'];
			$_SESSION['Password'] = $row_dangnhap['Password'];
			header('Location: admin-dashboard.php');
		}else{
			echo '<script language="javascript">';
     		echo 'alert("Tên đăng nhập hoặc mật khẩu không đúng!")';
     		echo '</script>';
		}
	 } 
 }?>
<!DOCTYPE html>
<head>
<title>Trang quản lí Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="public/backend/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="public/backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="public/backend/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="public/backend/css/font.css" type="text/css"/>
<link href="public/backend/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="public/backend/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<form action="admin-dangnhap.php" method="post">
			<input type="text" class="ggg" name="username" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="btn_submit">
		</form>
		<p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
</div>
</div>
<script src="public/backend/js/bootstrap.js"></script>
<script src="public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/backend/js/scripts.js"></script>
<script src="public/backend/js/jquery.slimscroll.js"></script>
<script src="public/backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="public/backend/js/jquery.scrollTo.js"></script>
</body>
</html>
