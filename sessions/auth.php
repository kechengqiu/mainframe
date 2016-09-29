<?php

	session_start();
	
	if( !isset($_SESSION["username"]) ) {
		//not logged in
		header("Location: login.html");
	} 


?>