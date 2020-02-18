<?php

require_once '../../../../.cred/db_auth.php';
require_once '../validation.php';

$firstname = $lastname = $password = $check_password = $mobile = $address = $email = "";

$hashed_password = "";

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
    if(empty($_POST["address"])){
       $addressErr = "Write your address";
    }
    else
    {
       $address = test_input($_POST["address"]);
    }
    if(empty($_POST["mobile_number"])){
       $mobileErr = "Write your phone number";
    }
    else
    {
       $mobile = test_input($_POST["mobile_number"]);
    }
    if(empty($_POST["email"])){
        $emailErr = "Write your email";
     }
     else
     {
        $email = test_input($_POST["email"]);
     }
     if(empty($_POST["password"])){
        $passwordErr = "Write your password";
     }
     else
     {
        $password = test_input($_POST["password"]);
     }
     if(empty($_POST["reenter_password"])){
        $check_passwordErr = "Enter same password";
     }
     else
     {
        $check_password = test_input($_POST["reenter_password"]);
     }
 }

 if($password === $check_password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 }

 $userid = md5($mobile);

 $sql_insert_user_table = "insert into user values('$userid','$firstname','$lastname', '$hashed_password', '$address', '$mobile', '$email')";
        if($conn->query($sql_insert_user_table) == true){
            echo "new record added sucessfully into code table";
            echo "<br>";
        } else {
           echo $conn->error;
           echo "<br>";
        }

?>