<?php

include 'dbconfig.php';

$sql_user_details_table = "CREATE TABLE user_details_table (Username VARCHAR(10) NOT NULL, pass VARCHAR(10) NOT NULL,
                            seq_ques VARCHAR(20) NOT NULL);";

if ($conn->query($sql_user_details_table) === TRUE) {
    echo "<br>";
    echo "New table user_details_table created successfully";
} else {
    echo "Error: ". $conn->error;
}



$conn->close();

?>