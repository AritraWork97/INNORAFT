<?php
require_once '../controller/show_blog_controller.php';
?>

<html>
    <head>
    </head>
    <link rel="stylesheet" href="blog_post_style.css"></link>
    <body>
        <div class="blogShort">
         <?php if($result): ?>
            <?php if(mysqli_num_rows($result) > 0): ?>
              <?php while($row = mysqli_fetch_array($result)): ?>
                    <h1><?php echo $row['blog_title']; ?></h1>
                     <img src="<?php echo '../../../'.$row['img_path'] ?>" alt="post img" class="pull-left img-responsive postImg img-thumbnail margin10" width="100px" height="100px">
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