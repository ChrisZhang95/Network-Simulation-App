$(document).ready(function(e){
	var interVal = [];
$(document).on('contextmenu', '.cable', function(){
	
	clearInterval(interVal[0]);
    interVal.splice(0, 1 );
	var id = $(this).attr('id');
	var type = 'rightclk';
	var dataString1 = 'cable1='+ id + '&type1=' + type;
	var speed = $('#speed').val();

    if (speed === "") {
        speed = 1000;
    }
    else{
        speed = speed * 1000;
    }
    intervalID = setInterval(function() {
		$.ajax({
		    type: "POST",
            url: "monitorRightClk.php",
            data: dataString1,
            cache: false,
		}).done(function(data) {
			//alert(data);
			$('#monitor').html(data);    
		});
	}, 1000);
	interVal.push(intervalID);
	return false;
});

$(document).on('contextmenu', '.computer', function(e){
	var id = $(this).attr('id');
	var num = id[8]
	$('#application'+ num).css('display','initial');
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'id1='+ id;
	$("#contextMenu").css('left',e.pageX+10);
	$("#contextMenu").css('top',e.pageY+10);
	$("#contextMenu").fadeIn(100);
	return false;
});

var usernameOri;
$(document).on('contextmenu', '.trow', function(e){


 	// $(this).attr('id', username);
 	usernameOri = $(this).attr('id');
	 $(".custom-menu").finish().toggle(100).
    
    // In the right position (the mouse)
    css({
        top: event.pageY + "px",
        left: event.pageX - 30 + "px"
    });
    
	return false;
});

$(document).bind("mousedown", function (e) {
    
    // If the clicked element is not the menu
    if (!$(e.target).parents(".custom-menu").length > 0) {
        
        // Hide it
        $(".custom-menu").hide(100);
    }
});

$('#moduser').click(function(){
		$(".custom-menu").hide(100);
        $('#modUserDialog').dialog();
        $('#moddsubuser').click(function(){
            // var username = $('#usernamemod').val();
            //alert(username);
            var password = $('#passwordmod').val();
            var repassword = $('#repasswordmod').val();
            var type = $('#typemod').val();
            var op = "mod";
            var dataString9 = 'password1=' + password + '&repassword1=' + repassword + '&type1=' + type + "&op=" + op +"&ori=" + usernameOri;
            $.ajax({
                type: "POST",
                url: "userManagement.php",
                data: dataString9,
                cache: false,
                success: function(result){
                    // alert(result);
                    var r = result[0];
                    // //alert(r);
                    if (r == "0"){
                    	location.reload();
                        $('#modUserDialog').dialog('destroy');
                    } 
                    else if (r == "1")
                        alert("Please make sure to re-type the password correctly");
                    else if (r == "2")
                        alert("Please choose the right type of user you would like to add");
                    else if (r == "4"){
                    	$('#modUserDialog').dialog('destroy');
                    }
                }
            });
        });
        
    });

});