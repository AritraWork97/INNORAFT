<?php
session_start();

if(isset($_SESSION['Active']) == false){ /* Redirects user to Login.php if not logged in */
    header("location:../authentication/login.html");
    exit;
}


include_once '../validation.php';
include_once '../../../../.cred/db_auth.php';

$id = $_GET["location"];
$userid = $_SESSION['userid'];
$title = "";
$content = "";
$blog_title = "";
$blog_content = "";
$new_target_path = "";
$current_time = "";


$sql_blog_details = "SELECT blog_title, img_path, blog_data FROM blog_post where blog_post_id = '".$id."'";
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

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_title = test_input($_POST['title']);
    $blog_content = test_input($_POST['content']);
    $current_time = date("Y/m/d");
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $tmp = explode('.',$file_name);
        $file_ext=strtolower(end($tmp));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        $new_file_name = md5(uniqid(rand(), true)).'.'.$file_ext;
        $target_path = 'uploads/'. basename($new_file_name);
        $new_target_path = 'create_blog/uploads/'. basename($new_file_name);
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,$new_target_path);
        }else{ 
           //print_r($errors);
           $new_target_path = $prev_image_path;
        }
    }
    $sql_del = "update blog_post set  blog_title='$blog_title', img_path='$new_target_path' ,blog_data = '$blog_content', blog_date = '$current_time'
            where blog_post_id = '$id' AND userid = '$userid'";
                            $result1 = $conn->query($sql_del);
                            if($result1 == true) {
                                header("location:index.php");
                            } else {
                                $loc = './update_data.php';
                                echo "<script>";
                                echo " if(confirm('Post not created, try again'))
                                         {
                                            window.location.href = '$loc';
                                         }
                                         </script>";
                            }
 
}
?>

<html>
<head>
</head>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<link rel="stylesheet" href="update_data.css"></link>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <table border="1" align="center" bgcolor="#CCCCCC" enctype="multipart/form-data">
            <caption>Edit Blog</caption>
            <tr>
                <th>Enter New Blog Title</th>
                <td><input type="text" name="title" id="title" maxlength="100" required value="<?php echo $title ?>"/></td>
            </tr>
            <tr>
                <th>Enter New Blog Content</th>
                <td><textarea rows="20" cols="20" name="content" id="content"><?php echo $content?></textarea></td>
            </tr>
            <tr>  
               <td>Upload Image : </td>
               <td>
               <input type="file" name="image" class="image-1" value=""><span class="input-class"><?php echo $prev_image_path?></span>
               </td>
            </tr>
            <input type="hidden" name = 'id' value=''/>
            <td colspan="2" align="center"><input type="submit" value="Save My Data"/>
            </td>
            </tr>
        </table>
    </form>
</body>
<script>
    $(document).ready(() => {
        $('.image-1').change(() => {
            console.log("Working");
            var file = $('.image-1')[0].files[0].name;
            $("span").html(file);
        })
    })
</script>
</html>



