$(document).ready(function(){
    function isEmpty(obj) {
        for(var key in obj) {
            if(obj.hasOwnProperty(key))
                return false;
        }
        return true;
    }

   $('#changePW').click(function(){

        $('#changePWDialog').dialog();
        $('#changesubuser').click(function(){
            //alert(username);
            var username = $('#user1').html();
            // alert(username);
            var curpassword = $('#currentPW').val();

            var newpassword = $('#newPW1').val();
            var repassword = $('#rechangePW').val();
            var op = "change";
            // alert(username);
            // alert(curpassword);
            // alert(newpassword);
            // alert(repassword);
            var dataString11 = 'username=' + username + '&curpassword='+ curpassword + '&newpassword=' + newpassword + '&repassword=' + repassword + "&op=" + op;
            //alert(dataString11)
            $.ajax({
                type: "POST",
                url: "userManagement.php",
                data: dataString11,
                cache: false,
                success: function(result){
                    var r = result[0];
                    //alert(result);
                    if (r == "0"){
                        $('#changePWDialog').dialog('destroy');
                        alert("Password has been changed");
                        location.reload();
                    }
                    else if (r == "1")
                        alert("Please enter the correct password");
                    else if (r == "2")
                        alert("Please make sure to re-type the password correctly");

                }
            });
        });
        
    });

    $('#adduser').click(function(){
        $('#addUserDialog').dialog();
        $('#submituser').click(function(){
            var username = $('#usernameadd').val();
            //alert(username);
            var password = $('#passwordadd').val();
            var repassword = $('#repasswordadd').val();
            var type = $('#typeadd').val();
            if(isEmpty(type))
                type = "student";
            var op = "add";
            var dataString9 = 'username1='+ username + '&password1=' + password + '&repassword1=' + repassword + '&type1=' + type + "&op=" + op;
            $.ajax({
                type: "POST",
                url: "userManagement.php",
                data: dataString9,
                cache: false,
                success: function(result){
                    var r = result[0];
                    //alert(r);
                    if (r == "0")
                        alert("Username already exists");
                    else if (r == "1")
                        alert("Please make sure to re-type the password correctly");
                    else if (r == "2")
                        alert("Please choose the right type of user you would like to add");
                    else if (r == "3"){
                        //alert("success");
                        $('#addUserDialog').dialog('destroy');
                        location.reload(true);
                        
                    }
                }
            });
        });
        
    });

    $('.deluser').click(function(){
        $('#delUserDialog').dialog();
        $('#deleteuser').click(function(){
            $('#delUserDialog').dialog('destroy');
            var username = $('#usernamedel').val();
            var password = $('#passworddel').val();
            var op = "delete";
            var dataString10 = 'username1='+ username + '&password1=' + password + "&op=" + op;
            $.ajax({
                type: "POST",
                url: "userManagement.php",
                data: dataString10,
                cache: false,
                success: function(result){
                    //alert(result);
                    var r = result[0];
                    //alert(r);
                    if (r == "0")
                        alert("Please enter the correct password");
                    else if (r == "1"){
                        //alert("success");
                        location.reload(true);
                        $('#delUserDialog').dialog('destroy');

                        
                    }
                    else if (r == "2")
                        alert("Please enter a username that exists");
                }
            });
        });
    });



    $('#showapps').click(function(e){
              // $(".dropdown").next().css('visibility','hidden');
               //$('#show-apps').fadeOut(80);
            $('#show-apps').css('left',e.pageX+50);
            $('#show-apps').css('top',e.pageY+25);
            $('#show-apps').fadeIn(100);
          
    });

    //single click to spawn items
    $('#computerNav').click(function(){
        var compNum = $('.computer').length + 1;
        var combine = $(' <span><img src="pics/computer.jpg" alt="myimage" class="computer" class="item" style="width: 10%; opacity: 0.5; z-index: 1;">'+compNum+'</span>');
        $('#playground').append(combine);
        combine.draggable({ containment: "parent" });
        $('.computer').each(function(index){
            $(this).attr('id', 'computer' + (index+1));
        });        

        var num = $('.computer').length;
        //var formid = "form" + num;
        var computerid = "computer" + num;
        //alert(computerid);
        //var name = $('#' + nameid).val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'hostname1=' + computerid;
        //alert(computerid);

        //$('#' + formid).hide();

        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function(result){
            //alert(result);
        }
        });
        return false;
    });

    $('#cableNav').click(function(){
        var img1 = $('<img src="pics/cable.jpg" alt="myimage" class="cable"  style="width:15%; z-index: 0; opacity: 0.5;">');
        $('#playground').append(img1);
        img1.draggable({ containment: "parent" });
        $('.cable').each(function(index){
            $(this).attr('id', 'cable' + (index+1));
        });

        var num = $('.cable').length;
        var cableName = "cable" + num;
        var dataString = 'cable1='+ cableName;
        $.ajax({
            type: "POST",
            url: "cableAjax.php",
            data: dataString,
            cache: false,
            // success: function(result){
            // alert(result);
            // }
        });
        return false;

    });

    $('#switchNav').click(function(){
        //var img = $('<img src="pics/switch.jpg" alt="switch" class="switch"  style="width: 10%; z-index: 0; margin-left:5%; margin-top:3%; opacity: 0.5;">')
        var img = $('<div class=switch class="item" style="width: 9em; height: 20em; background-color: black;"><p>Switch</p></div>')
        $('#playground').append(img);
        img.draggable({ containment: "parent"});
        $('.switch').each(function(index){
            $(this).attr('id', 'switch' + (index+1));
        });
        var num = $('.switch').length;
        var type = "addSw";
        var switchName = "switch" + num;
        var dataString = 'switch1='+ switchName +'&type1='+type;
        $.ajax({
            type: "POST",
            url: "switchAjax.php",
            data: dataString,
            cache: false,
            // success: function(result){
            // alert(result);
            // }
        });
        return false;
    });
    
    var intervalID;
    var go = false;
    var newround = true;
    // var temptimeRem;
    // var temptimeElap;
    // var temppacketRem;
    // var temppacketSent;
    // var tempframeRem;
    // var tempframeSent;


    $('#result').click(configureComps);
    $('#pause').click(stopTimer);
    $('#continue').click(continueTimer);

    function configureComps(){
         
         
        $( "#dialog" ).dialog();
        $('#popsubmit').click(function(){
            // alert("popsubmit is called");
            // var num = $('.aiya').length;
            // alert(num);
            var app;
            $('.subject-list').each(function(index){
                if($(this).is(":checked")){
                    app = $(this).val();
                }
            }); 

            
            var source = false;
            var des = false;
            var sourceName = 'computer'+$('#sourcename').val();
            var desName = 'computer'+$('#destinationname').val();
            var dataString = 'source1='+ sourceName + '&dest1=' + desName;

            if(sourceName=="" && desName==""){
                alert('Please fill in all information');
            }
            else {
                var computers = [];
                $('.computer').each(function(i){
                    computers[i] = $(this).attr('id');
                });
                var size = computers.length;
                for(i = 0; i < size; i++){
                    if(sourceName == computers[i]){
                        source = true;
                    }
                    else if(desName == computers[i]){
                        des = true;
                    }
                }
                if (source == true && des == true){
    
                    var php;
                    $.ajax({
                        type: "POST",
                        url: 'popBoxAjax.php',
                        data: dataString,
                        cache: false,
                        success: function(result){
                            php = result[0];
                            var re = result.split(",");
                            //alert(result);
                            var cableNum = result[6];
                            var cable1 = 'cable' + cableNum;
                            var sourceNum1 = result[15];
                            var sourceNum2 = result[21];
                            //directly connected 
                            var source3 = 'computer' + sourceNum1;
                            //var start = $('#myPhpValue').val();
                            //alert(start);
                            if(php == 1){
                                //alert('I am here');
                                //startTimer();
                                $('#dialog').dialog('destroy');
                                type = "start";
                                var dataString1 = 'cable1='+ cable1 + '&type1=' + type  + '&source1=' + sourceName + '&des1=' + desName + '&app1=' + app;
                                 var dataString2 = 'cable1='+ cable1 +'&source3='+ source3 + '&app1=' + app;
                                $.ajax({
                                    type: "POST",
                                    url: "monitorAjax.php",
                                    data: dataString1,
                                    cache: false,
                                    success: function(result){
                                        var r = result;
                                        //alert(result);
                                        //$('#monitor').html(result);
                                        newround = true;
                                        startTimer(cable1, r, app);
                                    }
                                })
                                $.ajax({
                                    type: "POST",
                                    url: "appajax1.php",
                                    data: dataString2,
                                    cache: false,
                                    success: function(result){
                                        //alert(result);
                                    }
                                })
                            }
                            else if (php == 2){
                                $('#dialog').dialog('destroy');
                                var cableNum1 = result[6];
                                var cable1 = 'cable' + cableNum1;
                                var cableNum2 = result[12];
                                var cable2 = 'cable' + cableNum2;
                                var source4 = 'computer' + sourceNum2;
                                //alert(cable1 + "  " + cable2);
                                type2 = 'start2';
                                var dataString5 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&type1=' + type2 + '&source1=' + sourceName + '&des1=' + desName + '&app1=' + app;
                                var dataString6 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&source4='+ source4 + '&app1=' + app;
                                $.ajax({
                                    type: "POST",
                                    url: "monitorAjax2.php",
                                    data: dataString5,
                                    cache: false,
                                    success: function(result){
                                        //alert(result);
                                        //$('#monitor').html(result);
                                        var r = result.split(",");
                                        var r1 = r[0];
                                        var r2 = r[1];
                                        newround = true;
                                        startTimer(cable1, r1, app);
                                        startTimer(cable2, r2, app);
                                    }
                                })
                                $.ajax({
                                    type: "POST",
                                    url: "appajax2.php",
                                    data: dataString6,
                                    cache: false,
                                    success: function(result){
                                        
                                    }
                                })

                            }
                            else if (php == 3){
                                //alert ('3');
                                $('#dialog').dialog('destroy');
                                var cable1 = re[1];
                                var cable2 = re[2];
                                var cable3 = re[3];
                                var sourceNum3 = re[4];
                                var dataString6 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&cable3=' + cable3 + '&source1=' + sourceName + '&des1=' + desName + '&app1=' + app;
                                var dataString7 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&cable3=' + cable3 + '&source5='+ sourceNum3 + '&app1=' + app;
                                $.ajax({
                                    type: "POST",
                                    url: "monitorAjax3.php",
                                    data: dataString6,
                                    cache: false,
                                    success: function(result){
                                        //alert(result);
                                        //$('#monitor').html(result);
                                        var r = result.split(",");
                                        var r1 = r[0];
                                        var r2 = r[1];
                                        var r3 = r[2];
                                        newround = true;
                                        startTimer(cable1, r1, app);
                                        startTimer(cable2, r2, app);
                                        startTimer(cable3, r3, app);
                                    }
                                })
                                $.ajax({
                                    type: "POST",
                                    url: "appajax3.php",
                                    data: dataString7,
                                    cache: false,
                                    success: function(result){

                                    }
                                })
                            }
                            else if (php ==4){
                                //alert('4');
                                $('#dialog').dialog('destroy');
                                var cable1 = re[1];
                                var cable2 = re[2];
                                var cable3 = re[3];
                                var cable4 = re[4];
								var sourceNum4 = re[5];
                                var dataString7 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&cable3=' + cable3 + '&cable4=' + cable4 + '&source1=' + sourceName + '&des1=' + desName + '&app1=' + app;
                                var dataString8 = 'cable1='+ cable1 + '&cable2=' + cable2 + '&cable3=' + cable3 + '&cable4=' + cable4 + '&source6='+ sourceNum4 + '&app1=' + app; 
                                $.ajax({
                                    type: "POST",
                                    url: "appajax4.php",
                                    data: dataString8,
                                    cache: false,
                                    success: function(result){
                                
                                    }
                                })
                                $.ajax({
                                    type: "POST",
                                    url: "monitorAjax4.php",
                                    data: dataString7,
                                    cache: false,
                                    success: function(result){
                                        //alert(result);
                                        //$('#monitor').html(result);
                                        var r = result.split(",");
                                        var r1 = r[0];
                                        var r2 = r[1];
                                        var r3 = r[2];
                                        var r4 = r[3];
                                        newround = true;
                                        startTimer(cable1, r1, app);
                                        startTimer(cable2, r2, app);
                                        startTimer(cable3, r3, app);
                                        startTimer(cable4, r4, app);
                                    }
                                })
                                // $.ajax({
                                //     type: "POST",
                                //     url: "appajax4.php",
                                //     data: dataString8,
                                //     cache: false,
                                //     success: function(result){

                                //     }
                                // })
                            }
                            else {
                                alert('Please make sure the two computers are connected');
                            }
                        }
                    });
                    
                }
                else{
                    alert('Please input the right hostnames');
                }
            }
        });
    }
    var interVal = [];
    function startTimer($cable, $r, $app){
        //if($cable == 'cable2')
            //alert($r + "....");
        var finished = false;
        //alert('startTimer');
        var speed = $('#speed').val();
        if (speed === "") {
            speed = 1000;
        }
        else{
            speed = speed * 1000;
        }
        
        go = true;
        if($app == 'app1'){
            var numframe = 671484;
            var numpacket = 15261;
            if(newround == true){
                var timeRem = 8;
                var timeRemFixed = timeRem;
                var timeElap = 0;
                var packetRem = numpacket;
                var packetSent = 0;
                var frameRem = numframe;
                var frameSent = 0;
            }
            else{
                //alert('else');
                var dataString4 = 'cable1='+ $cable + '&index=' + $r ;
                $.ajax({
                    type: "POST",
                    url: "tempVarAjax.php",
                    data: dataString4,
                    cache: false,
                    success: function(result){
                        //alert(result);
                        var r = result.split(",");
                        //alert(r);
                        timeRem = parseInt(r[0]);
                        timeElap = parseInt(r[1]);
                        packetRem = parseInt(r[2]);
                        frameRem = parseInt(r[3]);
                        packetSent = parseInt(r[4]);
                        frameSent = parseInt(r[5]);
                        timeRemFixed = 8;
                        //alert(timeRem + timeElap);
                    }
                });

            }
        }
        else{
            var numframe = 6714708;
            var numpacket = 152607;
            if(newround == true){
                var timeRem = 75;
                var timeRemFixed = timeRem;
                var timeElap = 0;
                var packetRem = numpacket;
                var packetSent = 0;
                var frameRem = numframe;
                var frameSent = 0;
            }
            else{
                //alert('else');
                var dataString4 = 'cable1='+ $cable + '&index=' + $r ;
                $.ajax({
                    type: "POST",
                    url: "tempVarAjax.php",
                    data: dataString4,
                    cache: false,
                    success: function(result){
                        //alert(result);
                        var r = result.split(",");
                        //alert(r);
                        timeRem = parseInt(r[0]);
                        timeElap = parseInt(r[1]);
                        packetRem = parseInt(r[2]);
                        frameRem = parseInt(r[3]);
                        packetSent = parseInt(r[4]);
                        frameSent = parseInt(r[5]);
                        timeRemFixed = 8;
                        //alert(timeRem + timeElap);
                    }
                });

            }
        }
        newround = false;
        var num = $cable[5];
        intervalID = setInterval(function() {

                if(!go)
                    return;
                if(timeRem > 0){
                    timeRem = timeRem - 1;
                    if (timeRem < 0)
                        timeRem = 0;
                }
                //$('#mtimerem').html(timeRem + " s");
                //temptimeRem = timeRem;
                if(timeElap + 1 <= timeRemFixed){
                    timeElap = timeElap + 1;
                }
                else timeElap = timeRemFixed;
                //$('#mtimeelapse').html(timeElap + " s");
                //temptimeElap = timeElap;

                if(timeRem != 0){
                    packetRem = packetRem - 2001;
                    //alert(packetRem);
                    packetSent = packetSent + 2001;
                    frameRem = frameRem - 88011;
                    frameSent = frameSent + 88011;
                    var type2 = 'update';
                    var dataString2 = 'cable1='+ $cable + '&type1=' + type2 + '&timeRem=' + timeRem + '&timeElap=' + timeElap+ '&packetRem=' + packetRem + '&frameRem=' + frameRem + '&packetSent=' + packetSent + '&frameSent=' + frameSent + '&index=' + $r;
                    $.ajax({
                        type: "POST",
                        url: "monitorIndex.php",
                        data: dataString2,
                        cache: false,
                        success: function(result){
                            //alert(result);
                        }
                    });
                }
                else{
                    //alert($cable + "time remain is 0");
                    packetRem = 0;
                    frameRem = 0;
                    packetSent = numpacket;
                    frameSent = numframe;
                    var type2 = 'update';
                    var dataString2 = 'cable1='+ $cable + '&type1=' + type2 + '&timeRem=' + timeRem + '&timeElap=' + timeElap+ '&packetRem=' + packetRem + '&frameRem=' + frameRem + '&packetSent=' + packetSent+ '&frameSent=' + frameSent + '&index=' + $r;

                    $.ajax({
                        type: "POST",
                        url: "monitorIndex.php",
                        data: dataString2,
                        cache: false,
                        success: function(result){
                            //alert(result);
                        }
                    });
                    newround = true;
                    //for (i = 0; i < interVal.length; i++) {
                        $num = $cable[5];
                        // setTimeout(function(){
                        // }, 10000000); 
                        // clearInterval(interVal[0]);
                        // interVal.splice(0, 1 );
                        //alert('Simulation at ' + $cable + ' is finished');

                    //}
                    //window.clearInterval(intervalID);
                    finished = true;
                }
         }, speed);
        interVal.push(intervalID);
        //alert(interValArray);
    }

    function stopTimer(){
        go = false;
        // for (i = 0; i < interVal.length; i++) {
        //     window.clearInterval(interVal[i]);
        // }
    }

    function continueTimer(){
        go = true;
        // $.ajax({
        //     type: "POST",
        //     url: "getCableAjax.php",
        //     //data: dataString3,
        //     cache: false,
        //     success: function(result){
        //         newround = false;
        //         var r = result.split(",");
        //         for(i = 0; i < r.length; i++){
        //             startTimer(r[i]);
        //         }
        //     }
        // });
        
    }



});
//----------------------------------------------------------







