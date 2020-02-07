<?php

    include_once './dbconfig.php';
    require './validation.php';

    $empname  = $emplastname = $empmarks= $empdomain= $empsal="";

    $empname_error  = $emplastname_error= $empmarks_error= $empdomain_error= $empsal_error="";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["empname"])) {
            $empname_error = "Your First name is required";
         }else {
            $empname = test_input($_POST["empname"]);
            $empname = $conn->real_escape_string($empname);
         }
         if (empty($_POST["emplastname"])) {
            $emplastname_error = "Your Last name is required";
         }else {
            $emplastname = test_input($_POST["emplastname"]);
            $emplastname = $conn->real_escape_string($emplastname);
         }
         if (empty($_POST["graduation_percentile"])) {
            $empmarks_error = "Your Graduation Score is required";
         }else {
            $empmarks = test_input($_POST["graduation_percentile"]);
            $empmarks = $conn->real_escape_string($empmarks);
         }
         if (empty($_POST["empdomain"])) {
            $empdomain_error = "Your Domain is required";
         }else {
            $empdomain = test_input($_POST["empdomain"]);
            $empdomain = $conn->real_escape_string($empdomain);
         }
         if (empty($_POST["empsal"])) {
            $empsal_error = "Your Salary is required";
         }else {
            $empsal = test_input($_POST["empsal"]);
            $empsal = $conn->real_escape_string($empsal);
         }
    }
    if($empname_error != null || $emplastname_error != null || $empmarks_error != null)
    {
        echo "Error in given data";
    } else {
        if($empdomain == 'JAVA')
        {
           $emp_code_name = 'RU'.$empname;
        } else if($empdomain == 'PHP') {
         $emp_code_name = 'DU'.$empname;
        } else if($empdomain == 'Angular JS') {
         $emp_code_name = 'TU'.$empname;
        }
        $emp_code = 'SU'.$empname;
        
        $sql_insert_code_table = "insert into employee_code_table values ('$emp_code','$emp_code_name','$empdomain')";
        if($conn->query($sql_insert_code_table) == true){
            echo "new record added sucessfully into code table";
            echo "<br>";
        } else {
           echo "new record not added sucessfully into code table";
           echo "<br>";
        }
        
        
        $emp_id = get_new_empid();
        
        $sql_inser_details_table = "insert into employee_details_table values('$emp_id','$empname','$emplastname','$empmarks')";
        if($conn->query($sql_inser_details_table) ==true){
            echo "new record added sucessfully into details table";
            echo "<br>";
        }
        else{
           echo "new record added sucessfully into details table";
           echo "<br>";
        }

        $sql_insert_sal_table = "insert into employee_salary_table values('$emp_id', '$empsal', '$emp_code')";
        if($conn->query($sql_insert_sal_table) ==true){
         echo "new record added sucessfully into details table";
         echo "<br>";
     }
     else{
        echo "new record not added sucessfully into details table";
        echo "<br>";
     }
        
    }

?>