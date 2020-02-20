<html>
<head>
</head>
<body>
    <form method="POST" action="">
        <table border="1" align="center" bgcolor="#CCCCCC" enctype="multipart/form-data">
            <caption>Create Blog</caption>
            <tr>
                <th>Enter New Blog Title</th>
                <td><input type="text" name="title" id="title" maxlength="100" required/></td>
            </tr>
            <tr>
                <th>Enter New Blog Content</th>
                <td><textarea rows="20" cols="20" name="content" id="content"></textarea></td>
            </tr>
            <tr>  
               <td>Upload Image : </td>
               <td>
               <input required type="file" name="image">
               </td>
            </tr>
            <input type="hidden" name = 'id' value=''/>
            <td colspan="2" align="center"><input type="submit" value="Save My Data"/>
                <input type="reset" value="Reset Data"/>
            </td>
            </tr>
        </table>
    </form>
</body>
</html>


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
            echo "vbb";
           move_uploaded_file($file_tmp,$target_path);
        }else{
           print_r($errors);
        }
     }

}


    $sql_del = "update blog_post set  blog_title='$blog_title', img_path='$new_target_path' ,blog_data = '$blog_content', blog_date = '$current_time'
            where blog_post_id = '$id' AND userid = '$userid'";
                            $result1 = $conn->query($sql_del);
                            if($result1 == true) {
                                echo "asdsa";
                                header("location:index.php");
                            } else {
                                echo "huuu";
                            }

    

?>