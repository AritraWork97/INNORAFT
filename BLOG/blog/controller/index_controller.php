<?php

require_once '../../../../../.cred/db_auth.php';

session_start();

$css_class = "";

 /* Starts the session */
      if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
         $css_class = 'main-div';
        } else {
          $userid = $_SESSION['userid'];
          $css_class = 'main-div-2';
        }

   
    $fullname = "";


      $sql_user_queery = "select user.user_first_name, user.user_last_name, user.img_path from user";
      $result_user = $conn->query($sql_user_queery);
      if($result_user){     
        if(mysqli_num_rows($result_user) > 0){
                while($row = mysqli_fetch_array($result_user)){
                    $firstname = $row['user_first_name'];
                    $lastname = $row['user_last_name'];
                    $img_path = $row['img_path'];
                    $fullname = $firstname.' '.$lastname;
                }
            }
        }

    $sql_blog_details = "SELECT blog_post.userid, blog_post.img_path,blog_post.blog_post_id, blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post";
    $result = $conn->query($sql_blog_details);
            
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['action'] == 'Display') {
              header("location:individual_post/show_blog.php?data=".$_POST['data']);
          } 
          

  }







        


