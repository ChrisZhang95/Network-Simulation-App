<?php
require 'Application.php';
require 'Computer.php';
require 'Cable.php';

$cableUse = $_POST['cable1'];
$source3 = $_POST['source3'];
$app2 = $_POST['app1'];
//$dest3 = $_POST['dest1'];
$computerIndex = $source3[8]-1;
$cableIndex = $cableUse[5]-1;

session_start();
  //$se = $_SESSION;
  //$cab=unserialize($se['cables']);
  //$computers=unserialize($se['computers']);
$temp = $_SESSION['computers'];
$t = unserialize($temp);
$tempCabs = $_SESSION['cables'];
$tc = unserialize($tempCabs);
 // foreach ($computers as $key => $value) {
 //    if($value->getHost() == $source3) {
 //    	//echo $value->getHost();
 // 		//echo $source3;
 //        $cab=$value->getCable();
 //        echo $cab;
 //        $value->setCableArr($cab);      
 //    }
 //  }
//$t[$compIndex]->setApp($appid);
$cab=$t[$computerIndex]->getCable();
echo $cab;
$t[$computerIndex]->setCableArr($cab);
echo $t[$computerIndex]->getHost();
echo $t[$computerIndex]->getCableArr();


	$tc[$cableIndex]->setApps($app2);

echo $tc[$cableIndex]->getArray();

$_SESSION['computers'] = serialize($t);
$_SESSION['cables'] = serialize($tc);

?>