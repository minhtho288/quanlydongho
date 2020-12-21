<?php include "includes/connection.php" ?>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['dangnhap']))
{	header('location: admin-dangnhap.php'); exit;
}
?>
<?php
    if(isset($_POST['themsanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $gia = $_POST['giasanpham'];
        $trangthai = $_POST['trangthai'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $thuonghieu = $_POST['thuonghieu'];
        $danhmuc = $_POST['danhmuc'];
        $path = './uploads/';
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $sql_insert_product = mysqli_query($conn,"INSERT INTO product values (NULL,'$tensanpham', '$gia', '$trangthai', '$hinhanh', '$thuonghieu','$danhmuc') ");
        move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    }else if(isset($_POST['capnhatsanpham'])){
        $id_update = $_POST['id_update'];
        $tensanpham = $_POST['tensanpham'];
        $gia = $_POST['giasanpham'];
        $trangthai = $_POST['trangthai'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $thuonghieu = $_POST['thuonghieu'];
        $danhmuc = $_POST['danhmuc'];
        $path = './uploads/';
        if($hinhanh==''){
            $sql_update_image = "UPDATE product SET Name = '$tensanpham', Price = '$gia', Status = '$trangthai', Trademark = '$thuonghieu' , ID_GroupProduct = '$danhmuc' WHERE ID = '$id_update'";
        }else{
            move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
            $sql_update_image = "UPDATE product SET Name = '$tensanpham', Price = '$gia', Status = '$trangthai', Image = '$hinhanh', Trademark = '$thuonghieu' , ID_GroupProduct = '$danhmuc' WHERE ID = '$id_update'";
        }
        mysqli_query($conn,$sql_update_image);
    }
?>
<?php
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($conn,"DELETE FROM product WHERE ID = '$id'");
    }
?>
<?php include "includes/header-admin.php" ?>
<section id="main-content">
    <section class="wrapper">
        <?php
            if(isset($_GET['quanly']) == 'capnhat'){
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = mysqli_query($conn,"SELECT * FROM product WHERE ID = '$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
                $id_category_1 = $row_capnhat['ID_GroupProduct'];
        ?>
                    <div class="col-md-4">
                        <h4 align="center">Cập nhật sản phẩm</h4><br>
                            <form action="admin-themsanpham.php" method="POST" enctype="multipart/form-data">
                                <label>Name</label>
                                <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['Name']?>" ><br>
                                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['ID']?>" ><br>
                                <label>Price</label>
                                <input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['Price']?>"><br>
                                <label>Status</label>
                                <input type="text" class="form-control" name="trangthai" value="<?php echo $row_capnhat['Status']?>"><br>
                                <label>Image</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <img src="./uploads/<?php echo $row_capnhat['Image'] ?>" height="80" width="80" ><br>
                                <label>Trademark</label>
                                <input type="text" class="form-control" name="thuonghieu" value="<?php echo $row_capnhat['Trademark']?>"><br>
                                <label>ID_GroupProduct</label>
                                <?php
                                $sql_danhmuc = mysqli_query($conn,"SELECT * FROM groupproduct ORDER BY ID_GroupProduct DESC");
                                ?>
                                <select name="danhmuc" class="form-control">
                                    <option value="0">------Chọn danh mục-------</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                        if($id_category_1 == $row_danhmuc['ID_GroupProduct']){
                                            ?>
                                            <option selected value="<?php echo $row_danhmuc['ID_GroupProduct'] ?>"><?php echo $row_danhmuc['Name_GP'] ?></option>
                                        <?php
                                        }else{
                                        ?>
                                    <option value="<?php echo $row_danhmuc['ID_GroupProduct'] ?>"><?php echo $row_danhmuc['Name_GP'] ?></option>
                                    <?php
                                    }
                                }
                                    ?>
                                </select><br>
                                <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
                            </form>
                    </div>
        <?php
            }else{
                ?>
                    <div class="col-md-4">
                        <h4 align="center">Thêm sản phẩm</h4><br>
                            <form action="admin-themsanpham.php" method="POST" enctype="multipart/form-data">
                                <label>Name</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
                                <label>Price</label>
                                <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
                                <label>Status</label>
                                <input type="text" class="form-control" name="trangthai" placeholder="Trạng thái sản phẩm"><br>
                                <label>Image</label>
                                <input type="file" class="form-control" name="hinhanh" placeholder="Hình ảnh"><br>
                                <label>Trademark</label>
                                <input type="text" class="form-control" name="thuonghieu" placeholder="Thương hiệu"><br>
                                <label>ID_GroupProduct</label>
                                <?php
                                $sql_danhmuc = mysqli_query($conn,"SELECT * FROM groupproduct ORDER BY ID_GroupProduct DESC");
                                ?>
                                <select name="danhmuc" class="form-control">
                                    <option value="0">------Chọn danh mục-------</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                    
                                        ?>
                                    <option value="<?php echo $row_danhmuc['ID_GroupProduct'] ?>"><?php echo $row_danhmuc['Name_GP'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
                            </form>
                    </div>
                    <?php
            }
            ?>
                    <div class="col-md-8">
                        <h4>Liệt kê sản phẩm</h4><br>
                        <?php
                        $sql_select_sp = mysqli_query($conn,"SELECT * FROM product ORDER BY ID DESC ");
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Trạng thái sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Thương hiệu</th>
                                <th>Quản lý</th>
                            </tr>
                            <?php
                            $i = 0 ;
                            while($row_sp = mysqli_fetch_array($sql_select_sp)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_sp['Name'] ?></td>
                                <td><?php echo number_format($row_sp['Price']).'vnd' ?></td>
                                <td><?php echo $row_sp['Status'] ?></td>
                                <td><img src="./uploads/<?php echo $row_sp['Image'] ?>" width="100" height="100"/></td>
                                <td><?php echo $row_sp['Trademark']; ?></td>
                                <td><a href="admin-themsanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['ID']?>">Cập nhật</a> || <a href="?xoa=<?php echo $row_sp['ID']?>">Xóa</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
    </section>
</section>
<?php include "includes/footer-admin.php" ?>