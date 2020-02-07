<?php


include_once '../dbconfig.php';

session_start(); /* Starts the session */
      if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
         header("location:LOGIN/login.php");
         exit;
        } else{
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
             }
            
            if(isset($_POST['secq'])) {
                $username = $_SESSION['Username'];
                $seq_que = test_input($_POST['secq']);
            
                $sql_get_seq_ques = "SELECT seq_ques FROM user_details_table WHERE username = '$username'";
                $res = (($conn->query($sql_get_seq_ques))->fetch_assoc());
            
                if ($seq_que == $res['seq_ques']) {
                   header("Location: ../UPDATE_PASSWORD/index.html");
                } else {
                    echo "Error: ". $conn->error;
                }
        }

}

?>