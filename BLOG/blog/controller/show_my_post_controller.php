<?php

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