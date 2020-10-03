<?php
    session_start();
	$error = "";  

	if (array_key_exists("submit", $_POST)) {
        
        include("connection.php");
        
        if (!$_POST['email']) {
            
            $error .= "An email address is required<br>";   
        }

        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {

        	$query = "SELECT id FROM `diary` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) {

                $_SESSION['email'] = $_POST['email'];

                $C_email = $_SESSION['email'];

                $query = "SELECT * FROM `diary` WHERE email = '".$C_email."' LIMIT 1";

                $result = mysqli_query($link, $query);

                $row = mysqli_fetch_array($result);

                      
                $_SESSION['id2'] = $row[0];
                $_SESSION['vcode'] = $row[4];
                
                include("emailsend.php");

                

                header("Location: sendEmail.php");

            }else{
                $error = "This email is not exist, please try again!";
            }


        }
    }

?>


<?php include("header.php"); ?>



<div class="container" id="homePageContainer">

	 <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
	} ?></div>

<form method="post" id = "forgotPassword" >
    
    <p><strong>Please enter your e-mail to reset your password!</strong></p>

    <fieldset class="form-group">

        <input class="form-control" type="email" name="email" placeholder="Your Email">
        
    </fieldset>
    
    <fieldset class="form-group">
        
        <input class="btn btn-success" type="submit" name="submit" value="Get Vertification Code!">
        
    </fieldset>
    

</form>

</div>



<?php include("footer.php"); ?>



