<?php
    class Monitor{
    	private $name;
		private $protocol;
		//private $Endpoints[2];
		private $fileSize;
		private $numPackets;
		private $packetsRem;
		private $packetsSent;
		private $frameRem;
		private $frameSent;
		private $timeElapse;
		private $timeRem;
		private $source;
		private $des;
		private $app;

		public function __construct($name, $source, $des, $app){
			$this->name = $name;
			$this->protocol = 'UDP';
			if($app == 'app1'){
				$this->fileSize = '1GB';
				$this->numPackets = 15261;
				$this->packetsRem = 15261;
				$this->packetsSent = 0;
				$this->frameRem = 671484;
				$this->frameSent = 0;
				$this->timeElapse = 0;
				$this->timeRem = 8;
			}
			else {
				$this->fileSize = '10GB';
				$this->numPackets = 152607;
				$this->packetsRem = 152607;
				$this->packetsSent = 0;
				$this->frameRem = 6714708;
				$this->frameSent = 0;
				$this->timeElapse = 0;
				$this->timeRem = 75;
			}
			
			$this->source = $source;
			$this->des = $des;
			$this->app = $app;
		}
		public function setName($name){
			$this->name = $name;
		}
		public function getName(){
			return $this->name;
		}
		public function getProtocol(){
			return $this->protocol;
		}
		public function getFileSize(){
			return $this->fileSize;
		}

		public function getNumPacket(){
			return $this->numPackets;
		}
		public function getPacketRem(){
			return $this->packetsRem;
		}
		public function getPacketSent(){
			return $this->packetsSent;
		}
		public function getFrameRem(){
			return $this->frameRem;
		}
		public function getFrameSent(){
			return $this->frameSent;
		}
		public function getTimeElap(){
			return $this->timeElapse;
		}
		public function getTimeRem(){
			return $this->timeRem;
		}
		public function setFileSize($size){
			$this->fileSize = $size;
		}
		public function setProtocol($protocol){
			$this->protocol = $protocol;
		}
		public function setNumPacket($num){
			$this->numPackets = $num;
		}
		public function setPacketRem($packet){
			$this->packetsRem = $packet;
		}
		public function setPacketSent($packet){
			$this->packetsSent = $packet;
		}
		public function setFrameRem($frame){
			$this->frameRem = $frame;
		}
		public function setFrameSent($frame){
			$this->frameSent = $frame;
		}
		public function setTimeElap($time){
			$this->timeElapse = $time;
		}
		public function setTimeRem($time){
			$this->timeRem = $time;
		}
		public function getSource(){
			return $this->source;
		}
		public function getDes(){
			return $this->des;
		}
		public function getApp(){
			return $this->app;
		}

		public function display(){
			echo "File size: $fileSize";
			echo "<br>";
			echo "NUmber of UDP packets: $numPackets";
			echo "<br>";
			echo "Ethernet : ";
			echo "<br>";
			echo "Number of frame: ";
			echo "<br>";			

			echo "Packets remained: $packetsRem";
			echo "<br>";
			echo "Frames remained: $frameRem";
			echo "<br>";
			echo "Packets sent: $packetsSent";
			echo "<br>";
			echo "Frames remained: $frameSent";
			echo "<br>";

			echo "Time elaspe: $timeElapse";
			echo "<br>";
			echo "Time remained: $timeRem";
			echo "<br>";
		}



    }
?>