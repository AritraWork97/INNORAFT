<html>
<link rel="stylesheet" type="text/css" href="../style.css">
</html>


<?php

include_once '../dbconfig.php';

$sql_empdetails = "select SUM(es.employee_salary) as salary_sum, ec.employee_domain from employee_salary_table es inner join 
                     employee_code_table ec on es.employee_code = ec.employee_code WHERE es.employee_salary > 30000 
                    group by ec.employee_domain;";

if($result = $conn->query($sql_empdetails)){
        if(mysqli_num_rows($result) > 0){
            echo "<h1>Domain Wise Salary</h1>";
            echo "<table class='paleBlueRows'>";
            echo "<tr>";
                echo "<th>Employee_Domain</th>";
                echo "<th>Salary</th>";
            echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['employee_domain'] . "</td>";
                            echo "<td>" . $row['salary_sum'] . "</td>";
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