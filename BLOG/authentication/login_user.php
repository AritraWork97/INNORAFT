<?php

require_once '../../../../.cred/db_auth.php';
include_once '../validation.php';

$check_password = "";
session_start();

if(isset($_POST['Submit'])){
    $email = test_input($_POST['email']);
    $password = test_input($_POST['Password']);

    //print_r($email);

    $sql_user_details = "SELECT user.userid, user.user_pass FROM user where user.user_email = '$email'";
    $result = $conn->query($sql_user_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['userid'];
                    $check_password = $row['user_pass'];
                }
                mysqli_free_result($result);
                print_r($id);
                print_r($check_password);
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

        $_SESSION['Active'] = true;
        header("location:../index.php");
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
