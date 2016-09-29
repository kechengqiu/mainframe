<html>
<head>
<title>Login Information</title>

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
			height: 400px;
			padding: 100px;
			
		}
		
		#content {
			margin: auto;
			width: 350px;
			height: 350px;
			padding: 10px;
			border: 1px solid lightblue;
			border-radius: 3px;
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

		hr {
			border: 1px solid lightblue;
		}
		
		p {
			font-size: 20px;
		}
		
		
	</style>

</head>
<body>
		<div id="header">	
			<div id="logo_1">
	            <div id="logo_2">
	            	<a href="./front.php"><img src="I38tN1dN.png" style="width:50px;height:50px;"></a>
	            </div>  
	            <div id="logo_3">
	            	<p style="color: darkblue;">UAtweetBook</p>
	            </div>
            </div>
		</div>
		&nbsp;
		<div id="header_2">
        	<div id="header_2_middle">
                <div id="content">
                	<h1 style="color:skyblue;">UAtweetBook Login</h1>
                	<hr>
                	<p style="color:red;"><i>Username and/or Password is incorrect <br/>
                	Please enter correct Username/Password</i></p> <br/>
                	<form action="./logincheck.php" method="POST">
                        Username: &nbsp;
                        <input type="text" name="txtUsername" size="40" placeholder="Username"/> <br/><br/>
                        Password: &nbsp;&nbsp;
                        <input type="password" name="txtPassword" size="40" placeholder="Password" /> <br/><br/>
                        <input type="submit" value="Log in" /> &nbsp; or &nbsp;
                        <a href="./front.html">Sign up for UAtweetBook</a> <br/><br/>
                        <i>Forgot Password?</i>
                    </form>

			

</body>
</html>