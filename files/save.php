<?php


$user = "uoasa13";
$pass = "UApass50";
$db = "test";
$host = "localhost";

$txtName = $_GET["txtName"];
$txtEmail = $_GET["txtEmail"];
$txtState = $_GET["txtState"];

$sql = "INSERT INTO users1 VALUES ('$txtName','$txtEmail','$txtState');";

mysql_connect($host, $user, $pass ) or die ("pass issue");
mysql_select_db($db);
mysql_query($sql);

	$sql = "select * from users1";
	$result = mysql_query($sql);
	
	echo "<table>";
	

	while ($row = mysql_fetch_array($resullt)){?>
	
	<tr>
		<td width ="33%"> <? $row["NAME"]?> </td>
		<td width ="33%"> <? $row["STATE"]?> </td>
		<td width ="33%"> <? $row["EMAIL"]?> </td>
	</tr>	
<?php	
	
	echo "</table>";
	
mysql_close();

echo "data saved";

?>