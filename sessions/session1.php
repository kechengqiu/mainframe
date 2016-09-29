<?php
	session_start();
	$name = "Test";

	$_SESSION["name"] = $name . " Session Variable";
	
	echo $_SESSION["name"];

?>

<br />
<a href="./session2.php">Go to Page 2</a>