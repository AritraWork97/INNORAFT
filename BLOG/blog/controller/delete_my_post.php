<?php

require_once '../../../../../.cred/db_auth.php';

session_start();

$id = $_GET['id'];
$userid = $_SESSION['userid'];

$sql_del = "delete from blog_post where blog_post.blog_post_id='$id' and blog_post.userid = '$userid'";
               $result1 = $conn->query($sql_del);
               if($result1) {
                   header("location:../../home.php/index");
               }

?>