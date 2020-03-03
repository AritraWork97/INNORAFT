<html>
<head>
</head>
<body>
    <form method="POST" action="../blog/controller/create_post_controller.php" enctype="multipart/form-data">
        <table border="1" align="center" bgcolor="#CCCCCC" >
            <caption>Create Blog</caption>
            <tr>
                <th>Enter Blog Title</th>
                <td><input type="text" name="title" id="title" maxlength="100" required/></td>
            </tr>
            <tr>
                <th>Enter Blog Content</th>
                <td><textarea rows="20" cols="20" name="content" id="content"></textarea></td>
            </tr>
            <tr>  
               <td>Upload Image : </td>
               <td>
               <input required type="file" name="image">
               </td>
            </tr>
            <td colspan="2" align="center"><input type="submit" value="Save My Data"/>
                <input type="reset" value="Reset Data"/>
            </td>
            </tr>
        </table>
    </form>
</body>
</html>