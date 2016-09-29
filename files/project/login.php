<?php


$user = "uoasa13";
$pass = "UApass50";
$db = "uoasa13";
$host = "localhost";

$username =$_POST["txtUsername"];
$password = $_POST["txtPassword"];







mysql_connect($host, $user, $pass ) or die ("pass issue");
mysql_select_db($db);

$sql=("SELECT username, password FROM users WHERE username = '".$username."' AND  password = '".$password."'");
$result =mysql_query($sql);

//get userid

//if result returns rows greater than 0 then we have a match
if(mysql_num_rows($result) > 0 )
        { 
    
            echo "you're in";
            //start session with user id
        }
        else
        {
            echo 'The username or password are incorrect!';
        }

	
mysql_close();


?>