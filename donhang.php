<?php

session_start();
include "includes/connection.php";
include   "PHPMailer-6.2.0/src/PHPMailer.php";
include   "PHPMailer-6.2.0/src/Exception.php";
include  "PHPMailer-6.2.0/src/OAuth.php";
include  "PHPMailer-6.2.0/src/POP3.php";
include  "PHPMailer-6.2.0/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<?php
error_reporting(0);
?>
<?php
if (isset($_POST['thanhtoan'])) {

	$option = $_POST['giaohang'];

	if ($option ==  1) {
		include "common/helper.php";

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$note = $_POST['note'];
		$email = $_POST['email'];
		$giaohang = $_POST['giaohang'];
		$idcustomer = $_SESSION['idcustomer'];
		$config = file_get_contents('config.json');
		$array = json_decode($config, true);

		$endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

		$partnerCode = "MOMO34SR20201026";
		$accessKey = "LbYZI5yGpXEu1b2f";
		$secretKey = "aC5jyHvwxgkCKsrOze3hzG4309Ur337b";
		$orderInfo = "Thanh toán qua MoMo";
		$amount = "10000";
		$orderId = time() . "";
		$returnUrl = "http://localhost:8080/quanlydongho/donhang.php?result=1";
		$notifyurl = "http://localhost:8080/quanlydongho/ipn_momo.php";
		// Lưu ý: link notifyUrl không phải là dạng localhost
		$extraData = "merchantName=MoMo Partner";

		$requestId = time() . "";
		$requestType = "captureMoMoWallet";
		//$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
		//before sign HMAC SHA256 signature
		$rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
		$signature = hash_hmac("sha256", $rawHash, $secretKey);
		$data = array(
			'partnerCode' => $partnerCode,
			'accessKey' => $accessKey,
			'requestId' => $requestId,
			'amount' => $amount,
			'orderId' => $orderId,
			'orderInfo' => $orderInfo,
			'returnUrl' => $returnUrl,
			'notifyUrl' => $notifyurl,
			'extraData' => $extraData,
			'requestType' => $requestType,
			'signature' => $signature
		);
		$result = execPostRequest($endpoint, json_encode($data));
		$jsonResult = json_decode($result, true);  // decode json

		//Just a example, please check more in there

		header('Location: ' . $jsonResult['payUrl']);
		//ghi vào database

		$sql_khachhang = mysqli_query($conn, "INSERT INTO bill (Consignee_name, Consignee_phone, Consignee_address, Note, Consignee_email, Delivery, id_customers ) 
		VALUES ('$name', '$phone', '$address', '$note', '$email', '$giaohang', '$idcustomer')");
		if ($sql_khachhang) {
			$sql_select_khachhang = mysqli_query($conn, "SELECT * FROM bill ORDER BY ID_Bill DESC LIMIT 1");
			$mahang = rand(0, 999);
			$row_khachhang = mysqli_fetch_assoc($sql_select_khachhang);
			$khachhang_id = $row_khachhang['ID_Bill'];
			for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {
				$sanpham_id = $_POST['thanhtoan_product_id'][$i];
				$soluong = $_POST['thanhtoan_soluong'][$i];
				$sql_donhang = mysqli_query($conn, "INSERT INTO bill_product (id_product, quantity, codes, ID_Bill, order_status)
			VALUES ('$sanpham_id', '$soluong', '$mahang', '$khachhang_id', '0')");
				$sql_delete_thanhtoan = mysqli_query($conn, "DELETE FROM cart WHERE id_product='$sanpham_id'");
			}

			echo '<script language="javascript">';
			echo 'alert("Chúc mừng bạn đặt hàng thành công")';
			echo '</script>';
			sendmail();
			// header('Location: donhang.php');
		}
	} else {

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$note = $_POST['note'];
		$email = $_POST['email'];
		$giaohang = $_POST['giaohang'];
		$idcustomer = $_SESSION['idcustomer'];

		$sql_khachhang = mysqli_query($conn, "INSERT INTO bill (Consignee_name, Consignee_phone, Consignee_address, Note, Consignee_email, Delivery, id_customers ) 
		VALUES ('$name', '$phone', '$address', '$note', '$email', '$giaohang', '$idcustomer')");
		if ($sql_khachhang) {
			$sql_select_khachhang = mysqli_query($conn, "SELECT * FROM bill ORDER BY ID_Bill DESC LIMIT 1");
			$mahang = rand(0, 999);
			$row_khachhang = mysqli_fetch_assoc($sql_select_khachhang);
			$khachhang_id = $row_khachhang['ID_Bill'];
			for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {
				$sanpham_id = $_POST['thanhtoan_product_id'][$i];
				$soluong = $_POST['thanhtoan_soluong'][$i];
				$sql_donhang = mysqli_query($conn, "INSERT INTO bill_product (id_product, quantity, codes, ID_Bill, order_status)
			VALUES ('$sanpham_id', '$soluong', '$mahang', '$khachhang_id', '0')");
				$sql_delete_thanhtoan = mysqli_query($conn, "DELETE FROM cart WHERE id_product='$sanpham_id'");
			}

			sendmail();
			header('Location: donhang.php?mess=1');
		}
	}
}
?>

<?php
if (isset($_GET['mess'])) {
	echo '<script language="javascript">';
	echo 'alert("Chúc mừng bạn đặt hàng thành công")';
	echo '</script>';
}

?>

<?php
function sendmail()
{
	if (isset($_POST['email'])) {
		$mail = new PHPMailer(true); // Passing `true` enables exceptions
		try {
			//Server settings
			$mail->SMTPDebug = 2; // Enable verbose debug output
			$mail->isSMTP(); // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'nhmtam.c3tqcap.a3@gmail.com'; // SMTP username
			$mail->Password = 'tamthokha99'; // SMTP password
			$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465; // TCP port lớn connect to
			//Recipients
			$mail->setFrom('nhmtam.c3tqcap.a3@gmail.com', 'wacthstyle');
			$mail->addAddress($_POST['email']); // Add a recipient
			// $mail->addAddress('ellen@example.com'); // Name is optional
			// $mail->addReplyTo('quangtin131299@gmail.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');
			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
			//Content
			// $mail->isHTML(true); // Set email format to HTML
			$mail->Subject = 'Wactchstyle shop';
			$mail->Body = 'Bạn đã đặt hàng thành công, đơn hàng sẽ vận chuyển đến bạn trong thời gian sớm nhất, cảm ơn bạn!!';
			$mail->AltBody = 'Shop đồng hồ wacthstyle ';
			if ($mail->send()) {
				echo 'Đặt hàng thành công!!! => Cảm ơn bạn !!!';
			}
		} catch (Exception $e) {
			echo 'Đặt hàng thất bại. Mailer Error: ', $mail->ErrorInfo;
		}
	}
}

?>

<?php include "includes/header.php" ?>
<br />
<!-- checkout-area-start -->
<div class="checkout-area mb-70">
	<div class="container">
		<div class="row">
			<form action="donhang.php" method="post">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="checkbox-form">
						<h3>Chi tiết hóa đơn</h3>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
								<div class="checkout-form-list">
									<label>Họ và tên <span class="required">*</span></label>
									<input type="text" placeholder="" name="name">
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="checkout-form-list">
									<label>Số điện thoại <span class="required">*</span></label>
									<input type="number" placeholder="0898xxxxxx" name="phone">
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="checkout-form-list">
									<label>Địa chỉ <span class="required">*</span></label>
									<input type="text" placeholder="Địa chỉ cụ thể" name="address">
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="checkout-form-list">
									<label>Email <span class="required">*</span></label>
									<input type="email" placeholder="email" name="email">
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="checkout-form-list">
									<textarea style="resize:none;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="checkout-form-list">
									<label>Hình thức giao hàng <span class="required">*</span></label>
									<select class="form-control" name="giaohang">
										<option>Chọn hình thức giao hàng</option>
										<option value="0" name="checkgiaohang">Thanh toán khi nhận hàng</option>
										<option value="1" name="checkgiaohang">Thanh toán qua thẻ MOMO</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="your-order">
						<h3>Đơn đặt hàng của bạn</h3>
						<div class="your-order-table table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-name">Sản phẩm</th>
										<th class="product-total">Tổng</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql_lay_giohang = mysqli_query($conn, "SELECT * FROM cart ORDER BY id_cart DESC");
									$total = 0;
									$phigiaohang = 20000;
									while ($row = mysqli_fetch_assoc($sql_lay_giohang)) {
										$tongtien = $row['quantity'] * $row['price_product'];
										$total += $tongtien;
									?>
										<tr class="cart_item">
											<td class="product-name">
												<?php echo $row['name_product']; ?><strong class="product-quantity" name="soluong[]" style="color:darkgoldenrod"> x Số lượng: <?php echo $row['quantity']; ?></strong>
											</td>
											<td class="product-total">
												<span class="amount"><?php echo number_format($tongtien) . 'vnd'; ?></span>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr class="cart-subtotal">
										<th>Tổng giỏ hàng</th>
										<td><span class="amount"><?php echo number_format($total) . 'vnd'; ?> </span></td>
									</tr>
									<tr class="shipping">
										<th>Vận chuyển</th>
										<td>
											<ul>
												<li>
													<label>Miễn phí vận chuyển</label>
												</li>
											</ul>
										</td>
									</tr>
									<tr class="order-total">
										<th>Tổng đơn hàng</th>
										<td><strong><span class="amount"><?php echo number_format($total) . 'vnd'; ?></span></strong>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="payment-method">
							<div class="order-button-payment">
								<?php
								$sql_lay_giohang = mysqli_query($conn, "SELECT * FROM cart ORDER BY id_cart DESC");
								while ($row_thanhtoan = mysqli_fetch_assoc($sql_lay_giohang)) {
								?>
									<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['id_product']; ?>">
									<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['quantity']; ?>">
								<?php } ?>
								<input type="submit" name="thanhtoan" value="Đặt hàng và thanh toán">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- checkout-area-end -->
<?php include "includes/footer.php" ?>