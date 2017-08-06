<?php
	//var_dump($_POST);
	$username = $_POST["username"];
	$password = $_POST["password"];
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("Network");
	$result = mysql_query("SELECT username, password, type FROM `Users`", $conn);
	
	$type = null;
	$loggedin = false;
	$user = null;
	while ($row = mysql_fetch_array($result)) {
		if($row['username'] == $username && $row['password'] == $password){
			$loggedin = true;
			$user = $row;
			break;
		}
	}
	//var_dump($user);
	if($loggedin == false){
		echo "0";
	}
	else{
		echo "1".",";
		$type = $user['type'];
		echo $type.",";
		session_start();
		$_SESSION['username'] = $user['username'];
		echo $user['username'];
		if($type = 'student'){
			$url = "index1.php";
			//header('Location: index1.php');
		}
		else if ($type = 'admin'){
			//header('Location: index1.php');
		}
	}
	
?>