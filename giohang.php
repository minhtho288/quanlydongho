<?php 
    include "includes/connection.php";
?>
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['username']))
{	header('location: login.php'); exit;
}
?>
<?php 
if(isset($_POST['capnhatsoluong'])){
    
    for($i=0; $i<count($_POST['product_id']); $i++){
        $sanpham_id = $_POST['product_id'][$i];
		$soluong = $_POST['soluong'][$i];
		$dongia = $_POST['dongia'][$i];
		$tongtiendb = $soluong * $dongia;
        if($soluong <= 0){
            $sql_delete = mysqli_query($conn, "DELETE FROM cart WHERE id_product='$sanpham_id'");
        }else{
            $sql_update = mysqli_query($conn, "UPDATE cart SET quantity = '$soluong', Total_amount = '$tongtiendb' WHERE id_product='$sanpham_id'");
        }
    }
}else if(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($conn, "DELETE FROM cart WHERE id_cart='$id'");
}
?>
<?php include "includes/header.php" ?>
<br />
		<!-- entry-header-area-start -->
		<div class="entry-header-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
                        <br />
						<div class="entry-header-title" align="center">
							<h2>Giỏ hàng</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- entry-header-area-end -->
		<!-- cart-main-area-start -->
		<div class="cart-main-area mb-70">
			<div class="container">
				<div class="row">
                    <?php
                    $sql_lay_giohang = mysqli_query($conn, "SELECT * FROM cart ORDER BY id_cart DESC");
                    ?>
					<div class="col-lg-12">
						<form action="giohang.php" method="post">
							<div class="table-content table-responsive">
								<table>
									<thead>
										<tr>
                                            <th class="product-stt">STT</th>
											<th class="product-thumbnail">Hình ảnh</th>
											<th class="product-name">Thương hiệu</th>
											<th class="product-name">Sản phẩm</th>
											<th class="product-price">Giá tiền</th>
											<th class="product-quantity">Số lượng</th>
											<th class="product-subtotal">Tổng tiền</th>
											<th class="product-remove">Quản lý</th>
										</tr>
									</thead>
									<tbody>
                                    <?php 
                                    $i = 0;	
									$total = 0;	
									while($row = mysqli_fetch_array($sql_lay_giohang))
									{ 	
										$id = $row['id_product'];
										$sqlgetthuonghieu = "SELECT * FROM product WHERE product.ID = $id";
										$resultproduct = mysqli_query($conn , $sqlgetthuonghieu);
										$thuonghieu =  mysqli_fetch_assoc($resultproduct);

                                        $tongtien = $row['quantity'] * $row['price_product'];
                                        $total += $tongtien;
                                        $i++;
                                    ?>
										<tr>
                                            <td><?php echo $i ?></td>
											<td class="product-thumbnail"><a href="#"><img src="public/frontend/img/product/<?php echo $row['image_product']; ?>" alt=" " class="img-responsive"/></a></td>
											<td class="product-name"><a href="#"><?php echo $thuonghieu['Trademark']; ?></a></td>
											<td class="product-name"><a href="#"><?php echo $row['name_product']; ?></a></td>
											<td class="product-price"><span id="price" class="amount"><?php echo number_format($row['price_product']) . 'vnd';?></span></td>
											<td class="product-quantity">
                                                <input type="number" min="1" name="soluong[]" value="<?php echo $row['quantity'];?>">
												<input type="hidden" name="product_id[]" value="<?php echo $row['id_product'];?>">
												<input type="hidden" name="dongia[]" value="<?php echo $row['price_product'];?>">
                                            </td>
                                            <td class="product-subtotal"><?php echo number_format($tongtien) . 'vnd';?></td>
											<td class="product-remove">
                                                <a href="?xoa=<?php echo $row['id_cart']?>">Xóa</a>
                                            </td>
										</tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="7">Tổng tiền: <?php  echo number_format($total) . 'vnd';?> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><input type="submit" class=" btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong"/></td>
                                    </tr>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="wc-proceed-to-checkout">
                                <a href="donhang.php">Thanh toán</a>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<!-- cart-main-area-end -->
<?php include "includes/footer.php"?>
