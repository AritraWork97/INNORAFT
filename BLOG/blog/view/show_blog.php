<?php
require_once '../controller/show_blog_controller.php';
?>

<html>
  <head>
  </head>
  <link rel="stylesheet" href="blog_post_style.css"></link>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav navigation-link">
      <li class="nav-item active">
          <a class="nav-link" href="http://aritra.com">Return to home page <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="http://aritra.com/authentication/logout.php">Log out <span class="sr-only">(current)</span></a>
      </li>
      </ul>
      </div>
    </nav>
    <div class="blogShort">
      <div class="blogShortContainer">
        <div class="blog-content">
     <?php if($result): ?>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
          <h1><?php echo $row['blog_title']; ?></h1>
           <img src="<?php echo '../../'.$row['img_path'] ?>" alt="post img" class="" max-width="100%" height="75%">
           <article><p>
             <?php echo $row['blog_data'] ?>
             </p>
             <?php endwhile ?>
        <?php mysqli_free_result($result); ?>
        <?php else: ?>
          <h1>No such post exist</h1>
        <?php endif ?>
        <?php endif ?>
    </div>
    </div>
    </div>
  </body>
</html>