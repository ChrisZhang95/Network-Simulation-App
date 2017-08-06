<?php
	$type2=$_POST['type1'];
	if($type2 == 'rightclk'){
		//echo $type2;
		$cable2 = $_POST['cable1'];
		//echo $cable2;
		require 'Monitor.php';
		session_start();
		if(array_key_exists($cable2, $_SESSION))
			$monitors = $_SESSION[$cable2];
		else{
			echo "<h4 ><strong>Cable: </strong><span id='mcable'>$cable2</span></h4> ";
			echo "<h5 style='text-align: center;'>There is no traffic passing through the cable</h5>";
			return;
		}
		$t = unserialize($monitors);
		$empty = true;
		//var_dump($t);
		//$index = -1;
		if(sizeof($t) == 0) {
			echo "<h4 ><strong>Cable: </strong><span id='mcable'>$cable2</span></h4> ";
			echo "<h5 style='text-align: center;'>There is no traffic passing through the cable</h5>";
		}
		else{
			for($i = 0; $i < sizeof($t); $i++){

				$monitor = $t[$i];
				//echo $monitor->getName();
				$source = $monitor->getSource();
				$des = $monitor->getDes();
				$app = $monitor->getApp();
				$protocol = $monitor->getProtocol();
				$filesize = $monitor->getFileSize();
				$numPackets = $monitor->getnumPacket();
				$packetRem = $monitor->getPacketRem();
				$packetSent = $monitor->getPacketSent();
				//echo $packetSent;
				$frameRem = $monitor->getFrameRem();
				$frameSent = $monitor->getFrameSent();
				$timeElapse = $monitor->getTimeElap();
				$timeRem = $monitor->getTimeRem();
				if($timeRem != 0){
					$empty = false;
					echo "<div class='subMonitor'>";
					echo "<h4 style='text-align: center;'>Monitor</h4><div class='monitorInfo'> ";
					echo "<p ><strong>Cable: </strong><span id='mcable'>$cable2</span></p> ";
					echo "<p ><strong>Source: </strong><span>$source</span></p> ";
					echo "<p ><strong>Destination: </strong><span>$des</span></p> ";
					echo "<p ><strong>App: </strong><span >$app</span></p> ";
					echo "<p ><strong>Protocol: </strong><span id='mprotocol'>$protocol</span></p> ";
					echo "<p><strong>File Size: </strong><span id='mfilesize'>$filesize</span></p> ";
					echo "<p><strong># of UDP Packets: </strong ><span id='mnumpacket'>$numPackets</span></p> ";
					echo "<p><strong>Remaining Packets: </strong><span id='mpacketrem'>$packetRem</span></p> ";
					echo "<p><strong>Packets Sent: </strong><span id='mpacketsent'>$packetSent</span></p> ";
					echo "<p><strong>Remaining Frame: </strong><span id='mframerem'>$frameRem</span></p> 	 ";
					echo "<p><strong>Frame Sent: </strong><span id='mframesent'>$frameSent</span></p> ";
					echo "<p><strong>Time Elapsed: </strong><span id='mtimeelapse'>$timeElapse</span></p> ";
					echo "<p><strong>Time Remaining: </strong><span id='mtimerem'>$timeRem</span></p> ";
					echo "</div> ";
					echo "</div>";
				}
			}
		}	
		if($empty == true){
			echo "<h4 ><strong>Cable: </strong><span id='mcable'>$cable2</span></h4> ";
			echo "<h5 style='text-align: center;'>There is no traffic passing through the cable</h5>";
		}
		//if($index!=-1){
			// $monitor = $t[$index];
			// //echo $monitor->getName();
			// $protocol = $monitor->getProtocol();
			// $filesize = $monitor->getFileSize();
			// $numPackets = $monitor->getnumPacket();
			// $packetRem = $monitor->getPacketRem();
			// $packetSent = $monitor->getPacketSent();
			// //echo $packetSent;
			// $frameRem = $monitor->getFrameRem();
			// $frameSent = $monitor->getFrameSent();
			// $timeElapse = $monitor->getTimeElap();
			// $timeRem = $monitor->getTimeRem();

			// echo "<h2>Monitor</h2><div> ";
			// echo "<p ><strong>Cable: </strong><span id='mcable'>$cable2</span></p> ";
			// echo "<p ><strong>Protocol: </strong><span id='mprotocol'>$protocol</span></p> ";
			// echo "<p><strong>File Size: </strong><span id='mfilesize'>$filesize</span></p> ";
			// echo "<p><strong># of UDP Packets: </strong ><span id='mnumpacket'>$numPackets</span></p> ";
			// echo "<p><strong>Remaining Packets: </strong><span id='mpacketrem'>$packetRem</span></p> ";
			// echo "<p><strong>Packets Sent: </strong><span id='mpacketsent'>$packetSent</span></p> ";
			// echo "<p><strong>Remaining Frame: </strong><span id='mframerem'>$frameRem</span></p> 	 ";
			// echo "<p><strong>Frame Sent: </strong><span id='mframesent'>$frameSent</span></p> ";
			// echo "<p><strong>Time Elapsed: </strong><span id='mtimeelapse'>$timeElapse</span></p> ";
			// echo "<p><strong>Time Remaining: </strong><span id='mtimerem'>$timeRem</span></p> ";
			// echo "</div> ";
	}
		// else{
		// 	echo "<h2>This cable isn't running</h2>";
		// }
	
?>