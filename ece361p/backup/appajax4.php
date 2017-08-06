<?php
require 'Application.php';
require 'Computer.php';
require 'Cable.php';

$cable_1 = $_POST['cable1'];
$cable_2 = $_POST['cable2'];
$cable_3 = $_POST['cable3'];
$cable_4 = $_POST['cable4'];
$source1 = $_POST['source6'];
$app2 = $_POST['app1'];
//$dest3 = $_POST['dest1'];
$computerIndex = $source1[8]-1;
$cableIndex1 = $cable_1[5]-1;
$cableIndex2 = $cable_2[5]-1;
$cableIndex3 = $cable_3[5]-1;
$cableIndex4 = $cable_4[5]-1;

session_start();

$temp = $_SESSION['computers'];
$t = unserialize($temp);
$tempCabs = $_SESSION['cables'];
$tc = unserialize($tempCabs);

$cab=$t[$computerIndex]->getCable();
echo $cab;
$t[$computerIndex]->setCableArr($cab);
//echo $t[$computerIndex]->getHost();
$t[$computerIndex]->setCableArr($cable_1);
$t[$computerIndex]->setCableArr($cable_2);
$t[$computerIndex]->setCableArr($cable_3);
$t[$computerIndex]->setCableArr($cable_4);
echo $t[$computerIndex]->getCableArr();

  $tc[$cableIndex1]->setApps($app2);
  $tc[$cableIndex2]->setApps($app2);
  $tc[$cableIndex3]->setApps($app2);
  $tc[$cableIndex4]->setApps($app2);


$_SESSION['computers'] = serialize($t);
$_SESSION['cables'] = serialize($tc);

?>