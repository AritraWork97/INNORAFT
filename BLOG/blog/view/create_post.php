<html>
<head>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/blog/view/create_post.css">
<body>
<?php if (strlen(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) <= 27) : ?>
  <div class="container">
    <div class="form-content">
     <title>Create Post</title>
      <form method="POST" action="../controller/create_post_controller.php" enctype="multipart/form-data">
        <div class="form-1">
            <label for="title">Enter blog Title</label>
            <input type="text" name="title" id="title" maxlength="100" required/>
        </div>
        <div class="form-2">
            <label for="content">Enter blog content</label>
            <textarea rows="10" cols="20" name="content" id="content"></textarea>
        </div>
        <div class="form-3">
            <label for="image">Upload Image</label>
            <input required type="file" name="image">
        </div>
        <div class="btn-group">
              <button class="btn" id="submit"type="submit" value="Save My Data">Save My data</button>
        </div>
      </form>
    </div>
  </div>
<?php else: ?>
  <?php include '../../error.html'; ?>
<?php endif ?>
</body>
</html>