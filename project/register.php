<?php


$user = "uoasa13";
$pass = "UApass50";
$db = "uoasa13";
$host = "localhost";

$username = $_POST["txtUsername"];
$password = $_POST["txtPassword"];
$email = $_POST["txtEmail"];
$firstName = $_POST["txtFirstname"];
$lastName = $_POST["txtLastname"];

//check for duplicate
$sql=("SELECT username, password FROM users WHERE username = '".$username."'");
$sql2 = ("INSERT INTO users VALUES ('$username','$password','$email','$firstName','$lastName')");
mysql_connect($host, $user, $pass ) or die ("pass issue");
mysql_select_db($db);
$result =mysql_query($sql);

if(mysql_num_rows($result)>=1)
   {
    echo"name already exists";
    exit;
   }
 else
 {
	mysql_query($sql2);
	header('Location: front.html');
 }
	
mysql_close();


?>