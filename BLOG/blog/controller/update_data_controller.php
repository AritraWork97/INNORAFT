<?php

session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../authentication/login.html");
    exit;
}


include_once '../../validation.php';
include_once '../../../../../.cred/db_auth.php';

$id = $_SERVER['QUERY_STRING'];
$id = substr($id, 9);
$userid = $_SESSION['userid'];
$title = "";
$content = "";
$blog_title = "";
$blog_content = "";
$new_target_path = "";
$prev_image_path = "";
$current_time = "";


$sql_blog_details = "SELECT blog_post.blog_title, blog_post.img_path, blog_post.blog_data FROM blog_post where blog_post.blog_post_id = '$id'";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $content = $row['blog_data'];
                    $prev_image_path = $row['img_path'];
                    //print_r($prev_image_path);
                }
                mysqli_free_result($result);
            } else {
                echo "You have not made any posts";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id = $_POST['id'];
    $blog_title = test_input($_POST['title']);
    $blog_content = test_input($_POST['content']);
    $current_time = date("Y/m/d");
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
        
        if (empty($errors)== TRUE) {
           move_uploaded_file($file_tmp, $target_path);
        }
        else { 
           //print_r($errors);
           $new_target_path = $prev_image_path;
        }
    }
    $sql = "UPDATE blog_post SET blog_title='".$blog_title."', blog_date='".$current_time."', img_path='".$new_target_path."',blog_data='".$blog_content."' WHERE blog_post_id='".$form_id."'";

    $result1 = $conn->query($sql);
    if($result1 == true) {
        echo "Success";
        header("location:../view/index.php");
    } 
    else {
        print_r($conn->error);
    }
 
}
