<?php
	
	session_start();
	$C_email = $_SESSION['email'];
	$id = $_SESSION['id2'];

	$error = "";



	if(array_key_exists('password', $_POST)){

		include("connection.php");


        
        if (!$_POST['password']) {
            
            $error .= "New password is required<br>";
            
        } 
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        }else{


        	
        	//$query = "UPDATE `diary` SET `password` = '".md5(md5($id).$_POST['password'])."' WHERE email = '".$C_email."', `verificatoinCode` = '".random_int(10000, 99999)."'";  
                        
            $query = "UPDATE `diary` SET password = '".md5(md5($id).$_POST['password'])."' WHERE id = '".$id."' ";
   		
   			mysqli_query($link, $query);

   			$query = "UPDATE `diary` SET `verificationCode` = '".random_int(10000, 99999)."' WHERE email = '".$C_email."' ";

   			mysqli_query($link, $query);

   			$message = "Password has already reset, enjoy diary!";

   			echo "<script type='text/javascript'>alert('$message');location.href = 'index.php'</script>";

   			//header("Location: index.php");

        }

        //echo $id ;

		
   		//echo $C_email;

   		//unset($_SESSION);
   		//xsession_destroy();

   	}


?>

<?php include("header.php"); ?>

<div class="container" id="homePageContainer">

	<div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
} ?></div>


<form method="post" id = "password" >
    
    <p><strong>Please enter your your new password!</strong></p>

    <fieldset class="form-group">

        <input class="form-control" type="password" name="password" placeholder="New password">
        
    </fieldset>
   

    <fieldset class="form-group">
        
        <input class="btn btn-success" type="submit" name="submit" value="Reset password!">
        
    </fieldset>
    

</form>

</div>

<?php include("footer.php"); ?>
