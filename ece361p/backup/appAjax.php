<?php
require 'Application.php';
require 'Computer.php';
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
  $computers=unserialize($se['computers']);
  foreach ($computers as $key => $value) {
    foreach ($value->getApps() as $i => $app) {
      //echo $app;
      if($appid==$app){
        //echo $value->getCableArr();
        //echo $value->getCablesArr();
        foreach($value->getCablesArr() as $j => $cab){
          if (!in_array($cab, $Cable) && $cab != 'null') {
            array_push($Cable,$cab);
          }
        }

      }
    }
  }
  if(empty($Cable)){
    echo "No Cable";
  }else{
    foreach ($Cable as $key => $value) {
      echo $value;
    }
  }

?>