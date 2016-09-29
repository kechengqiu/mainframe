<?php

	//save results to mysql
	$user = "amtest";
	$pass = "UApass10";
	$db   = "amtest";
	$host = "localhost";
	
	$txtName   = $_GET["txtName"];
	$txtEmail = $_GET["txtEmail"];
	$txtState = $_GET["txtState"];
	
	$sql = "INSERT INTO USERS VALUES ( null, '$txtName', '$txtEmail', '$txtState'  )";
	
	
	mysql_connect( $host, $user, $pass ) or die("Issue with connecting");
	mysql_select_db( $db );
	mysql_query($sql);


	$sql = "SELECT * FROM USERS";
	
	$result = mysql_query($sql);

	echo "<table width=\"100%\">";	
	while ( $row = mysql_fetch_array($result) ) { ?>
	
		<tr>
			<td width="25%"> <?= $row["NAME"] ?> </td>
			<td width="25%"> <?= $row["EMAIL"] ?> </td>
			<td width="20%"> <?= $row["STATE"] ?> </td>
			<td width="30%"> <input type="button"  value="Delete #<?=$row["USERID"]?>" /> </td>
			
		</tr>
		
<?	}
	echo "</table>";

	mysql_close();
	
	//echo "Data Saved";

?>