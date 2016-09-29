<?php


$user = "uoasa13";
$pass = "UApass50";
$db = "uoasa13";
$host = "localhost";

$username =$_POST["txtUsername"];
$password = $_POST["txtPassword"];

mysql_connect($host, $user, $pass ) or die ("pass issue");
mysql_select_db($db);

$sql=("SELECT username FROM users WHERE username = '".$username."' AND  password = '".$password."'");
$result=mysql_query($sql);
if(mysql_num_rows($result) == 1 )
        {   
			//login successful and create session
            //$user = ("select id from users where username = '".$username."'");
			SESSION_START();
			$_SESSION['user'] = $username;
            header('Location: main.php');
        }
        else
        {
			
			header('Location: login.php');
        }

	
mysql_close();


?>