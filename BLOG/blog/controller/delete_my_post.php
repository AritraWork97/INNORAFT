<?php

require_once '../../../../.cred/db_auth.php';

session_start();

$userid = $_SESSION['userid'];
$blog_id = $_GET['data'];

$sql_del = "delete from blog_post where blog_post.blog_post_id='$blog_id' and blog_post.userid = '$userid'";
               $result1 = $conn->query($sql_del);
               if($result1) {
                   header("location:http://aritra.com");
               }

?>