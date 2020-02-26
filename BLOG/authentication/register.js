var phone = document.getElementById("mobile_number");

phone.onkeypress = function(){
    return ((event.charCode > 48 && event.charCode <= 57) ||  event.charCode == 43)
 }

 phone.onblur = function() {
    var phone_val= document.getElementById("mobile_number").value;
    if(phone_val.length < 10 || phone_val.length > 14) {
       alert("Invalid Phone number");
    }
 }