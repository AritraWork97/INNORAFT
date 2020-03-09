<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['action'] == 'Delete') {
        $blog_id = $_POST['id'];
        $loc = 'http://aritra.com/blog/controller/delete_my_post.php?data='.$blog_id;
            echo "<script>";
            echo " if(confirm('Are You sure?'))
                    {
                        window.location.href = '$loc';
                    }
                </script>";
               
           } else if($_POST['action'] == 'Edit') {
               $id = $_POST['id'];
               header("location: http://aritra.com/blog/view/update_data.php?data=".$id);
           }  else if($_POST['action'] == 'Display') {
                $id = $_POST['id'];
                header("location:http://aritra.com/blog/view/show_blog.php?data=".$id);
           } 
           

   }



?>