<?php
session_start();
	//save results to mysql

$user = "uoasa13";
$pass = "UApass50";
$db = "uoasa13";
$host = "localhost";


//$id = $_GET["txtID"];
$comments = $_GET["txtComment"];
	
//	$txtName   = $_GET["txtName"];
//	$txtEmail = $_GET["txtEmail"];
//	$txtState = $_GET["txtState"];
	
	$sql = "INSERT INTO posts VALUES ( null, '".$_SESSION['user']."', '$comments', null)";
	
	
	mysql_connect( $host, $user, $pass ) or die("Issue with connecting");
	mysql_select_db( $db );
	mysql_query($sql);


	$sql = ("SELECT username, postDate, comments FROM posts where username = '".$_SESSION['user']."' ORDER BY postDate DESC");
	
	$result = mysql_query($sql);
	
	echo "<table width='100%' border='1' bordercolor=darkblue padding='5px'>";
						while ( $row = mysql_fetch_array($result) ) { ?>
								<tr>
									<td width="5%;" align="center"> <?= $row["username"] ?> </td>
									<td width="5%;" align="left"> <?= $row["postDate"] ?> </td>
									<button onclick="edit()" style="background-color:lightblue" class="editBtn">Edit</button>
									<button onclick="delete()" style="background-color:lightblue" class="deleteBtn">Delete</button><br/></td>
									<td style="word-break:break-all;" width="25%;" align="left" > <?= $row["comments"] ?> </td>
								</tr>
						<?	}
							echo "</table>";

	
	mysql_close();
	
	//echo "Data Saved";

?>