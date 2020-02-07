<html>
<link rel="stylesheet" type="text/css" href="../style.css">
</html>


<?php

include_once '../dbconfig.php';

$sql_empdetails = "SELECT employee_salary_table.empid, employee_details_table.employee_first_name ,employee_salary_table.employee_salary 
                            FROM employee_salary_table, employee_details_table WHERE employee_salary_table.empid=employee_details_table.empid 
                            AND employee_salary_table.employee_salary > 50000";

if($result = $conn->query($sql_empdetails)){
        if(mysqli_num_rows($result) > 0){
            echo "<h1>Employee_First_name</h1>";
            echo "<table class='paleBlueRows'>";
                while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['employee_first_name'] . "</td>";
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