<?php

      session_start(); /* Starts the session */
      if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
         header("location:LOGIN/login.php");
         exit;
        }
        else
        {
            header("Location:ASK_SECURITY/index.html");
        }
?>