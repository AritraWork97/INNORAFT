<?php

include '../../../.cred/db_auth.php';


    
            
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['action'] == 'Display') {
              header("location:../view/show_blog.php?data=".$_POST['data']);
          } 
          

  }







        


