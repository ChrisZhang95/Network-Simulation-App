<?php
	$type2=$_POST['type1'];
	if ($type2 == 'update'){
	
		$cable=$_POST['cable1'];
		$timeRem=$_POST['timeRem'];
		$timeElap=$_POST['timeElap'];
		$packetRem=$_POST['packetRem'];
		$frameRem=$_POST['frameRem'];
		$packetSent=$_POST['packetSent'];
		$frameSent=$_POST['frameSent'];
		$mindex=$_POST['index'];
		$index = (int)$mindex;

		require 'Monitor.php';
		require 'Cable.php';
		
		session_start();
		$temp = $_SESSION[$cable];
		$t = unserialize($temp);

		$tempCabs = $_SESSION['cables'];
		$tc = unserialize($tempCabs);
		$cableIndex = $cable[5]-1;

		if($timeRem == 0){
				$tc[$cableIndex]->deleteFirstApp();
				$_SESSION['cables'] = serialize($tc);
		}
		
		
		if($index!=-1){
			$t[$index]->setTimeRem($timeRem);
			$t[$index]->setTimeElap($timeElap);
			$t[$index]->setPacketRem($packetRem);
			$t[$index]->setFrameRem($frameRem);
			$t[$index]->setPacketSent($packetSent);
			$t[$index]->setFrameSent($frameSent);
			$_SESSION[$cable] = serialize($t);
		}
	}
?>



