<?php 
if (!isset($_SESSION)) session_start();
unset(   $_SESSION['dangnhap']);
header('location:admin-dangnhap.php');