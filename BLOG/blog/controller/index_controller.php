<?php

session_start();
include '../../../.cred/db_auth.php';


    
            
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['action'] == 'Display') {
              $id = $_POST['data'];
              header("location:../view/show_blog.php?data=".$id);
          } 
          

  }







        


