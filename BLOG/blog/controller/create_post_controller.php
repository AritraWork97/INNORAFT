<?php

include_once '../../validation.php';
include_once '../../../../../.cred/db_auth.php';

include_once '../model/blog.php';

session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../../authentication/login.html");
    exit;
   }

   $target_path = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $blog_title = test_input($_POST['title']);
    $blog_content = test_input($_POST['content']);
    $current_time = date("Y/m/d");
    $userid = $_SESSION['userid'];
    $author_name = $_SESSION['username'];
    $blog_post_id = time();
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
        $new_target_path = 'BLOG/blog/controller/uploads/'. basename($new_file_name);
        
        if(empty($errors)==true){
            echo "vbb";
           move_uploaded_file($file_tmp,$target_path);
        }else{
           print_r($errors);
        }
     }


 
    $new_post = new post($author_name, $blog_title, $blog_content, $current_time);

    print_r($userid);

    $sql_insert_blog_post = "insert into blog_post values('$userid','$blog_post_id','$author_name',
                                                          '$blog_title', '$current_time', '$blog_content', '$new_target_path')";
            if($conn->query($sql_insert_blog_post) == true){
                header("location:../view/index.php");
            } else {
            echo $conn->error;
            echo "<br>";
            }
         }

?>