<?php

session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:http://aritra.com/authentication/login.html");
    exit;
}

include_once '../../../../.cred/db_auth.php';

$userid = $_SESSION['userid'];
$blog_id = "";


$blog_id =$_GET['data'];

$title = "";
$content = "";
$prev_image_path = "";

$sql_blog_details = "SELECT blog_title, img_path, blog_data FROM blog_post where blog_post_id = '".$blog_id."'";
    $result = $conn->query($sql_blog_details);
    if($result){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $title = $row['blog_title'];
                    $content = $row['blog_data'];
                    $prev_image_path = $row['img_path'];
                    //print_r($prev_image_path);
                }
            } else {
    }
}

?>

<html>
<head>
</head>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="update_data.css">
<body>
<?php if (mysqli_num_rows($result) > 0): ?>
  <div class="container">
      <div class="form-content">
      <title>Update Data</title>
          <form method="POST" action="../controller/update_data_controller.php" enctype="multipart/form-data">
            <div class="form-1">
                  <label for="title">Enter blog Title</label>
                  <input type="text" name="title" id="title" maxlength="100" required value="<?php echo $title ?>"/>
            </div>
            <div class="form-2">
                  <label for="content">Enter New blog content</label>
                  <textarea rows="10" cols="20" name="content" id="content"><?php echo $content?></textarea>
            </div>
            <div class="form-3">
                  <label for="content">Upload New Image</label>
                  <input type="file" class="image" name="image" value="" accept="image/*"><span class="input-class"><?php echo $prev_image_path?></span>
            </div>
            <input type="hidden" name = 'id' value='<?php echo $blog_id; ?>'/>
            <div class="btn-group">
                <button class="btn" id="submit"type="submit" value="Save My Data">Save My data</button>
          </div>
      </form>
      </div>
      <?php mysqli_free_result($result); ?>
  </div>
<?php else: ?>
  <button type="button" class="btn btn-primary show-post"><a href="http://aritra.com/blog/view/show_my_post.php">Go back to My Post Page</a></button>
  <h1 class="no-such-post">No such post exist</h1>
<?php endif ?>
</body>
<script>
    $(document).ready(() => {
        $('.image').change(() => {
            console.log("Working");
            var file = $('.image')[0].files[0].name;
            $("span").html(file);
        })
    })
</script>
</html>



