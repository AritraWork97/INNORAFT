var phone = document.getElementById("mobile_number");
var userform = document.getElementById("userform");

phone.onkeypress = function(){
    return ((event.charCode > 48 && event.charCode <= 57) ||  event.charCode == 43)
 }

 phone.onblur = function() {
    var phone_val= document.getElementById("mobile_number").value;
    if(phone_val.length < 10 || phone_val.length > 14) {
       alert("Invalid Phone number");
    }
 }

 $(document).ready(() => {
    $("#check_data").click((e) => {
       e.preventDefault()
       var data1 = $("#userform").serializeArray();
       $.ajax({
         type: 'POST',
         url: 'register_user.php',
         data: data1,
         success : (response) => {
            $("#userform").submit();
         },
         error : (e) => {
            alert(e);
         }
      })
    })
 })