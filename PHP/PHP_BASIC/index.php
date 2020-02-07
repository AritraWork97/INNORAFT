<?php


      session_start(); /* Starts the session */
      if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
         header("location:LOGIN/login.php");
         exit;
         }
         else
         {
            if(isset($_GET["q"])){
               $requested_route = $_GET["q"];
               if($requested_route === '1')
               {
                  header("location:./ASSIGNMENT1/index.php");
                  exit;
               }
               else if($requested_route === '2')
               {
                  header("location:./ASSIGNMENT2/index.php");
                  exit;
               }
               else if($requested_route === '3')
               {
                  header("location:./ASSIGNMENT3/index.php");
                  exit;
               }
               else if($requested_route === '4')
               {
                  header("location:./ASSIGNMENT4/index.php");
                  exit;
               }
               else if($requested_route === '6')
               {
                  header("location:./ASSIGNMENT6/index.php");
                  exit;
               }
            }
         }
?>

<html>
   <head>
   </head>
   <body> 
      <p><a  href="./LOGIN/logout.php" role="button">Log out</a></p>
      <p><a  href="./ASSIGNMENT1/index.php" role="button">ASSIGNMENT 1</a></p>
      <p><a  href="./ASSIGNMENT2/index.php" role="button">ASSIGNMENT 2</a></p>
      <p><a  href="./ASSIGNMENT3/index.php" role="button">ASSIGNMENT 3</a></p>
      <p><a  href="./ASSIGNMENT4/index.php" role="button">ASSIGNMENT 4</a></p>
      <p><a  href="./ASSIGNMENT5/index.php" role="button">ASSIGNMENT 5</a></p>
      <p><a  href="./ASSIGNMENT6/index.php" role="button">ASSIGNMENT 6</a></p>    
   </body>
</html>