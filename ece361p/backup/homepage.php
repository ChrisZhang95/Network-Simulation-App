<?php 

  session_start();
  if(empty($_SESSION['username'])){
    header("HTTP/1.0 400 Bad Request", true, 400);
      exit('400: Bad Request');
  }
  $username = $_SESSION['username'];
  foreach($_SESSION as $key => $val)
  {
      if ($key !== 'username')
      {
        unset($_SESSION[$key]);
      }
  }
?>


<!DOCTYPE html>
<html>
<head>
<title>ECE 361 Computer Network</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<link href="style.css" rel="stylesheet">
<script src="script.js"></script>
<script src="collision.js"></script>
<script src="click.js"></script>
<script src="doubleclick.js"></script>
<script src="rightclick.js"></script>
<script src="udpClick.js"></script>

</head>
<body>

    <div style="display: none;" id="changePWDialog">
      <span style="padding-left: 2.5%;">Current Password:  </span> 
      <input type="password" name="password" id="currentPW" style=""><br>
      <span style="padding-left: 9%;" >New Password:  </span> 
      <input type="password" name="password" id="newPW1" style=""><br>
      <label style="padding-left: 0.5%;">Re-enter Password:</label> <input type="password" name="password" id="rechangePW" style=""><br>

      <label style="padding-left: 74%;"><button id="changesubuser" class="change" >Change</button></label>
    </div> 


<!-- Required div Starts Here -->
<h1><strong>ECE361 Computer Networks</strong></h1>
<?php echo "<h2 style='float: right;'>Welcome, $username!</h2>"; ?>
<?php echo "<h2 style='float: right; display: none;' id='user1'>$username</h2>"; ?>
<?php
// page1.php
require 'Computer.php';
require 'Monitor.php';
require 'Cable.php';
//session_start();
$computers = array();
$cables = array();
$switch = array();
$_SESSION['string'] = serialize($cables);
$_SESSION['cables'] = serialize($cables);
$_SESSION['switchs'] = serialize($switch);
$_SESSION['computers'] = serialize($computers);
//$monitor = new Monitor();
$monitor = array();
//$_SESSION['monitor'] = serialize($monitor);
//$speed = 1024*1024*1024*8;
//$cable = new Cable($speed, "Cisco", "Cat6/6E", "RJ45");
//$_SESSION['cable'] = $cable;
?>
<form >
  	Simulation Speed:<br>
  	<input type="text" name="speed" id="speed">
  	<!-- <button type="button" onclick="alert('Hello world!')">Submit</button> -->
</form> 


<button id="result" disabled class="button" id="popbox">Traffic Generation</button>
<button id="pause" disabled class="button" onclick="Continue()">Pause</button>
<button id="continue" disabled class="button">Continue</button>

<div id="dialog" style="display: none; background-color: #ff8533; ">
	<label style="padding-left: 9.9%; margin-top: 3%;">Source name :</label>
	<input id="sourcename" type="text" >
	<label>Destination name :</label>
	<input id="destinationname" type="text"><br>
  <div  style="padding-left: 40%;">
    <input value="app1" name="subject" class="subject-list" type="checkbox" checked >App 1 
    <input value="app2" name="subject" class="subject-list" type="checkbox">App2 
  </div>
    <script type="text/javascript">
      $('.subject-list').on('change', function() {
        $('.subject-list').not(this).prop('checked', false);  
    });
    </script>
	<input id="popsubmit" class="aiya" type="button" value="Configure" style="margin-top: 3%; margin-left: 70%">
</div>

<form method="get" action="homepage.php" class="button">
    <input type="submit" value="Reset">
</form>
<button id="changePW" class="button" style="float: right;" >Change Password</button>
<?php
	include "connectSQL.php";
?>
<nav>
    <ul class="cf">
        <li><a href="#" id="computerNav">Computer</a></li>
        
        <li><a href="#" id="cableNav">Ethernet Cable</a></li>
        <li><a href="#" id="switchNav">Switch</a></li>
        <li><a href="#">Ethernet Card</a></li>  
    </ul>
</nav>		
<section id="playground">
	<div class="container" >
        <div id="contextMenu" class="context-menu" style="z-index: 3;">
          <ul>
          <li><div id="showapps" class="menuItem">Applications</div></li>
          </ul>
          
        </div>
  </div>
  <div class="showApps" id="show-apps" style="z-index: 4; text-align: center; position: absolute;">
          <ul style="list-style: none; position: relative; right: 20%;">
          <li><div id="app1" class="app-items" >app1</div></li>
          <li><div id="app2" class="app-items" >app2</div></li>
          </ul>
   </div>

</section>
<section id="monitor">
	<h4 style='text-align: center;'>Monitor</h4>

</section>
<section style="display: none;" id="php">
    false
</section>
<section style="display: none;" id="php1">
  
</section>
<script type="text/javascript">
  $(document).ready(function(){
 var currentObj;
 //rightclick
 $("body").on("mousedown",".computer", function(e) {
     if (3 == e.which) {
      currentObj = $(this);
      console.log(currentObj.html());
    }
 });
 //data li
 $(".showApps ul li").click(function(){
    //alert('hi');
    var id=$(this).children("div").attr('id');
    var app=$(this).children("div").html();
    var computerid=currentObj.attr('id');
     //currentObj.children(".chooseApp").find("."+id).remove();
     //var html='<div class="'+id+'">'+app+'</div>'
     // currentObj.children(".chooseApp").append(html);
    addDiv(id);
    $.post("addComputer.php",{'id':computerid,'appid':id,'appname':app},function(result){
        //alert(result);
    });


});


 });
  function addDiv(id){
  if($("#app_info").length == 0){
    $('#playground').append('<div id="app_info"></div>');
  }
  //check id exists
  if($("#_"+id).length >0){

  }else{
    var html="<div id='_"+id+"' class='app-div' style='z-index: 5;'>"+id+"</div>";
    $('#app_info').append(html);
  }
}

 </script>
 
 
 </body>
</html>


<script>
function Continue() {
    $('#continue').removeAttr("disabled");
}
</script>
