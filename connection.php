<?php
	$link = mysqli_connect("localhost", "root", "123456", "user");
		if(mysqli_connect_error()){
			die("Database connection Error");
		}
?>