<?php
$servername = "localhost";
$username = "aritra";
$password = "123";
$database = "mysql_assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
