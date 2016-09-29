
<?php	

	session_start();
	//option 1: destory the variable
	if( isset($_SESSION ["username"] )){
		unset($_SESSION ["username"]);
		
	}
	
	//option 2: destory the session_cache_expire
	session_destroy();
	
		header("Location: login.html");
	
?>	