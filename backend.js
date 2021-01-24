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
        $(this).siblings('.option').show();
       //$(this).parent().parent().parent().parent().siblings('.col-sm-3').find('.option').hide();
        $(this).parent().parent().parent().siblings('.col-sm-3').find('.option').hide();
    });
    $('.terminale').click(function(){
        $(this).parent().parent().parent().hide(); 
    });
     $(function () {
        $(".todo").draggable();
    });
    $('.new').click(function(){
        $(this).hide();
        $(this).siblings('.addingnewlist').show();
    });
    $('#adding').click(function(){
        $($(".addingnewlist").parent()).after(
            "<div class='col-md-3 col-sm-6 col-xs-6'><div class='new'><span><i class='fa fa-plus' aria-hidden='true'></i></span><span>Add anthor list</span></div><div class='todo addingnewlist'><div class='form-group'><input class='form-control' type='text' name='newlist' id='newlist' placeholder='Enter List title...'></div><input type='submit' class='btn btn-success btn btn-md' value='Add List' id='adding'><span class='terminal'>X</span></div></div>");
        //$(".new").insertAfter($(".addingnewlist").parent());
    });

    function getdata(){
        $.ajax({
            url : "sendnotification.php",
            type :"POST",
        });
    }
   setInterval(function () {
        getdata();
    },10000000)
});