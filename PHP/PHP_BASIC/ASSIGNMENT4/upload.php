<?php
         // define variables and set to empty values
         $firstnameErr = $lastnameErr = $textArea= $email =$phone =$email_result= $tmp="";
         $firstname = $lastname = $fullname = $textAreaErr = $emailErr =$phoneErr= "";

         $phone_temp = "";
        
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
?>
<?php
      echo "<p><a class='btn btn-lg btn-success' href='../LOGIN/logout.php' role='button'>Log out</a></p>";
      echo ("<img src=$target_path>");
      echo "<h1>Hello $fullname</h1>";
      echo ("<h2>Your phone number is $phone");
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
?>