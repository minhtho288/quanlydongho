<?php include "includes/connection.php" ?>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>
<?php
    if(isset($_GET['xoadonhang'])){
        $mahang = $_GET['xoadonhang'];
        $sql_delete = mysqli_query($conn,"DELETE FROM bill_product WHERE codes='$mahang'");
        header('Location:admin-xulydonhang.php');
    }
?>
<?php include "includes/header-admin.php" ?>
<section id="main-content">
    <section class="wrapper">
                    <div class="col-md-12">
                        <h4>Danh sách khách hàng</h4><br>
                        <?php
                        $sql_select_khachhang = mysqli_query($conn,"SELECT * FROM bill, bill_product WHERE bill.ID_BILL = bill_product.ID_BILL GROUP BY bill_product.codes ORDER BY bill.ID_Bill DESC ");
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Ngày mua</th>
                                <th>Quản lý</th>
                            </tr>
                            <?php
                            $i = 0 ;
                            while($row_khachhang = mysqli_fetch_array($sql_select_khachhang)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_khachhang['Consignee_name'] ?></td>
                                <td><?php echo $row_khachhang['Consignee_phone'] ?></td>
                                <td><?php echo $row_khachhang['Consignee_address'] ?></td>
                                <td><?php echo $row_khachhang['Consignee_email'] ?></td>
                                <td><?php echo $row_khachhang['CreateDate'] ?></td>
                                <td><a href="?quanly=xemgiaodich&khachhang=<?php echo $row_khachhang['codes']?>">Xem giao dịch </a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <h4>Liệt kê lịch sử đơn hàng</h4><br>
                        <?php
                        if(isset($_GET['khachhang'])){
                            $magiaodich = $_GET['khachhang'];
                        }else{
                            $magiaodich = '';
                        }
                        $sql_select = mysqli_query($conn,"SELECT * FROM bill_product, bill, product WHERE bill_product.id_product = product.ID
                            AND bill.ID_Bill = bill_product.ID_Bill AND bill_product.codes='$magiaodich' ORDER BY bill_product.	ID_Order DESC ");
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Mã hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Ngày đặt</th>
                            </tr>
                            <?php
                            $i = 0 ;
                            while($row_donhang = mysqli_fetch_array($sql_select)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_donhang['codes']; ?></td>
                                <td><?php echo $row_donhang['Name']; ?></td>
                                <td><?php echo $row_donhang['CreateDate']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
    </section>
</section>
<?php include "includes/footer-admin.php" ?>