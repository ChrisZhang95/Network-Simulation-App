<?php

$type2=$_POST['type1'];
$source2 = $_POST['source1'];
$des2 = $_POST['des1'];
$app2 = $_POST['app1'];
require 'Monitor.php';
session_start();
//echo $type2;
if($type2 = "start"){
	if(!empty($_POST['cable1'])) {
		$cable1 = $_POST['cable1'];
		//if this cable already has a monitor
		if(array_key_exists($cable1, $_SESSION)){
			$monitor = new Monitor($cable1, $source2, $des2, $app2);
			$cableMonitor = $_SESSION[$cable1];
			$t = unserialize($cableMonitor);
			array_push($t, $monitor);
			$_SESSION[$cable1] = serialize($t);
			$index1 = sizeof($t) - 1;
			echo $index1;
		}
		//if this is a new monitor
		else{
			$monitors = array();
			$monitor = new Monitor($cable1, $source2, $des2, $app2);
			array_push($monitors, $monitor);
			$_SESSION[$cable1] = serialize($monitors);
			$index1 = 0;
			echo $index1;
		}

	}
}

?>


				
					
					
					
					
					
					
									
					
					
					
				