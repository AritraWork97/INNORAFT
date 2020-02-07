<?php

session_start(); /* Starts the session */
$requested_route = "";

if(array_key_exists("Active",$_SESSION)){ /* Redirects user to Login.php if not logged in */
     if(isset($_GET["q"])){
      $requested_route = $_GET["q"];
      if($requested_route === '1')
      {
         header("location:../ASSIGNMENT1/index.php");
         exit;
      }
      else if($requested_route === '2')
      {
         header("location:../ASSIGNMENT2/index.php");
         exit;
      }
      else if($requested_route === '3')
      {
         header("location:../ASSIGNMENT3/index.php");
         exit;
      }
      else if($requested_route === '4')
      {
         header("location:../ASSIGNMENT4/index.php");
         exit;
      }
      else if($requested_route === '6')
      {
         header("location:../ASSIGNMENT6/index.php");
         exit;
      }
   }    
}
else {
   header("location:../LOGIN/login.php");
   exit;
}

?>


<html> 
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   <body> 
   <p><a class="btn btn-lg btn-success" href="../LOGIN/logout.php" role="button">Log out</a></p>
      <div class="form-div">
      <form id="form-element" action="upload.php" method="POST" enctype="multipart/form-data">
         <table>
         <tr>
               <td>First Name:</td>
               <td><input required type = "text" id="firstname" name = "firstname">
               </td>
            </tr> 
            <tr>
               <td>Last Name: </td>
               <td><input required id="lastname" type = "text" name = "lastname" id="lastname">
               </td>
            </tr>
            <tr>
               <td>Phone Number: </td>
               <td><input required type="input" id="phone" name="phone">
               </td>
            </tr>
            <tr>
            <tr>
               <td>Email:</td>
               <td><input required type = "text" name = "email" id="email">
               </td>
            </tr>
            <tr>
               <td>Full Name: </td>
               <td><input  id="fullname" disabled="disabled" type = "text" name = "fullname">
               </td>
            </tr> 
            <tr>  
               <td>Text area : </td>
               <td>
                  <textarea required cols="10" rows="10" name="comments" id="para1">
                  </textarea><br>
               </td>
            </tr>
            <tr>  
               <td>Upload Image : </td>
               <td>
               <input required type="file" name="image">
               </td>
            </tr>
            <tr>
               <td>
                  <input type="submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
         </table>
      </form>
    </div>
   </body>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script type="text/javascript" src="./script.js"></script>
</html>