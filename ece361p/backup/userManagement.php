<?php

	
	$op = $_POST['op'];
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("Network");
	
	if($op == "add"){
		$username = $_POST['username1'];
		$password = $_POST['password1'];
		$repw = $_POST['repassword1'];
		$type = $_POST['type1'];
		$result = mysql_query("SELECT username FROM `Users` order by username", $conn);
		$existed = false;
		while ($row = mysql_fetch_array($result)) {
			if($row['username'] == $username){
				$existed = true;
				break;
			}
		}

		if($existed == true){
			echo "0";
		}
		else{
			if($password != $repw)
				echo "1";
			else{
				if($type=="student" || $type == "admin"){
					$insert = mysql_query("INSERT INTO `Users` (`username`, `password`, `type`)"."VALUES ('$username', '$password', '$type')", $conn);
					echo "3";
				}
				else{
					echo "2";
				}
			}
		}
	}

	else if($op == "delete"){
		//echo"in delete";
		$username = $_POST['username1'];
		$password = $_POST['password1'];
		$result = mysql_query("SELECT username, password FROM `Users` order by username", $conn);
		$num = mysql_query("SELECT count(*) FROM `Users` GROUP BY type HAVING 'type' = 'admin'", $conn);
		
		$existed = false;
		while ($row = mysql_fetch_array($result)) {
			
			if($row['username'] == $username && $row['password'] != $password){
				$existed = true;
				echo "0";
				break;
			}
			else if($row['username'] == $username && $row['password'] == $password){
				$existed = true;
				$delete = mysql_query("DELETE FROM `Users` WHERE username = '$username'", $conn);
				echo "1";
				break;
			}
		}
		if($existed == false){
			echo "2";
		}
	}

	else if($op == "mod"){
		$password = $_POST['password1'];
		$repw = $_POST['repassword1'];
		$type = $_POST['type1'];
		$ori = $_POST['ori'];
		$result = mysql_query("SELECT username, password, type FROM `Users` WHERE username = '$ori'", $conn);
		if(!empty($result)){
			if($password != "" && $password == $repw){
				//$update = mysql_query("UPDATE `IP_Address` SET `available`= 'false' WHERE `address` = ".$row["address"], $conn);
				$update = mysql_query("UPDATE `Users` SET `password`= '$password' WHERE `username` = '$ori'", $conn);
				if($type == "student" || $type == "admin"){
					$update1 = mysql_query("UPDATE `Users` SET `type`= '$type' WHERE `username` = '$ori'", $conn);
					//successfully updated info
					echo "0";
				}
				else if(empty($type)){
					//type isn't changing
					echo "0";
				}
				else{
					///type is neither student or admin
					echo "2";
				}
			}
			else if($password != $repw){
				//password doesn't match with re-entered password
				echo "1";
			}

		}

		else{
			echo "4";
		}
	}
	else if($op == 'change'){
		$username = $_POST['username'];
		$curpassword = $_POST['curpassword'];
		$newpassword = $_POST['newpassword'];
		$repw = $_POST['repassword'];

		$result = mysql_query("SELECT username, password, type FROM `Users` WHERE username = '$username'", $conn);
		while ($row = mysql_fetch_array($result)) {
			if($row['username'] == $username && $row['password'] == $curpassword){
				if($newpassword == $repw){
					$update = mysql_query("UPDATE `Users` SET `password`= '$newpassword' WHERE `username` = '$username'", $conn);
					echo "0";
					return;
				}
				else{
					//new password doesn't match with re-entered new password
					echo "2";
				}
			}
			else{
				//username and password don't match with the database
				echo "1";
			}
		}
	}
?>




