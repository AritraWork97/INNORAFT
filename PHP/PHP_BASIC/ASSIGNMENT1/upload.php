<?php

        
         // define variables and set to empty values
         $firstnameErr = $lastnameErr = "";
         $firstname = $lastname = $fullname = "";
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
               $firstnameErr = "First Name is required";
            }else {
               $firstname = test_input($_POST["firstname"]);
            }
            if (empty($_POST["lastname"])) {
               $lastnameErr = "Last name is required";
            }else {
               $lastname = test_input($_POST["lastname"]);
            }
            if( preg_match( '/\d/', $firstname) ||  preg_match( '/\d/',$lastname) || 
                preg_match('/[^a-zA-Z\d]/', $firstname) || preg_match('/[^a-zA-Z\d]/', $lastname)){
                   echo '<script type="text/JavaScript">  
                         prompt("Invalid name given"); 
                         </script>' ;
           }

            $fullname = $firstname.' '.$lastname;
      }
?>
<?php
      echo "<p><a class='btn btn-lg btn-success' href='../LOGIN/logout.php' role='button'>Log out</a></p>";
      echo "<h1>Hello $fullname</h1>";
?>