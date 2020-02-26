var phone = document.getElementById("mobile_number");

phone.onkeypress = function(){
    return ((event.charCode > 48 && event.charCode <= 57) ||  event.charCode == 43)
 }