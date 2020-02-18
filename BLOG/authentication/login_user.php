<?php

require_once '../../../../.cred/db_auth.php';
include_once '../validation.php';

$check_password = "";
session_start();

if(isset($_POST['Submit'])){
    $email = 'banerjeeamit778@gmail.com';//test_input($_POST['email']);
    $password = test_input($_POST['Password']);

    //print_r($email);

    $sql_user_details = "SELECT user.userid, user.user_pass, user.user_first_name, user.user_last_name FROM user where user.user_email = '$email'";
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
    if( $result1 === true)  {

        /* Success: Set session variables and redirect to protected page */
        $_SESSION['userid'] = $id;
        $_SESSION['username'] = $name;

        $_SESSION['Active'] = true;
        header("location:../blog/index.php");
        exit;

    } else {
        ?>
        &nbsp;
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Incorrect information.
        </div>
        <?php
    }
}
