<?php

include 'dbconfig.php';

$sql_employee_code_table = "CREATE TABLE employee_code_table (employee_code VARCHAR(10) NOT NULL, employee_code_name VARCHAR(10) NOT NULL, 
                                                              employee_domain VARCHAR(10) NOT NULL, PRIMARY KEY(employee_code));";

if ($conn->query($sql_employee_code_table) === TRUE) {
    echo "<br>";
    echo "New table employee_code_table created successfully";
} else {
    echo "Error: ". $conn->error;
}

$sql_employee_details_table = "CREATE TABLE employee_details_table (empid VARCHAR(10) NOT NULL, employee_first_name VARCHAR(10) NOT NULL, 
                            employee_last_name VARCHAR(10) NOT NULL,   graduation_percentile VARCHAR(10) NOT NULL, PRIMARY KEY (empid));";

if ($conn->query($sql_employee_details_table) === TRUE) {
    echo "<br>";
    echo "New table employee_details_table created successfully";
} else {
    echo "Error: ". $conn->error;
}

$sql_employee_salary_table = "CREATE TABLE employee_salary_table (empid VARCHAR(10) NOT NULL, employee_salary VARCHAR(10) NOT NULL, 
                            employee_code VARCHAR(10) NOT NULL, FOREIGN KEY (empid) REFERENCES employee_details_table(empid), 
                            FOREIGN KEY (employee_code) REFERENCES employee_code_table(employee_code));";

if ($conn->query($sql_employee_salary_table) === TRUE) {
    echo "<br>";
    echo "New table employee_salary_table created successfully";
} else {
    echo "Error: ". $conn->error;
}

$conn->close();

?>