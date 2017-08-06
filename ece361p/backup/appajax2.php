<?php
require 'Application.php';
require 'Computer.php';
require 'Cable.php';

$cable_1 = $_POST['cable1'];
$cable_2 = $_POST['cable2'];
$source4 = $_POST['source4'];
$app2 = $_POST['app1'];
//$dest3 = $_POST['dest1'];
$computerIndex = $source4[8]-1;
$cableIndex1 = $cable_1[5]-1;
$cableIndex2 = $cable_2[5]-1;
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
//echo $t[$computerIndex]->getHost();
$t[$computerIndex]->setCableArr($cable_1);
$t[$computerIndex]->setCableArr($cable_2);
echo $t[$computerIndex]->getCableArr();

  $tc[$cableIndex1]->setApps($app2);
  $tc[$cableIndex2]->setApps($app2);


$_SESSION['computers'] = serialize($t);
$_SESSION['cables'] = serialize($tc);
//$temp = $_SESSION['computers'];
//$t = unserialize($temp);
//var_dump($t);
  // if(empty($Cable)){
  //   echo "No Cable";
  // }else{
  //   foreach ($Cable as $key => $value) {
  //     echo $value;
  //   }
  // }
?>