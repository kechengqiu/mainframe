<?php
	session_start();
	
	if ( isset($_SESSION["username"])){
		//logged in
	} else {
		//not logged in
		header("Location: login.html");
		
	}


?>
<h1>You are in a secure area!</h1>

<br />
<br />

<a href ="./logout.php">Logout</a>