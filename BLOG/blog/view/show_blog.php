<?php
require_once '../BLOG/blog/controller/show_blog_controller.php';
?>

<html>
    <head>
    </head>
    <link rel="stylesheet" href="/PHP/BLOG/blog/view/blog_post_style.css"></link>
    <body>
        <div class="main-div">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="float: right; margin-top : 48px;">
                <li class="nav-item active">
                    <a class="nav-link" href="index">Return to home page <span class="sr-only"></span></a>
                    <?php if(isset($_SESSION['Active']) == TRUE): ?>
                      <a class="nav-link" href="logout">Log out <span class="sr-only"></span></a>
                      <?php endif; ?>
                </li>
                </ul>
                </div>
            </nav>
        </div>
        <div class="blogShort">
         <?php if($result): ?>
            <?php if(mysqli_num_rows($result) > 0): ?>
              <?php while($row = mysqli_fetch_array($result)): ?>
                    <h1><?php echo $row['blog_title']; ?></h1>
                     <img src="<?php echo '../../'.$row['img_path'] ?>" alt="post img" class="pull-left img-responsive postImg img-thumbnail margin10" width="100px" height="100px">
                     <article><p>
                         <?php echo $row['blog_data'] ?>
                         </p>
                         <?php endwhile ?>
              <?php mysqli_free_result($result); ?>
              <?php endif ?>
              <?php endif ?>
        </div>
    </body>
</html>