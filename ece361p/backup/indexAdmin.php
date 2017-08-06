<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("HTTP/1.0 400 Bad Request", true, 400);
	   	exit('400: Bad Request');
	}
	else{
		$conn = mysql_connect("localhost", "root", "");
		mysql_select_db("Network");
		$result = mysql_query("SELECT username, type FROM `Users` where type = 'admin'", $conn);
		$admin = false;
		while ($row = mysql_fetch_array($result)) {
			if($row['username'] == $_SESSION['username']){
				$admin = true;
				$username = $row['username'];
				break;
			}
		}
		if($admin == true){

		}

		else{
			header("HTTP/1.0 400 Bad Request", true, 400);
	   		exit('400: Bad Request');
		}
	}
	// if (empty($_POST['username1'])) {
	//    header("HTTP/1.0 400 Bad Request", true, 400);
	//    exit('400: Bad Request');
	// } 	

?>

<!DOCTYPE html>
<html>
	<head>
		<title>ECE 361 Computer Network</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<link href="style.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<script src="rightclick.js"></script>
		<script src="click.js"></script>

	</head>


	<body>
		<ul class='custom-menu'>
		  <li id="moduser">Modify</li>
		  <li class="deluser">Delete</li>
	</ul>

		<div style="display: none;" id="modUserDialog">
			
			<span style="padding-left: 20%;">Password:  </span> 
			<input type="password" name="password" id="passwordmod" style=""><br>
			<label style="padding-left: 0.5%;">Re-enter Password:</label> <input type="password" name="password" id="repasswordmod" style=""><br>
			<label style="padding-left: 30%;">Type:</label> <input type="text" name="type" id="typemod" placeholder="student/admin"><br>
			<label style="padding-left: 80%;"><button id="moddsubuser" class="moduser" >Modify</button></label>
		</div> 

		<div style="display: none;" id="addUserDialog">
			<label style="padding-left: 19%;">Username:</label> 
			<input type="text" name="username" id="usernameadd"><br>
			<span style="padding-left: 20%;">Password:  </span> 
			<input type="password" name="password" id="passwordadd" style=""><br>
			<label style="padding-left: 0.5%;">Re-enter Password:</label> <input type="password" name="password" id="repasswordadd" style=""><br>
			<label style="padding-left: 30%;">Type:</label> <input type="text" name="type" id="typeadd" placeholder="student/admin"><br>
			<label style="padding-left: 80%;"><button id="submituser" class="adduser" >Add</button></label>
		</div> 

		<div style="display: none;" id="delUserDialog">
			<label style="padding-left: 19%;">Username:</label> 
			<input type="text" name="username" id="usernamedel"><br>
			<span style="padding-left: 20%;">Password:  </span> 
			<input type="password" name="password" id="passworddel" style=""><br>
			<label style="padding-left: 76%;"><button id="deleteuser" class="deleteuser">Delete</button></label>
		</div> 


		<h1><strong>ECE361 Computer Networks</strong></h1>
		<?php echo "<h2 style='float: right;'>Welcome, $username!</h2>"; ?><br>
		<a href="homepage.php"><button>Network Simulation</button></a>
<!-- 		<button id="moduser">Modify User</button>
 -->		<button id="adduser">Add User</button>
		<button class="deluser">Delete User</button>
		<table style="width:50%" id="userlist">
			<tr>
			    <th>Username</th>
			    <th>Password</th> 
			    <th>Type</th>
			</tr>

			<?php
				
				$result = mysql_query("SELECT username, password, type FROM `Users` order by type, username", $conn);
				
				while ($row = mysql_fetch_array($result)) {
					$username = $row['username'];
					$password = $row['password'];
					$type = $row['type'];
					echo "<tr class='trow' id=$username><th>$username</th><th>$password</th> <th>$type</th></tr>";		
				}
			?>
		</table>

	</body>
</html>