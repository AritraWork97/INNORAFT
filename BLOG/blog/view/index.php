<?php

require_once '../../../.cred/db_auth.php';

session_start();

$fullname = "";
$css_class = "";

 /* Starts the session */
      if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
         $css_class = 'main-div';
        } else {
          $userid = $_SESSION['userid'];
          $fullname = $_SESSION['username'];
          $css_class = 'main-div-2';
          $sql_user_queery = "select img_path from user where userid='".$userid."'";
          $result_user = $conn->query($sql_user_queery);
          if($result_user){     
            if(mysqli_num_rows($result_user) > 0){
                    while($row = mysqli_fetch_array($result_user)){
                        $img_path = $row['img_path'];
                    }
                }
            }
        }


$sql_blog_details = "SELECT blog_post.userid, blog_post.img_path,blog_post.blog_post_id, blog_post.blog_post_author, blog_post.blog_title, blog_post.blog_data FROM blog_post";
    $result = $conn->query($sql_blog_details);

?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="/PHP/BLOG/blog/view/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="<?php echo $css_class ?>">
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
      <div class="user">
        <?php if(isset($_SESSION['Active']) == TRUE): ?>
            <img src="<?php echo '../../'.$img_path ?>">
            <h5><?php echo $fullname ?></h5>
            <a class="nav-link" href="logout">Log out <span class="sr-only">(current)</span></a>
        <?php endif; ?>
      </div>
         <ul class="navbar-nav" style="float: right; margin-top : 12px;">
            <li class="nav-item active">
                
            </li>
        </ul>
      </div>
    </nav>
    </div>
    <div>
    <?php if(isset($_SESSION['Active']) == true): ?>
         <button type="button" class="btn btn-primary show-post"><a href="show_my_posts">Show my posts</a></button>
         <button type="button" class="btn btn-primary show-post"><a href="create_post">Add More Post</a></button>
    <?php else: ?>
          <button type="button" class="btn btn-primary show-post"><a href="login">Login</a></button>
          <button type="button" class="btn btn-primary show-post"><a href="register">Register</a></button>
    <?php endif ?>    
    </div>
    <div class='container'>
      <section class='cards-wrapper'>
        <div class='card-grid-space'>
          <?php if($result): ?>
            <?php if(mysqli_num_rows($result) > 0): ?>
              <?php while($row = mysqli_fetch_array($result)): ?>
                <a class='card cont'>
                  <img src="<?php echo '../../'.$row['img_path'] ?>" width='100px' height='100px'>
                  <h1><?php echo $row['blog_title'] ?></h1>
                  <p><?php echo substr($row['blog_data'], 0, 6); ?></p>
                  <form action='../blog/controller/index_controller.php' method='POST'>
                    <input type='submit' name='action' value='Display'/>
                    <input type='hidden' name='data' value="<?php echo $row['blog_post_id'] ?>"/>
                  </form>
                </a>
              <?php endwhile ?>
              <?php mysqli_free_result($result); ?>
              <?php endif ?>
              <?php endif ?>
        </div>
      </section>
    </div>
  </body>
</html>