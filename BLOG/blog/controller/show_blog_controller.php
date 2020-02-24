<?php

require_once '../../../../../.cred/db_auth.php';

session_start();


$blog_id = $_GET['data'];

$sql_blog_details = "select blog_post.blog_title, blog_post.blog_data, blog_post.img_path FROM blog_post where blog_post.blog_post_id = '$blog_id'";
    $result = $conn->query($sql_blog_details);
?>