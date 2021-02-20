$(function(){
    
    $('.signupt').click(function(){
        $('.login').hide();
        $('.sigin').show(); 
        $('.signupt').addClass('active');
        $('.logint').removeClass('active');
    });
    $('.logint').click(function(){
        $('.sigin').hide();
        $('.login').show(); 
        $('.logint').addClass('active');
        $('.signupt').removeClass('active');
    });
    $('.form-control').blur(function(){
       if($(this).val().length === 0){
           $(this).css('border-bottom','2px solid #cc3300');
       }else{
           $(this).css('border-bottom','2px solid #666');
       }
    });
    $('#send').click(function(e){
       var fnameError=true,
            lnameError=true,
            emailError=true,
            passError = true,
            phoneError= true;
        if($('#fname').val().length < 3){
            $(this).css('border-bottom','2px solid #cc3300');
            fnameError = true;
        }else{
            $(this).css('border-bottom','2px solid #666');
            fnameError = false;
        }
        if($('#lname').val().length < 3){
            $(this).css('border-bottom','2px solid #cc3300');
            lnameError = true;
        }else{
            $(this).css('border-bottom','2px solid #666');
            lnameError = false;
        }
        if($('#email').val().length < 8 || !$('#email').val().includes('.')
            || !$('#email').val().includes('@')){
            $(this).css('border-bottom','2px solid #cc3300');
            emailError = true;
        }else{
            $(this).css('border-bottom','2px solid #666');
            emailError = false;  
        }
        if($('#password').val().length < 8){
            $(this).css('border-bottom','2px solid #cc3300');
            passError = true;
        }else{
            $(this).css('border-bottom','2px solid #666');
            passError = false;  
        }
        if($('#phone').val().length < 11){
            $(this).css('border-bottom','2px solid #cc3300');
            phoneError = true;
        }else{
            $(this).css('border-bottom','2px solid #666');
            phoneError = false; 
        }
    });
    $('#sendlogin').click(function(e){
        var mailError = true;
        var passError = true;
        if($('#loginemail').val().length < 3){
            $('#loginemail').css('border-bottom','2px solid #cc3300');
            mailError = true;
        }else{
            $('#loginemail').css('border-bottom','2px solid #666');
            mailError = false;
        }
        if($('#loginpassword').val().length < 8){
            $('#loginpassword').css('border-bottom','2px solid #cc3300');
            passError = true;
        }else{
            $('#loginpassword').css('border-bottom','2px solid #666');
            passError = false;
        }
        if(mailError==true || passError==true)
            e.preventDefault(); 
    });
    $('#show').hover(function(){
        $('#password').attr('type','text');
    },function(){
        $('#password').attr('type','password');
    });
    $('#show2').hover(function(){
        $('#loginpassword').attr('type','text');
    },function(){
        $('#loginpassword').attr('type','password');
    });
    $('#input2to').blur(function(){
        var value = $(this).val();
        $(this).attr("value",value);
    });
    $('.choice').click(function(){
        $('.option').hide();
        $(this).siblings('.option').show();
       //$(this).parent().parent().parent().parent().siblings('.col-sm-3').find('.option').hide();
        // $(this).parent().parent().parent().siblings('.col-sm-3').find('.option').hide();
    });
    $('.terminale').click(function(){
        $(this).parent().parent().parent().hide(); 
    });
    
    var i=0;
    $('.new').click(function(){
        $(this).hide();
        $(this).siblings('.addingnewlist').show();
    });
    $('.terminallist').click(function(){
        $(this).parent().hide();
        $(this).parent().siblings('.new').show();
    });
    // var ele = 'new " +
     $('.new' + i).click(function(){
        $(this).hide();
        $(this).siblings('.addingnewlist' + i).show();
     });
        function insertIntoBoard(Name){
        $.ajax({
            url : "manageBoard.php?action=addboard&name="+Name,
            type : "GET",
            cache : false,
        });
        location.reload();
    }   
    $('#adding').click(function(e){
        if($(this).siblings('.form-group').children().val().length > 0){
            //$("<div class='col-md-3 col-sm-6 col-xs-6'><div class='todo addingnewlist"+i+"'+" +"><div class='form-group'><input class='form-control' type='text' name='newlist"+i+"'+" +" id='newlist" + i +"'+" +"placeholder='Enter List title...'></div><input type='submit' class='btn btn-success btn btn-md' value='Add List' id='adding'><span class='terminal'>X</span></div></div>").insertBefore($(".addingnewlist").parent());
            // $("<div class='col-md-3 col-sm-6 col-xs-6><div class='new'><span><i class='fa fa-plus' aria-hidden='true'></i></span><span>Add anthor list</span></div><div class='todo addingnewlist'><div class='form-group'><input class='form-control' type='text' name='newlist' id='newlist' placeholder='Enter List title...'></div><input type='submit' class='btn btn-success btn btn-md' value='Add List' id='adding'><span class='terminal'>X</span></div></div>")         
            $('.addingnewlist').hide();
            $('.new').show();
            var value = $(this).siblings('.form-group').children().val();
             //$('#newlist' + i).attr('value',value);
             //$('#newlist').val("");
             insertIntoBoard(value);
             //var id = $(this).siblings('.form-group').children().attr('id');

            i++;
        }else{
            e.preventDefault();
        }
    });
    $('.addingnewboard').click(function(){
        alert("adding new board");
    })
    $('.thewholediv').click(function(){
        $('.thewholediv').show();
        $(this).hide();
        $('.addingnewcardbody').hide();
        $(this).siblings('.addingnewcardbody').show();
    });
    $('.cradterminal').click(function(){
        $(this).parent().parent().parent().hide();
        $(this).parent().parent().parent().siblings('.thewholediv').show();
    });
    function senddata(Name,board){
        $.ajax({
            url : "manageBoard.php?action=add&name="+Name+"&board="+board,
            type : "GET",
            cache:false,
            success: function(result){
                $("#test").html(result);
            }
        });
    }
    $('.sumbitthetitle').click(function(e){
        var boardName = $(this).parent().parent().parent().parent().siblings('.todohead').children().children().val();
        var textAreaContent = $(this).parent().siblings('textarea').val();
        if($(this).parent().siblings('textarea').val().length >=3){
            $("<div class='form-group' class='output'><input type='text' class='form-control forstyling' value='" + textAreaContent + "'></div>").insertBefore($(this).parent().parent());
            senddata(textAreaContent,boardName);
            $(this).parent().siblings('textarea').val("");
            $.ajax({
                url : "index.php",
                method : "POST",
                cache : false,
            });
        }else{
            e.preventDefault();
        }
    });
    $('.Movement').click(function(){
        $(this).next('.showdirection').show(400); 
        // alert($(this).parent().attr('class')
        $(this).parent().css({
            height: "116px",
        });
    });
    $('.Movement').dblclick(function(){
         $(this).next('.showdirection').hide(400); 
         $(this).parent().css({
            height: "65px",
        });
    })
    function moveCard(targetListId , cardName){
        $.ajax({
                // url : "manageBoard.php?action=add&name="+Name+"&board="+board
            url :"manageBoard.php?action=Moving&target="+targetListId+"&card="+cardName,
            type:"GET",
            cache : false,
           success: function(result){
                $("#test").html(result);
            } 
        });
        $.ajax({
            url : "index.php",
            method : "POST",
            cache : false,
        });
    }
    $('.inputmove').click(function(){
        var id = $(this).next('.hiddeninput').val();
        var cardName = $(this).parent().siblings('.form-group').find('.forstyling').val();
        moveCard(id , cardName);
        window.location.reload();
    });
    // options codes //
    $('.optionbody .add').click(function(){
        // $(this).siblings('.addingnewlist').show();
        // $(this).thewholediv
        $(this).parent().parent().parent().siblings('.todobody').find('.thewholediv').hide();
        $(this).parent().parent().hide();
        $(this).parent().parent().parent().siblings('.todobody').find('.addingnewcardbody').show();
    });
    function getdata(){
        $.ajax({
            url : "sendnotification.php",
            type :"POST",
        });
    }
   setInterval(function () {
        getdata();
    },100000)
});