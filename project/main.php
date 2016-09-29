<html>
<head>
<title>Main Page</title>
	<script>
	
		function saveWithAJAX() {
			var comment   = document.getElementById("txtComment").value;
			
			var x;
			
			x = new XMLHttpRequest();
			
			x.onreadystatechange = function() {
				if ( x.readyState == 4 && x.status == 200 ) {
					document.getElementById("results_block").innerHTML = x.responseText;
				}	
			
			};
			
			x.open( "GET", "save.php?txtComment=" + comment, true );
			
			
			x.send();
			
		}
	
	</script>

	<style type="text/css">
	
		body {
			margin: 0;
		}
		
		#header {
			width: 100%;
			border: 0px solid black;
			height: 50px;
			background-color: rgb(102,153,204);
		}
		
		#header_2 {
			width: 100%;
			border: 0px;
			height: 400px;
		}
		
		#header_2_middle {
			margin: auto;
			width: 850px;
			border: 1px;
			height: 400px;
			padding: 20px;
		}
		
		#header_left {
			width: 25%;
			height: 80px;
			float: left;
			border: 1px solid lightblue;
			border-radius: 5px;
			padding: 10px;
		}
		
		#header_middle {
			width: 1%;
			height: 100%;
			float: left;
			padding: 10px;
		}
		
		#header_right {
			width: 60%;
			height: 100%;
			float: left;
			padding: 10px;
		}
		
		textarea {
			width: 100%;
			border-radius: 5px;
			border: 1px solid lightblue;
		}
		
		#textwrapper {
			border-radius: 5px;
			margin: 5px 0;
			padding: 3px;
		}
		
		hr {
			border: 1px solid lightblue;
		}
		
		#results_block {
			width: 95%;
			border:  1px solid lightblue;
			border-radius: 5px;
			padding: 10px;
			word-wrap: break-word;
			
		}
		
		
		
				
		#logo_1 {
			width: 80%;
			height: 100%;
			margin: auto;
		}
		
		#logo_2 {
			width: 50px;
			height: 100%;
			float: left;
		}
		
		#logo_3 {
			width: 250px;
			height: 100%;
			float: left;
			padding: 5px;
		}
		
		#logo_4 {
			width: 50px;
			height: 100%;
			float: right;
		}
		
		p {
			font-size: 20px;
		}
		
	</style>

</head>
<body>

<?php
SESSION_START();
$user = "uoasa13";
$pass = "UApass50";
$db = "uoasa13";
$host = "localhost";

mysql_connect($host, $user, $pass ) or die ("pass issue");
mysql_select_db($db);

$sql=("SELECT * FROM users WHERE username = '".$_SESSION['user']."'");
$result=mysql_query($sql);

$sql1=("SELECT * FROM users WHERE username = '".$_SESSION['user']."'");
$result1=mysql_query($sql1);

$sql2 = ("SELECT username, postDate, comments FROM posts where username = '".$_SESSION['user']."' ORDER BY postDate DESC");
$result2 = mysql_query($sql2);


?>

		<div id="header">	
			<div id="logo_1">
	            <div id="logo_2">
	            	<a href="./main.php"><img src="I38tN1dN.png" style="width:50px;height:50px;"></a>
	            </div>  
	            <div id="logo_3">
	            	<p style="color: darkblue;">UAtweetBook</p>
	            </div>
	            <div id="logo_4">
	            	<a href="./front.html"><img src="sign-off.png" style="width:50px;height:50px;"></a>
	            </div>
            </div>
		</div>
		<div id="header_2">
        	<div id="header_2_middle">
                <div id="header_left">
					<body>
					
                    <?php
                     while ($row = mysql_fetch_array($result)){
						 echo $row{"firstName"} . " " . $row{"lastName"};
					 }
                    ?>
                    <hr>
                    
                    <?php
                     while ($row = mysql_fetch_array($result1)){
						 echo $row{"username"} . " <br/> " . $row{"email"};
						
					 }
                    ?>
					</body>
                </div>
                
                <div id="header_middle"></div>

                <div id="header_right">
					
					<form method="get" action="./save.php">
						<div id="textwrapper"><textarea maxlength="140" name='txtComment' id='txtComment' rows="4" cols="70" placeholder="What's on your mind?..."></textarea><br/></div>
							<input type="button" value="Post" onclick="saveWithAJAX()" />
					</form>
					<hr>
					<div id="results_block" style=display:table;">	
						<?php	
						echo "<table width='100%' border='1' bordercolor=darkblue padding='5px'>";
						while ( $row = mysql_fetch_array($result2) ) { ?>
								<tr>
									<td width="5%;" align="center"> <?= $row["username"] ?> </td>
									<td width="5%;" align="left"> <?= $row["postDate"] ?> </td>
									<td width="5%;" align="center">
									<button onclick="edit()" style="background-color:lightblue" class="editBtn">Edit</button>
									<button onclick="delete()" style="background-color:lightblue" class="deleteBtn">Delete</button><br/></td>
									<td style="word-break:break-all;" width="25%;" align="left" > <?= $row["comments"] ?> </td>
								</tr>
						<?	}
							echo "</table>"; ?>
						
						
						
						
					</div>
					
				</div>
            </div>
		</div>

			

</body>
</html>