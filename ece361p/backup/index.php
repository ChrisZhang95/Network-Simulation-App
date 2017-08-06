<!DOCTYPE html>
<html>
	<head>
		<title>ECE 361 Computer Network</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<link href="style.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<script src="login.js"></script>

	</head>


	<body>
		<h1><strong>ECE361 Computer Networks</strong></h1>
		<div class="login-form">
			<div>
				Username: 
				<input type="text" name="username" id="username"><br>
				<span style="padding-right: 1%;">Password:  </span> 
				<input type="password" name="password" id="password" style=""><br>
				<label style="padding-left: 55%;"><button id="login" class="login" onclick="login()">Login</button></label>
			</div>
			
		</div> 
	</body>
</html>