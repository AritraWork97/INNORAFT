<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
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
    <div>
    <button type="button" class="btn btn-primary show-post"><a href="show_my_post.php">Show my posts</a></button>
         <button type="button" class="btn btn-primary show-post"><a href="create_blog/index.html">Add More Post</a></button>
    </div>
  </body>
</html>


<?php

require_once '../../../../.cred/db_auth.php';

session_start();

$sql_blog_details = "SELECT blog_post.userid, blog_post.blog_post_id, blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $data = $row['blog_data'];
                    $blog_id = $row['blog_post_id'];
                    $user_id = $row['userid'];
                     echo "<div class='card blog-content'>";
                       echo "<div class='card-body' style='border: 1px solid coral'>";
                        echo "<h5 class='card-title'>$title</h5>";
                        echo "<p class='card-text'>$data</p>";
                    echo "<form action='' method='POST'>";
                        echo "<input type='submit' name='action' value='Display'/>";
                        echo "<input type='hidden' name='data' value='$data'/>";
                    echo "</form>";
                       echo  "</div>";
                     echo  "</div>";
                     if($_SERVER["REQUEST_METHOD"] == "POST") {
                          if($_POST['action'] == 'Display') {
                            header("location:show_blog.php?data=".$data);
                        } 
                        
    
                }
               }
                mysqli_free_result($result);
            } 
        } else {
        echo $conn->error;
        }


?>

