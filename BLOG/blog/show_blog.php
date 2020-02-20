<?php

require_once '../../../../.cred/db_auth.php';

session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../authentication/login.html");
    exit;
   }

$blog_id = $_GET['data'];

$sql_blog_details = "select blog_post.blog_title, blog_post.blog_data FROM blog_post where blog_post.blog_post_id = '$blog_id'";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $data = $row['blog_data'];
                    echo $title."<br>";
                    echo $data."<br>";
                }
            }
        }


?>