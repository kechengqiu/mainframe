			
<?php	

	session_start();
	//not logged in
	if( !isset($_SESSION ["username"] )){
		header("Location: login.html");

		
	}
	

?>	
