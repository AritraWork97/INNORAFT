<?php
         // define variables and set to empty values

         session_start();


         $firstnameErr = $lastnameErr = $textArea= $email =$phone =$email_result=$tmp="";
         $firstname = $lastname = $fullname = $textAreaErr = $emailErr =$phoneErr= "";

         $phone_temp = $email_result= $abs_path= $new_abs_path = "";

         $access_key = '9cb7ae5e4fc7ec908932e3c9bf342f7c';
        
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

         

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstname"])) {
               $firstnameErr = "First Name is required";
            }else {
               $firstname = test_input($_POST["firstname"]);
            }
            if (empty($_POST["lastname"])) {
               $lastnameErr = "Last name is required";
            }else {
               $lastname = test_input($_POST["lastname"]);
            }
            if(empty($_POST["comments"])){
               $textArea = "Write your marks";
            }
            else
            {
               $textArea = test_input($_POST["comments"]);
            }
            if(empty($_POST["phone"])){
               $phone = "Write your phone number";
            }
            else
            {
               $phone = test_input($_POST["phone"]);
            }
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
            }
            if( preg_match( '/\d/', $firstname) ||  preg_match( '/\d/',$lastname) || 
                preg_match('/[^a-zA-Z\d]/', $firstname) || preg_match('/[^a-zA-Z\d]/', $lastname)){
                   echo '<script type="text/JavaScript">  
                         prompt("Invalid name given"); 
                         </script>' ;
           }
          $fullname = $firstname.' '.$lastname;

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
               
               if(empty($errors)==true){
                  move_uploaded_file($file_tmp,$target_path);
               }else{
                  print_r($errors);
               }
            }
            
            $array_data = explode(PHP_EOL, $textArea);
            $textAreaArray = array();
            foreach ($array_data as $data){
               $format_data = explode('|',$data);
               $textAreaArray[trim($format_data[0])] = trim($format_data[1]);
            }

            $phone_temp = $phone;
            $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            $phone_to_check = str_replace("-", "", $filtered_phone_number);
            $phone_to_check = str_replace("+91", "", $filtered_phone_number);
            if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
                  $phone = "Number is incorrect";
               } else {
                  $phone = $phone_temp;
               }
            }
            
            $abs_path = realpath($target_path);

            $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email.'');  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $json = curl_exec($ch);
            curl_close($ch);
            $validationResult = json_decode($json, TRUE);
            if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
               $email_result = $email;
            } else {
               $email_result = "email is invalid";
            }
      
            $_SESSION["fullname"] = $fullname;
            $_SESSION["email_result"] = $email_result;
            $_SESSION["phone"] = $phone;
            $_SESSION["textAreaArray"] = $textAreaArray;
            $_SESSION["abs_path"] = $abs_path;
            
?>
<?php
        echo "<p><a class='btn btn-lg btn-success' href='../LOGIN/logout.php' role='button'>Log out</a></p>";
        echo ("<img src=$target_path>");
        echo "<h1>Name : $fullname</h1>";
        if($phone != "Number is incorrect")
        {
            echo ("<h1> Phone : $phone</p>");
        }
        else
        {
           echo "Number is invalid";
        }
        if($email_result != "email is invalid")
        {
            echo ("<h1>Email : $email_result</p>");
        }
        else
        {
           echo "email is invalid";
        }
        echo "<br>";
        echo "<table border='2' class='stats' cellspacing='0'>
                    <tr>
                     <th>Subject</th>
                     <th>Marks</th>
                    </tr>";
  
                    echo "</tr>";
              foreach ($textAreaArray as $key => $value){
                       echo "<tr>";
                       echo "<td>" . $key . "</td>";
                       echo "<td>" . $value . "</td>";
              }

     echo "<p><a class='btn btn-lg btn-success' href='./download.php' role='button'>Download File</a></p>";
?>