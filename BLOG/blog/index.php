<?php

require_once '../../../../.cred/db_auth.php';

$sql_blog_details = "SELECT blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $data = $row['blog_data'];
                     echo "<div class='card blog-content' style='width: 18rem;'>";
                       echo "<div class='card-body' style='border: 1px solid coral'>";
                        echo "<h5 class='card-title'>$title</h5>";
                        echo "<p class='card-text'>$data</p>";
                        echo "<a href='#' class='btn btn-primary'>Go somewhere</a>";
                       echo  "</div>";
                     echo  "</div>";
                }
                mysqli_free_result($result);
            } 
        } else {
        echo $conn->error;
        }


?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
    </body>
</html>