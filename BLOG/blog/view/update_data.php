<?php
session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../../home.php/login");
    exit;
}

include_once '../../../.cred/db_auth.php';

$userid = $_SESSION['userid'];

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
                mysqli_free_result($result);
            } else {
                echo "You have not made any posts";
    }
}

?>

<html>
<head>
</head>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/PHP/BLOG/blog/view/update_data.css">
<body>
<div class="container">
    <div class="form-content">
     <title>Update Data</title>
        <form method="POST" action="../blog/controller/update_data_controller.php" enctype="multipart/form-data">
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
                <input type="file" class="image" name="image" value=""><span class="input-class"><?php echo $prev_image_path?></span>
          </div>
          <input type="hidden" name = 'id' value='<?php echo $blog_id; ?>'/>
          <div class="btn-group">
              <button class="btn" id="submit"type="submit" value="Save My Data">Save My data</button>
         </div>
    </form>
    </div>
</div>
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



