<?php

	$username =( isset( $_POST["txtUsername"]) ?  $_POST["txtUsername"]: "");
	
	$password = $_POST["txtPassword"];
	
	
	if ($username == "test" && $password =  "uapass") {

		echo "Success!";
		session_start();
		$_SESSION["username"] = $username;
		header("Location: securearea.php");
	}
	else {
		echo "invalid user/pass";
	}
	
?>	