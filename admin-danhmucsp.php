
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?><?php include "includes/header-admin.php" ?>

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DANH MỤC SẢN PHẨM
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
                        </tr>
                        <?php include "includes/connection.php";
                        $result = mysqli_query($conn, "SELECT * FROM groupproduct");
                        $row = mysqli_fetch_assoc($result);
                        foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row['ID_GroupProduct'] ?></td>
                                <td><?php echo $row['Name_GP']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
<?php include "includes/footer-admin.php"?>