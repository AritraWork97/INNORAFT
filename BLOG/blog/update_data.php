<html>
<head>
</head>
<body>
    <form method="POST" action="">
        <table border="1" align="center" bgcolor="#CCCCCC" >
            <caption>Create Blog</caption>
            <tr>
                <th>Enter New Blog Title</th>
                <td><input type="text" name="title" id="title" maxlength="100" required/></td>
            </tr>
            <tr>
                <th>Enter New Blog Content</th>
                <td><textarea rows="20" cols="20" name="content" id="content"></textarea></td>
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

include_once '../validation.php';
include_once '../../../../.cred/db_auth.php';

$id = $_GET["location"];
$userid = $_SESSION['userid'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_title = test_input($_POST['title']);
    $blog_content = test_input($_POST['content']);
    $current_time = date("Y/m/d");

    $sql_del = "update blog_post set  blog_title='$blog_title', blog_data = '$blog_content', blog_date = '$current_time'
            where blog_post_id = '$id' AND userid = '$userid'";
                            $result1 = $conn->query($sql_del);
                            if($result1 == true) {
                                echo "asdsa";
                                header("location:index.php");
                            } else {
                                echo "huuu";
                            }

    }

?>