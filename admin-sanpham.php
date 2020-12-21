<?php include "includes/connection.php" ?>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>
<?php include "includes/header-admin.php" ?>

<?php
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($conn,"DELETE FROM product WHERE ID = '$id'");
    }
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    SẢN PHẨM
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
                            <td>Price</td>
                            <td>Status</td>
                            <td>Image</td>
                            <td>Trademark</td>
                            <td><a href="admin-themsanpham.php">Thêm sản phẩm</a></td>
                        </tr>
                        
                        <?php include "includes/connection.php";
                        $result = mysqli_query($conn, "SELECT * FROM product ORDER BY ID DESC");
                        $row = mysqli_fetch_assoc($result);
                        foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Price']; ?></td>
                                <td><?php echo $row['Status']; ?></td>
                                <td><img src="./uploads/<?php echo $row['Image'] ?>" width="100" height="100"/></td>
                                <td><?php echo $row['Trademark']; ?></td>
                                <td><a href="admin-capnhatsanpham.php?>">Cập nhật</a> || <a href="?xoa=<?php echo $row['ID']?>">Xóa</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
        <?php include "includes/footer-admin.php" ?>