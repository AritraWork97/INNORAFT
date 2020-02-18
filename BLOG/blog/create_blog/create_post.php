<?php

include_once '../../validation.php';
include_once '../../../../../.cred/db_auth.php';

include_once 'blog.php';

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $blog_title = test_input($_POST['title']);
    $blog_content = test_input($_POST['content']);
    $current_time = date("Y/m/d");
    $userid = $_SESSION['userid'];
    $author_name = $_SESSION['username'];
    $blog_post_id = time();
}

    $new_post = new post($author_name, $blog_title, $blog_content, $current_time);


    $sql_insert_blog_post = "insert into blog_post values('$userid','$blog_post_id','$author_name',
                                                          '$blog_title', '$current_time', '$blog_content')";
            if($conn->query($sql_insert_blog_post) == true){
                header("location:../index.php");
            } else {
            echo $conn->error;
            echo "<br>";
            }

?>