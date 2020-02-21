<?php

require_once '../../../../.cred/db_auth.php';

$sql_employee_code_table = "CREATE TABLE user(userid VARCHAR(100) NOT NULL, user_first_name VARCHAR(100) NOT NULL, 
                                                              user_last_name VARCHAR(100) NOT NULL, user_pass VARCHAR(100) NOT NULL,
                                                              user_address VARCHAR(100) NOT NULL, user_mobile VARCHAR(100) NOT NULL,
                                                              user_email VARCHAR(100) NOT NULL, img_path VARCHAR(100) NOT NULL,
                                                              PRIMARY KEY(userid));";

if ($conn->query($sql_employee_code_table) === TRUE) {
    echo "<br>";
    echo "New user table created successfully";
} else {
    echo "Error: ". $conn->error;
}

?>