var firstname = document.getElementById("firstname");
var lastname = document.getElementById("lastname");
var fullname = document.getElementById("fullname");
var textarea = document.getElementById("para1");
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

textarea.onkeypress = function() {
   return ((event.charCode > 64 && event.charCode < 91) ||(event.charCode > 96 && event.charCode < 123) ||
           (event.charCode > 48 && event.charCode <= 57) || event.charCode == 124 || event.charCode == 13)
}

form.onsubmit = function(){
   var fname= document.getElementById("firstname").value;
   var sname= document.getElementById("lastname").value;
   if((fname.length == 1 || sname.length == 1))
    {
      return false
    }
    else
    {
      return true;
    }

}
