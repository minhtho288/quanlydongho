<?php include "includes/connection.php" ?>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>
<?php
if(isset($_POST['capnhatdonhang'])){
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];
    $sql_update_donhang =  mysqli_query($conn,"UPDATE bill_product SET order_status='$xuly' WHERE codes='$mahang'");
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
                    <?php
                    if(isset($_GET['quanly']) == 'xemdonhang'){
                        $mahang = $_GET['codes'];
                        $sql_chitiet = mysqli_query($conn,"SELECT * FROM bill_product, product WHERE bill_product.id_product = product.ID AND bill_product.codes = '$mahang' ");
                    ?>
                    <div class="col-md-7">
                    <p>Xem chi tiết đơn hàng</p>
                    <form action="" method="POST">
                    <table class="table table-bordered">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Mã hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                            </tr>
                            <?php
                            $i = 0 ;
                            while($row_donhang = mysqli_fetch_array($sql_chitiet)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_donhang['codes'] ;?></td>
                                <td><?php echo $row_donhang['Name']; ?></td>
                                <td><?php echo $row_donhang['quantity']; ?></td>
                                <td><?php echo $row_donhang['Price']; ?></td>
                                <td><?php echo number_format( $row_donhang['quantity'] = $row_donhang['Price']).'vnd'; ?></td>
                                <td><?php echo $row_donhang['CreateDate'] ?></td>
                                <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['codes'] ?>" >
                                <!-- <td><a href="?xoa=<?php echo $row_donhang['codes']?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['codes']?>">Xem đơn hàng</a></td> -->
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <select class="form-control" name="xuly">
                            <option value="1">Đã xử lý</option>
                            <option value="0">Chưa xử lý</option>
                        </select><br>
                        <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="col-md-12">
                        <h4>Liệt kê đơn hàng</h4><br>
                        <?php
                        $sql_select = mysqli_query($conn,"SELECT * FROM product, bill, bill_product WHERE bill_product.id_product = product.ID AND bill_product.ID_Bill= bill.ID_Bill ORDER BY bill_product.ID_Order DESC ");
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Mã hàng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ghi chú</th>
                                <th>Quản lý</th>
                            </tr>
                            <?php
                            $i = 0 ;
                            while($row_donhang = mysqli_fetch_array($sql_select)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_donhang['codes'] ?></td>
                                <td><?php
                                    if($row_donhang['order_status']==0){
                                        echo 'Chưa xử lý';
                                    }else{
                                        echo 'Đã xử lý';
                                    }?>
                                </td>
                                <td><?php echo $row_donhang['Consignee_name'] ?></td>
                                <td><?php echo $row_donhang['CreateDate'] ?></td>
                                <td><?php echo $row_donhang['Note'] ?></td>
                                <td><a href="?xoadonhang=<?php echo $row_donhang['codes']?>">Xóa</a> || <a href="?quanly=xemdonhang&codes=<?php echo $row_donhang['codes']?>">Xem đơn hàng</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
    </section>
</section>
<?php include "includes/footer-admin.php" ?>