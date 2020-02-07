<?php

include_once "../dbconfig.php";

      session_start(); /* Starts the session */
      if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
         header("location:LOGIN/login.php");
         exit;
        }
        else
        {
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
             }
            $username = $_SESSION['Username'];
            if(isset($_POST['password'])) {
                $pass = test_input($_POST['password']);
                $new_pass = test_input($_POST['newpass']);
            
                $sql_get_seq_ques = "UPDATE user_details_table SET pass = '$pass' WHERE Username = '$username'";
            
                if ($conn->query($sql_get_seq_ques) === TRUE) {
                   echo "Right";
                } else {
                    echo "Error: ". $conn->error;
                }
            } else {
                echo "Not right";
            }
            
        }


?>