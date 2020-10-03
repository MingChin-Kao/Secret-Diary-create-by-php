<?php
	use PHPMailer\PHPMailer\PHPMailer;
  	use PHPMailer\PHPMailer\Exception;

  	require 'PHPMailer/src/Exception.php';
 	require 'PHPMailer/src/PHPMailer.php';
 	require 'PHPMailer/src/SMTP.php';





$error = "";


$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'helloworldwooo@gmail.com';
$mail->Password = 'helloworldhello';


$mail->setFrom('helloworldwooo@gmail.com', 'It is test mail');
$mail->addReplyTo('helloworldwooo@gmail.com', 'hi');

$mail->addAddress("$C_email");

$mail->isHTML(true);

$mail->Subject = "PHPMailer SMTP test";
//$mail->addEmbeddedImage('path/to/image_file.jpg', 'image_cid');
$mail->Body = "Your vertification code is  "."$row[4]";
$mail->AltBody = 'This is the plain text version of the email content';

if(!$mail->send()){
    echo '<div class="alert alert-danger" role="alert">Vertification Code could not be sent</div>';
    echo '<div class="alert alert-danger" role="alert">Mailer Error : '. $mail->ErrorInfo.'</div>';

}else{
	echo '<div class="alert alert-danger" role="alert">Vertification Code has been sent</div>';
}
?>

?>