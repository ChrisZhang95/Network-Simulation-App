$(document).ready(function(){
      

	$('#login').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		var dataString = 'username='+ username +'&password='+ password;
		//alert(dataString);
		$.ajax({
            type: "POST",
            url: "login.php",
            data: dataString,
            cache: false,
                  success: function(result){
                  	//alert(result);
                  	var r = result.split(",");
                  	var log = r[0];
                  	//alert(log);
                  	if(log == '1'){
                  		//alert("yes");
                  		var type = r[1];
                              var username = r[2];
                              //alert(username);
                              var dataString1 = "username1=" + username;
                  		if(type == "student"){
                                    window.location.assign("homepage.php");
                              }
                  		else{
                                    //$.redirect('indexAdmin.php', {'username': username});
                                    // var page='indexAdmin.php?username='+username;
                                    // document.location.href=page;
                                    $.ajax({
                                          type: "POST",
                                          url: "indexAdmin.php",
                                          data: dataString1,
                                          success: function(r){
                                                //alert(r);  
                                                window.location.assign("indexAdmin.php"); 
                                          }
                                    });
                  			
                              }
                  	}
                  	else{
                  		alert("Wrong username/password");
                  	}
                  }
            });

	});
	
});