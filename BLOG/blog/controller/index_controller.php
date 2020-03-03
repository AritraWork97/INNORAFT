<?php

include '../../../.cred/db_auth.php';


    
            
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['action'] == 'Display') {
              header("location:../../home.php/show_individual_post?data=".$_POST['data']);
          } 
          

  }







        


