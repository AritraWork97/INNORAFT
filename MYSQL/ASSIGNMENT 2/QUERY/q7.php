<html>
<link rel="stylesheet" type="text/css" href="../style.css">
</html>


<?php

include_once '../dbconfig.php';

$sql_empdetails = "SELECT empid FROM `employee_salary_table` WHERE employee_code = null;";

if($result = $conn->query($sql_empdetails)){
        if(mysqli_num_rows($result) > 0){
            echo "<h1>Employee ID</h1>";
            echo "<table class='paleBlueRows'>";
                while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['employee_id'] . "</td>";
                        echo "</tr>";
                }
                echo "</table>";
                echo "<br>";
                mysqli_free_result($result);
            } 
            else
            {
                echo "No such data exists";
            }
} else {
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>