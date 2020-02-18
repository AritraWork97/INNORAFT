<?php

require_once '../../../../.cred/db_auth.php';

$sql_blog_post_table = "CREATE TABLE blog_post(userid VARCHAR(100) NOT NULL, blog_post_id VARCHAR(100) NOT NULL, blog_post_author VARCHAR(100) NOT NULL,blog_title VARCHAR(100) NOT NULL, 
                                                              blog_date DATE NOT NULL, blog_data VARCHAR(10000) NOT NULL,
                                                              PRIMARY KEY(blog_post_id), FOREIGN KEY(userid) REFERENCES user(userid));";

if ($conn->query($sql_blog_post_table) === TRUE) {
    echo "<br>";
    echo "New Blog Post table created successfully";
} else {
    echo "Error: ". $conn->error;
}


?>