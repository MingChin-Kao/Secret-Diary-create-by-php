<?php
	/*
  
  //Send_email

  //echo $_SESSION['email'];


  
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
}*/
?>


<?php include("header.php"); ?>


<?php

	session_start();
	//others
	$error = "";
	
	if(array_key_exists('vertification', $_POST)) { 

				if (!$_POST['vertificationCode']) {
            
           			 $error .= "Vertification Code is required<br>";
            
       			 } 
       			if ($error != "") {
            
            		$error = "<p>There were error(s) in your form:</p>".$error;
            
       			 }else{
       			 	 include("connection.php");

       			 	 $C_email = $_SESSION['email'];

					 //$query = "SELECT * FROM `diary` WHERE email = '".$C_email."' LIMIT 1";

					 //$result = mysqli_query($link, $query);

					 //$row = mysqli_fetch_array($result);

					  
					 //$_SESSION['id2'] = $row[0];
					 //$_SESSION['vcode'] = $row[4];
					 
					if ($_SESSION['vcode'] == $_POST['vertificationCode']) {
                		
                    	header("Location: resetpasswrod.php");

               		}else{
                	    echo '<div class="alert alert-danger" role="alert">Your vertification code is incorrect, please try again.</div>';
               		 }
       			 }

		 		//$query = "SELECT verificationCode FROM `diary` WHERE email = '".$C_email."' LIMIT 1";


				//mysqli_real_escape_string($link, $_POST['vertificationCode'])
                //$result = mysqli_query($link, $query);

       			//echo $row[0];
    } 

?>

<div class="container" id="homePageContainer">



	 <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
	} ?></div>

<form method="post" id = "vertificationCode">
    
    <div class="alert alert-danger" role="alert">Vertification Code had been sent to your email, Please check!</div>
    <p><strong>Please enter your vertification Code to reset your password!</strong></p>

    <fieldset class="form-group">

        <input class="form-control" type="password" name="vertificationCode" placeholder="Vertification Code">
        
    </fieldset>
   

    <fieldset class="form-group">
        
        <input class="btn btn-success" type="submit" name="vertification" id="vc" value="Vertify">
        
    </fieldset>
    

</form>


</div>

<?php include("footer.php"); ?>