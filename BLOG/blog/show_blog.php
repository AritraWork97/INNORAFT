<?php

require_once '../../../../.cred/db_auth.php';

session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../authentication/login.html");
    exit;
   }

$blog_id = $_GET['data'];

$sql_blog_details = "select blog_post.blog_title, blog_post.blog_data, blog_post.img_path FROM blog_post where blog_post.blog_post_id = '$blog_id'";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $image = $row['img_path'];
                    $title = $row['blog_title'];
                    $data = $row['blog_data'];
                    /*echo ("<img src='$image' width='100px' height='100px'>");
                    echo $title."<br>";
                    echo $data."<br>";*/
                }
            }
        }
?>

<html>
    <head>

    </head>
    <link rel="stylesheet" href="blog_post_style.css"></link>
    <body>
        <div class="blogShort">
                    <h1><?php echo $title ?></h1>
                     <img src="<?php echo $image ?>" alt="post img" class="pull-left img-responsive postImg img-thumbnail margin10" width="100px" height="100px">
                     <article><p>
                         <?php echo $data ?>
                         </p>
        </div>
    </body>
</html>