<?php
//computer id
$id=$_POST['id'];
//app id
$appid=$_POST['appid'];
//app name
$appname=$_POST['appname'];
$compIndex = $id[8]-1;
require 'Computer.php';
session_start();
//
$temp = $_SESSION['computers'];
$t = unserialize($temp);

if(empty($t[$compIndex])){
	$com = new Computer($id,$id);
	$com->setApp($appid);
	$t[$compIndex]=$com;
}else{
	$t[$compIndex]->setApp($appid);
}

$_SESSION['computers'] = serialize($t);

$temp = $_SESSION['computers'];
$t = unserialize($temp);
var_dump($t);

?>