<?php	
	session_start();
	$name = "test";
	
	$_session["name"] = $name . " session variable";
	
	echo $_session["name"];
	
	?>
	