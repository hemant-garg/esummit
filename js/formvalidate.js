
$(document).ready(function(){
    
     
   
    $('#register-form-1 input[type="radio"]').click(function(){
            if($("#radio-1").prop("checked") == true){
                $('#register-form-1 #price').text('150');
                $('#register-form-1 input[type="checkbox"]').parent().css('opacity', '1');
                $('#register-form-1 input[type="checkbox"]').attr('disabled', false);
                if($('#register-form-1 input[type="checkbox"]').prop("checked") == true){
                    $('#register-form-1 #price').text('0');
                }
            }
            else if($("#radio-2").prop("checked") == true){
                $('#register-form-1 #price').text('250');
                $('#register-form-1 input[type="checkbox"]').parent().css('opacity', '0.3');
                $('#register-form-1 input[type="checkbox"]').attr('disabled', true);
                $('#register-form-1 input[type="checkbox"]').prop('checked', false);
            }
        });
     $('#register-form-1 input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#register-form-1 #price').text('0');
            }
            else if($(this).prop("checked") == false){
                $('#register-form-1 #price').text('250');
                if($("#radio-1").prop("checked") == true){
                    $('#register-form-1 #price').text('150');
                }
            }
        });


            var fileInput  = document.querySelector( ".input-file" ),  
                button     = document.querySelector( ".input-file-trigger" ),
                the_return = document.querySelector(".file-return");
                  
            button.addEventListener( "keydown", function( event ) {  
                if ( event.keyCode == 13 || event.keyCode == 32 ) {  
                    fileInput.focus();  
                }  
            });
            button.addEventListener( "click", function( event ) {
               fileInput.focus();
               return false;
            });  
            fileInput.addEventListener( "change", function( event ) {  
                the_return.innerHTML = this.value;  
            });  

   

    $('#register-form-1 #submit').on('click', function(e) {
        // e.preventDefault();
            var username = $("#register-form-1 #username").val();
            var usermobile = $("#register-form-1 #usermobile").val();
            var useremail = $("#register-form-1 #useremail").val();
            var useryos = $("#register-form-1 #useryos").val();
            var usercollege = $("#register-form-1 #usercollege").val();
            var usercourse = $("#register-form-1 #usercourse").val();

            var name_regex = /^^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$$/;
            var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            var number_regex = /^[789]\d{9}$/;
            var message = '';
            
           

            if (username.length == 0 || useremail.length == 0 || usermobile.length == 0 || useryos.length == 0 || usercollege.length == 0 || usercourse.length == 0) {
                message+="* All fields are mandatory *";
                $('.formmessage').text(message);
                return false;
            }
                
            else if($('input[name="msitcollege"]:checked').length<=0){
                 message+="* All fields are mandatory *";
                $('.formmessage').text(message);
                return false;
            }
            else if (!username.match(name_regex) || username.length == 0) {
                message+="* Please enter a valid name *";
                $('.formmessage').text(message);
                $("#username").focus();
                return false;
            }
            else if (!usermobile.match(number_regex) || usermobile.length == 0) {
                message+="* Please enter a valid mobile number *";
                $('.formmessage').text(message); 
                $("#usermobile").focus();
                return false;
             }
            else if (!useremail.match(email_regex) || useremail.length == 0) {
                message+="* Please enter a valid email address *";
                $('.formmessage').text(message); 
                $("#useremail").focus();
                return false;
             }
                 
            else if (typeof ($("#my-file")[0].files) != "undefined") {
                var size = parseFloat($("#my-file")[0].files[0].size / 1024).toFixed(2);
                if(size>500){
                    message+= "** File size must be less than 500kb **";
                }
                $('.formmessage').text(message); 
                console.log("file error");
                return false ;
            } 
            else{
                console.log("Validation passsed")
                return true;
            }
    });


    $('#register-form-2 #submit').on('click', function(e) {
        e.preventDefault();
            var starname = $("#register-form-2 #starname").val();
            var starmobile = $("#register-form-2 #starmobile").val();
            var staremail = $("#register-form-2 #staremail").val();
            var organization = $("#register-form-2 #organization").val();
            var designation = $("#register-form-2 #designation").val();
            

            var name_regex = /^[a-zA-Z]+$/;
            var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            var number_regex = /^[789]\d{9}$/;
            var message = '';
            
           

            if (starname.length == 0 || staremail.length == 0 || starmobile.length == 0 || organization.length == 0 || designation.length == 0) {
                message+="* All fields are mandatory *";
                $('.formmessage').text(message);
                return false;
                }
                
               
                 if (!starname.match(name_regex) || starname.length == 0) {
                    message+="* For your name please use alphabets only *";
                    $('.formmessage').text(message);
                    $("#starname").focus();
                    return false;
                }
                else if (!starmobile.match(number_regex) || starmobile.length == 0) {
                    message+="* Please enter a valid mobile number *";
                    $('.formmessage').text(message); 
                    $("#starmobile").focus();
                    return false;
                 }
                else if (!staremail.match(email_regex) || staremail.length == 0) {
                    message+="* Please enter a valid email address *";
                    $('.formmessage').text(message); 
                    $("#staremail").focus();
                    return false;
                 }
               
                 $('.formmessage').text(message); 
    });
});


