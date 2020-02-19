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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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

$userid = $_SESSION['userid'];

$sql_blog_details = "SELECT blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post where blog_post.userid = '$userid'";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $data = $row['blog_data'];
                     echo "<div class='card blog-content'>";
                       echo "<div class='card-body' style='border: 1px solid coral'>";
                        echo "<h5 class='card-title'>$title</h5>";
                        echo "<p class='card-text'>$data</p>";
                        echo "<a href='#' class='btn btn-primary'>Edit</a>";
                        echo "<a href='#' class='btn btn-primary'>Delete</a>";
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


?>

