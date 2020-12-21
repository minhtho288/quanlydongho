<?php
include   "PHPMailer-6.2.0/src/PHPMailer.php";
include   "PHPMailer-6.2.0/src/Exception.php";
include  "PHPMailer-6.2.0/src/OAuth.php";
include  "PHPMailer-6.2.0/src/POP3.php";
include  "PHPMailer-6.2.0/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $mail->setFrom('watchstyle@gmail.com', 'Mailer');
    $mail->addAddress('nhmtam.c3tqcap.a3@gmail.com', 'Tâm'); // Add a recipient
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
    // $to = "nhmtam.c3tqcap.a3@gmail.com";
    // $subject = 'Wactchstyle shop';
    // $message = 'Bạn đã đặt hàng thành công, đơn hàng sẽ vận chuyển đến bạn trong thời gian sớm nhất, cảm ơn bạn!!';
    // $header = "From: watchstyle@gmail.com";

    // if(mail($to, $subject, $message, $header)==true){
    //     echo 'Đặt hàng thành công!!! => Cảm ơn bạn !!!';
    // }else{
    //     echo 'Đặt hàng thất bại';
    // }
?>
