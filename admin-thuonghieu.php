<?php include "includes/header-admin.php" ?>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    THƯƠNG HIỆU
                </div>
                <div>
                    <table class="table" ui-jq="footable" ui-options='{
                        "paging": {
                        "enabled": true
                        },
                        "filtering": {
                        "enabled": true
                        },
                        "sorting": {
                        "enabled": true
                        }}'>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Image</td>
                            <td>Trademark</td>
                        </tr>
                        <?php include "includes/connection.php";
                        $result = mysqli_query($conn, "SELECT * FROM product");
                        $row = mysqli_fetch_assoc($result);
                        foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><img src="./public/frontend/img/product/<?php echo $row['Image'] ?>" width="100" height="100"/></td>
                                <td><?php echo $row['Trademark']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
<?php include "includes/footer-admin.php"?>