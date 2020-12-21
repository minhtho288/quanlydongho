<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>

<?php include "includes/header-admin.php" ?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<h3>Chào mừng bạn "<?php echo $_SESSION['dangnhap'] ?>" đến với trang Admin</h3>
    <br>
    <div>
    <h4>Trang quản lý ADMIN</h4>
    <ul>Nguyễn Huỳnh Minh Tâm</ul>
    <ul>Nguyễn Huỳnh Minh Thơ</ul>
    </div>
    <br>
</section>
<?php include "includes/footer-admin.php" ?>

