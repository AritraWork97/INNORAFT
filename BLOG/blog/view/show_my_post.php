<?php
require_once '../controller/show_my_post_controller.php';
?>

<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="show_my_post.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="main-div">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav" style="float: right; margin-top : 48px;">
     <li class="nav-item active">
        <a class="nav-link" href="../../home.php/logout">Log out <span class="sr-only">(current)</span></a>
    </li>
    </ul>
    </div>
  </nav>
  </div>
  <div>
      <?php if($result): ?>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
        <div class='card blog-content'>
          <div class='card-body' style='border: 1px solid coral'>
          <img src="<?php echo '../../../'.$row['img_path'] ?>" width='100px' height='100px'>
          <h1><?php echo $row['blog_title'] ?></h1>
          <p><?php echo substr($row['blog_data'], 0, 6); ?></p>
          <form action='../controller/show_my_post_controller.php' method='POST'>
            <input type='submit' name='action' value='Edit'/>
            <input type='submit' name='action' value='Delete'>
            <input type='submit' name='action' value='Display'/>
            <input type='hidden' name='id' value="<?php echo $row['blog_post_id'];?>">
          </form>
          </div>
        <?php endwhile ?>
        <?php else: ?>
          <h2>No post has been made</h2>
        <?php mysqli_free_result($result); ?>
        <?php endif ?>
        <?php endif ?>
  </div>
  </body>
</html>




