<?php
        session_start();

        ob_start();

        $fullname = $_SESSION["fullname"];
        $phone = $_SESSION["phone"];
        $abs_path = $_SESSION["abs_path"];
        $email_result = $_SESSION["email_result"];
        $textAreaArray = $_SESSION["textAreaArray"];

        echo ("<img src=$abs_path>");
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
        
        $out = ob_get_contents();
        ob_end_flush();
        if (strlen($out) > 0) {
            $file = '' .time() . '.doc';
            touch($file);
            $fh = fopen($file, 'w');
            fwrite($fh, $out);
            fclose($fh);
           }
        
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=document_name.doc");

?>