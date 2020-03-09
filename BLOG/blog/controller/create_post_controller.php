<?php

include_once '../../validation.php';
require_once '../../../../.cred/db_auth.php';

session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:http://aritra.com/authentication/login.html");
    exit;
   }

   $target_path = "";
   $errors = array();
   $blog_content = "";
   $blog_title = "";
   $isImage = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
  global $errors;
  if (isset($_POST['title'])) {
    $blog_title = test_input($_POST['title']);
  }
  if (isset($_POST['content'])) {
    $blog_content = test_input($_POST['content']);
  }
    
    
    $current_time = date("Y/m/d");
    $userid = $_SESSION['userid'];
    $author_name = $_SESSION['username'];
    $blog_post_id = time();
    if(isset($_FILES['image'])){
        $isImage = true;
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $tmp = explode('.',$file_name);
        $file_ext=strtolower(end($tmp));
        print_r($file_ext);
        print_r($file_name);

        if (strlen($file_name) <= 1 || strlen($file_type) <= 1) {
          array_push($errors, 'Error');
        }
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
          array_push($errors, "extension not allowed, please choose a JPEG or PNG file.");
        }
        
        if($file_size > 2097152){
           array_push($errors,'File size must be excately 2 MB');
        }
        $new_file_name = md5(uniqid(rand(), TRUE)).'.'.$file_ext;
        $target_path = '../../BLOG/blog/controller/uploads/'. basename($new_file_name);
        $new_target_path = 'BLOG/blog/controller/uploads/'. basename($new_file_name);
        
        if(empty($errors)==TRUE){
            echo "vbb";
           move_uploaded_file($file_tmp,$target_path);
        }else{
           print_r($errors);
        }
     }
    
    if (empty($errors) && $isImage == true) {
      $sql_insert_blog_post = "insert into blog_post values('$userid','$blog_post_id','$author_name',
      '$blog_title', '$current_time', '$blog_content', '$new_target_path')";
      if($conn->query($sql_insert_blog_post) == TRUE){
        header("location:http://aritra.com");
      } else {
          echo $conn->error;
          echo "<br>";
      }
      echo "Successfull";
    } else {
      $loc = "http://aritra.com";
      echo "<script>";
            echo " if(confirm('There were some errors, redirecting you to home page'))
                    {
                        window.location.href = '$loc';
                    }
                </script>";
    }
  
  }
     
    

?>