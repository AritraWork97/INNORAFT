<?php

require_once '../../../../.cred/db_auth.php';
include_once '../validation.php';

$check_password = "";
session_start();

if(isset($_POST['Submit'])){
    $email = test_input($_POST['email']);
    $password = test_input($_POST['Password']);

    //print_r($email);

    $sql_user_details = "SELECT userid, user_pass, user_first_name, user_last_name FROM user where user_email='".$email."'";
    $result = $conn->query($sql_user_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['userid'];
                    $check_password = $row['user_pass'];
                    $name = $row['user_first_name'].' '.$row['user_last_name'];
                }
                mysqli_free_result($result);
            } 
        } else {
        echo "ERROR: Could not able to execute";
        }


    // Rudimentary hash check
    $result1 = password_verify($password, $check_password);

    /* Check if form's username and password matches */
    if( $result1 === TRUE)  {

        /* Success: Set session variables and redirect to protected page */
        $_SESSION['userid'] = $id;
        $_SESSION['username'] = $name;

        $_SESSION['Active'] = true;
        header("location:../home.php/index");
        exit;

    } else {
<<<<<<< HEAD
        $loc = '../home.php/login';
=======
        $loc = './login.html';
>>>>>>> 6bba633fd45e5559b6858264e96878da44eff76b
        echo "<script>";
        echo " if(confirm('Invalid credentials, you are being redirected back to the login page'))
                {
                    window.location.href = '$loc';
                }
                </script>";
    }
}