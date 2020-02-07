var firstname = document.getElementById("firstname");
var lastname = document.getElementById("lastname");
var textarea = document.getElementById("para1");
var phone = document.getElementById("phone");
var form = document.getElementById("form-element");

firstname.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123))
}

lastname.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123))
}

textarea.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123) ||
           (event.charCode > 48 && event.charCode <= 57) || event.charCode == 124 || event.charCode == 13)
}

lastname.onblur = function(){
   var fname= document.getElementById("firstname").value;
   var sname= document.getElementById("lastname").value;
    if((fname.length == 1 || sname.length == 1))
    {
      console.log("onblur working on if"); 
    }
    else
    {
      fullname.value= fname+' '+sname;
       console.log("onblur working")
    }
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

form.onsubmit = function(){
   var fname= document.getElementById("firstname").value;
   var sname= document.getElementById("lastname").value;
   var phone= document.getElementById("phone").value;
   if((fname.length == 1 || sname.length == 1 ||(phone.length < 10 || phone.length > 14)))
    {
      return false
    }
    else
    {
      return true;
    }

}


