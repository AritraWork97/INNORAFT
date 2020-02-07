<html>
<link rel="stylesheet" type="text/css" href="../style.css">
</html>


<?php

include_once '../dbconfig.php';

$sql_empdetails = "SELECT CONCAT(employee_first_name,' ',employee_last_name) AS Fullname FROM employee_details_table WHERE employee_details_table.empid IN 
                    (SELECT employee_salary_table.empid FROM employee_salary_table WHERE employee_salary_table.employee_code IN
                    (SELECT employee_code_table.employee_code FROM employee_code_table WHERE employee_code_table.employee_domain != 'JAVA'))";

if($result = $conn->query($sql_empdetails)){
        if(mysqli_num_rows($result) > 0){
            echo "<h1>Employee_Full_name</h1>";
            echo "<table class='paleBlueRows'>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['Fullname'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";
                echo "<br>";
                mysqli_free_result($result);
            } 
} else {
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>


