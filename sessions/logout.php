<?php

	session_start();
	
	
	//option 1:  destroy the variable
	if ( isset($_SESSION["username"]) ) {
		unset( $_SESSION["username"] );
	}
	
	//option 2: destroy the session
	//session_destroy();
	
	header("Location: login.html");
	

?>