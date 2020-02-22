<?php

require_once '../../../../.cred/db_auth.php';
require_once '../validation.php';

session_start();

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
         $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email.'');  
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
         $json = curl_exec($ch);
         curl_close($ch);
         $validationResult = json_decode($json, TRUE);
         if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
          echo "asdsa";
         } else {
            $loc = 'register.html';
            echo "<script>";
            echo " if(confirm('Invalid email, you are being redirected back to the register page'))
                    {
                        window.location.href = '$loc';
                    }
                    </script>";
         }
        
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
     if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $tmp = explode('.',$file_name);
      $file_ext=strtolower(end($tmp));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      $new_file_name = md5(uniqid(rand(), true)).'.'.$file_ext;
      $target_path = 'uploads/'. basename($new_file_name);
      $new_target_path = '../authentication/uploads/'. basename($new_file_name);
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$target_path);
      }else{
         print_r($errors);
      }
   }
 }

 if($password === $check_password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 }

 $userid = md5($mobile);
 $name = $firstname.' '.$lastname;

 $sql_insert_user_table = "insert into user values('$userid','$firstname','$lastname', '$hashed_password', '$address', '$mobile', '$email', '$new_target_path')";
        if($conn->query($sql_insert_user_table) == true){
        /* $_SESSION['userid'] = $userid;
         $_SESSION['username'] = $name;
 
         $_SESSION['Active'] = true;
         header("location:../blog/index.php");
         exit;*/
        } else {
           echo $conn->error;
           echo "<br>";
        }

?>