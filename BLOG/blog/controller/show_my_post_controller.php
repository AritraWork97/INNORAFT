<?php

require_once '../../../../../.cred/db_auth.php';

session_start();
if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../../home.php/login");
    exit;
   }


$userid = $_SESSION['userid'];

$sql_blog_details = "SELECT blog_post.blog_post_id, blog_post.img_path,blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post where blog_post.userid = '$userid'";
$result = $conn->query($sql_blog_details);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['action'] == 'Delete') {
        $blog_id = $_POST['id'];
        $loc = '../../home.php/delete_individual_post?data='.$blog_id;
            echo "<script>";
            echo " if(confirm('Are You sure?'))
                    {
                        window.location.href = '$loc';
                    }
                </script>";
               
           } else if($_POST['action'] == 'Edit') {
               $id = $_POST['id'];
               header("location:../../home.php/update_data?data=".$id);
           }  else if($_POST['action'] == 'Display') {
               header("location:../../home.php/show_individual_post?data=".$_POST['id']);
           } 
           

   }



?>