var phone = document.getElementById("mobilenumber");
var userform = document.getElementById("userform");

var error = [];

phone.onkeypress = function(){
    return ((event.charCode > 48 && event.charCode <= 57) ||  event.charCode == 43)
 }

 phone.onblur = function() {
    var phone_val= document.getElementById("mobilenumber").value;
    if(phone_val.length < 10 || phone_val.length > 14) {
       alert("Invalid Phone number");
    }
 }

 $(document).ready(function(){

$("#reenter_password").attr("disabled", "true");
   
$('#firstname').blur(function(){
  var firstname = $('#firstname').val();
  $.ajax({
   type: 'POST',
   url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
   data: {"firstname" : firstname},
   success: function(response){
      if(response == "true")
      {
         $('#firstname').css('border', '5px solid green');
         $('#submit').attr("disabled", false);
      } else {
         $('#firstname').css('border', '5px solid red');
         $('#submit').attr("disabled", true);
      }
   }
  });

});

 $('#lastname').blur(function(){
   var lastname = $('#lastname').val();
   $.ajax({
    type: 'POST',
    url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
    data: {"lastname" : lastname},
    success: function(response){
       if(response == "true")
       {
         $('#lastname').css('border', '5px solid green');
         $('#submit').attr("disabled", false);
       } else {
         $('#lastname').css('border', '5px solid red')
         $('#submit').attr("disabled", true);
       }
    }
   });
 
});

$('#password').blur(function(){
   var password = $('#password').val();
   $.ajax({
    type: 'POST',
    url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
    data: {"password" : password},
    success: function(response){
       if(response == "true")
       {
         $('#password').css('border', '5px solid green');
         $('#submit').attr("disabled", false);
         $("#reenter_password").attr("disabled", false);
       } else {
         $('#password').css('border', '5px solid red')
         $('#submit').attr("disabled", true);
         console.log(response);
       }
    }
   });
 
});

$('#reenter_password').blur(function(){
   var check_password = $('#reenter_password').val();
   var password = $("#password").val();
   $.ajax({
    type: 'POST',
    url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
    data: {"password" : password,
          "check_password" : check_password},
    success: function(res){
       if(res == "truetrue")
       {
         $('#reenter_password').css('border', '5px solid green');
         $('#submit').attr("disabled", false);
       } else {
         $('#reenter_password').css('border', '5px solid red')
         $('#submit').attr("disabled", true);
         console.log(res);
       }
    }
   });
 
  });

  $('#email').blur(function(){
   var email = $('#email').val();
   $.ajax({
    type: 'POST',
    url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
    data: {"email" : email},
    success: function(response){
       if(response == "true")
       {
         $('#email').css('border', '5px solid green')
         $('#submit').attr("disabled", false);
       } else {
         $('#email').css('border', '5px solid red')
         $('#submit').attr("disabled", true);
       }
    }
   });
});
   

   $('#mobilenumber').blur(function(){
      var mobile = $('#mobilenumber').val();
      $.ajax({
       type: 'POST',
       url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
       data: {"mobilenumber" : mobile},
       success: function(response){
          if(response == "true")
          {
            $('#mobilenumber').css('border', '5px solid green')
            $('#submit').attr("disabled", false);
          } else {
            $('#mobilenumber').css('border', '5px solid red')
            $('#submit').attr("disabled", true);
            console.log(response);
          }
       },
       error : (e) => {
         alert("error");
       }
      });
    
     });

  $('#address').blur(function(){
   var address = $('#address').val();
   $.ajax({
    type: 'POST',
    url : 'http://localhost/PHP/BLOG/authentication/form_validation.php',
    data: {"address" : address},
    success: function(response){
       if(response == "true")
       {
         $('#address').css('border', '5px solid green')
         $('#submit').attr("disabled", false);
       } else {
         $('#address').css('border', '5px solid red')
         $('#submit').attr("disabled", true);
       }
    }
   });
 
  });
});