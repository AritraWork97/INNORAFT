<?php

require_once '../../../.cred/db_auth.php';
require_once '../validation.php';

session_start();
$errors = array();
$isImage = FALSE;

$firstname = $lastname = $password = $check_password = $mobile = $address = $email = "";
$new_target_path = "";

$hashed_password = "";

   if (empty($_POST["firstname"])) {
       array_push($errors,"First name is required");
    }else {
       $firstname = test_input($_POST["firstname"]);
    }
    if (empty($_POST["lastname"])) {
       array_push($errors,"Last name is required");
    }else {
       $lastname = test_input($_POST["lastname"]);
    }
    if(empty($_POST["address"])){
      array_push($errors,"Address is required");
    }
    else
    {
       $address = test_input($_POST["address"]);
    }
    if(empty($_POST["mobilenumber"])){
      array_push($errors,"Mobile Number is required");
    }
    else
    {
       $mobile = test_input($_POST["mobilenumber"]);
    }
    if(empty($_POST["email"])){
      array_push($errors,"Email is required");
     }
     else
     {
         $email = test_input($_POST["email"]);
     }
     if(empty($_POST["password"])){
      array_push($errors,"Password is required");
     }
     else
     {
        $password = test_input($_POST["password"]);
     }
     if(empty($_POST["reenter_password"])){
      array_push($errors,"Enter the same password is required");
     }
     else
     {
        $check_password = test_input($_POST["reenter_password"]);
     }
     if (isset($_FILES['image'])) {
      $isImage = TRUE;
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
      $target_path = '../BLOG/authentication/uploads/'. basename($new_file_name);
      $new_target_path = 'BLOG/authentication/uploads/'. basename($new_file_name);
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$target_path);
      }else{
         array_push($errors,"Image upload failed");
         print_r($errors);
      }
   }

 if($password === $check_password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $userid = md5($mobile);
    $name = $firstname.' '.$lastname;
    if(empty($errors) == TRUE && $isImage == TRUE) {
            $sql_insert_user_table = "insert into user values('$userid','$firstname','$lastname', '$hashed_password', '$address', '$mobile', '$email', '$new_target_path')";
            if($conn->query($sql_insert_user_table) == true){
                $_SESSION['userid'] = $userid;
                $_SESSION['username'] = $name;
        
                $_SESSION['Active'] = true;
                echo "Successfully inserted";
                header("location:http://aritra.com");
                exit;
            } else {
                $loc = '/authentication/register.html';
                echo "<script>";
                echo " if(confirm('Registration unsuccessfull, try again'))
                          {
                            window.location.href = '$loc';
                          }
                          </script>";
            }
    } else {
            $loc = '/authentication/register.html';
            echo "<script>";
            echo " if(confirm('Wrong information is given in the form.Try again'))
                      {
                        window.location.href = '$loc';
                      }
                      </script>";
            }
    } else {
      $loc = '/authentication/register.html';
            echo "<script>";
            echo " if(confirm('Passwords don't match.Try again'))
                      {
                        window.location.href = '$loc';
                      }
                      </script>";
    }
        