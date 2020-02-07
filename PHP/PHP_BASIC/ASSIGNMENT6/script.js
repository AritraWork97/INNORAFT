var firstname = document.getElementById("firstname");
var lastname = document.getElementById("lastname");
var textarea = document.getElementById("para1");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var form = document.getElementById("form-element");

firstname.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123))
}

lastname.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123))
}

lastname.onblur = function(){
   var fname= document.getElementById("firstname").value;
   var sname= document.getElementById("lastname").value;
    if(fname.length > 1 || sname.length > 1)
    {
      fullname.value= fname+' '+sname; 
    }
}

textarea.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123) ||
           (event.charCode > 48 && event.charCode <= 57) || event.charCode == 124 || event.charCode == 13)
}

phone.onkeypress = function(){
   return ((event.charCode > 48 && event.charCode <= 57) ||  event.charCode == 43)
}

phone.onblur = function() {
   var phone= document.getElementById("phone").value;
   if(phone.length < 10 || phone.length > 14) {
      alert("Invalid Phone number");
   }
}

email.onblur = function() {
   var email= document.getElementById("email").value;
   if(email.length <=4) {
      alert("Enter a valid email");
   }
}

form.onsubmit = function(){
   var fname= document.getElementById("firstname").value;
   var sname= document.getElementById("lastname").value;
   var phone= document.getElementById("phone").value;
   var email= document.getElementById("email").value;

   if(fname.length <= 1 || sname.length <= 1 || (phone.length < 10 || phone.length > 14) || email.length <= 3)
   {
      console.log("form error");
      return false;
   }
   else
   {
      return true;
   }
}