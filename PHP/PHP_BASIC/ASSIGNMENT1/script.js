var firstname = document.getElementById("firstname");
var lastname = document.getElementById("lastname");
var fullname = document.getElementById("fullname");
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

form.onsubmit = function(){
   var fname= document.getElementById("firstname").value;
   var sname= document.getElementById("lastname").value;
   if((fname.length <= 1 || sname.length <= 1))
    {
      return false
    }
    else
    {
      return true;
    }

}