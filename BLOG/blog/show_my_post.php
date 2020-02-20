<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style_2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="main-div">
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav" style="float: right; margin-top : 12px;">
         <li class="nav-item active">
                <a class="nav-link" href="../authentication/logout.php">Log out <span class="sr-only">(current)</span></a>
        </li>
        </ul>
      </div>
    </nav>
    </div>
  </body>
</html>


<?php

require_once '../../../../.cred/db_auth.php';

session_start();
if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../authentication/login.html");
    exit;
   }


$userid = $_SESSION['userid'];

$sql_blog_details = "SELECT blog_post.blog_post_id, blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post where blog_post.userid = '$userid'";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $data = $row['blog_data'];
                    $sneak_peek = substr($data,0,5);
                    $blog_id = $row['blog_post_id'];
                    $user_id = $row['userid'];
                    print_r($user_id);
                     echo "<div class='card blog-content'>";
                       echo "<div class='card-body' style='border: 1px solid coral'>";
                        echo "<h5 class='card-title'>$title</h5>";
                        echo "<p class='card-text'>$sneak_peek</p>";
                        echo "<form action='' method='POST'>";
                            echo "<input type='submit' name='action' value='Edit'/>";
                            echo "<input type='submit' name='action' value='Delete'/>";
                            echo "<input type='submit' name='action' value='Display'/>";
                            echo "<input type='hidden' name='data' value='$data'/>";
                            echo "<input type='hidden' name='id' value='$blog_id'/>";
                        echo "</form>";
                       echo  "</div>";
                     echo  "</div>";

                }
                mysqli_free_result($result);
            } else {
                echo "You have not made any posts";
            }
        } else {
        echo $conn->error;
        }
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['action'] == 'Delete') {
               $id = $_POST['id'];
               print_r($id);
               $sql_del = "delete from blog_post where blog_post.blog_post_id='$id' and blog_post.userid = '$userid'";
               $result1 = $conn->query($sql_del);
               if($result1) {
                   header("location:index.php");
               }
           } else if($_POST['action'] == 'Edit') {
               $id = $_POST['id'];
               header("location:update_data.php?location=".$id);
           }  else if($_POST['action'] == 'Display') {
               header("location:show_blog.php?data=".$_POST['data']);
           } 
           

   }



?>

