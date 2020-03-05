<?php
require_once '../../../.cred/db_auth.php';

session_start();
if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../home.php/login");
    exit;
   }


$userid = $_SESSION['userid'];

$sql_blog_details = "SELECT blog_post.blog_post_id, blog_post.img_path,blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post where blog_post.userid = '$userid'";
$result = $conn->query($sql_blog_details);
?>

<html>
  <head>
    <link rel="stylesheet" href="/PHP/BLOG/blog/view/show_my_post.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  </head>
  <body class="bg-light">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav navigation-link">
     <li class="nav-item active">
        <a class="nav-link" href="index">Return to home page <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="logout">Log out <span class="sr-only">(current)</span></a>
    </li>
    </ul>
    </div>
  </nav>
  <div class="main-container">
    <div class="container1">
      <?php if($result): ?>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
        <div class='card individual-card' style="width: 18rem">
          <div class='card-body' style='border: 1px solid coral'>
          <img src="<?php echo '../../'.$row['img_path'] ?>" class="card-img-top" width="100px" height="200px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['blog_title'] ?></h5>
            <p class="card-text"><?php echo substr($row['blog_data'], 0, 6); ?></p>
            <form action='../blog/controller/show_my_post_controller.php' method='POST'>
              <input class="form-control" type='submit' name='action' value='Edit'/>
              <input class="form-control" type='submit' name='action' value='Delete'>
              <input class="form-control" type='submit' name='action' value='Display'/>
              <input type='hidden' name='id' value="<?php echo $row['blog_post_id'];?>">
            </form>
          </div>
          </div>
        </div>
        <?php endwhile ?>
        <?php else: ?>
          <h2>No post has been made</h2>
        <?php mysqli_free_result($result); ?>
        <?php endif ?>
        <?php endif ?>
    </div>
  </div>
  </body>
</html>




