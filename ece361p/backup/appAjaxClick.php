<?php
require 'Application.php';
require 'Computer.php';
require 'Cable.php';
// session_start();
//   $se = $_SESSION;

//   $Cable=array();
//   $appid=$_POST['appid'];
//   $computers=unserialize($se['computers']);
//   foreach ($computers as $key => $value) {
//     foreach ($value->getApps() as $i => $app) {
//       if($appid==$app){
//         $cab=$value->getCable();
//         if (!in_array($cab, $Cable) && $cab != 'null') {
//           array_push($Cable,$cab);
//         }
//       }
//     }
//   }
//   if(empty($Cable)){
//     echo "No Cable";
//   }else{
//     foreach ($Cable as $key => $value) {
//       echo $value;
//     }
//   }

//
session_start();
$se = $_SESSION;

  $Cable=array();
  $appid=$_POST['appid'];
  $temp = $_SESSION['cables'];
  $tc = unserialize($temp);
  foreach ($tc as $key => $value) {
    foreach ($value->getApps() as $i => $app) {
      if($appid==$app){
          $cab=$value->getName();
          if (!in_array($cab, $Cable) && $cab != 'null') {
            array_push($Cable,$cab);
          }
      }
    }
  }
  if(empty($Cable)){
    echo "No Cable";
  }else{
    foreach ($Cable as $key => $value) {
      echo $value.' ';
    }
  }

?>