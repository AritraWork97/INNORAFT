<?php

include_once './dbconfig.php';


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
        
 function get_new_empid(){
    global $conn;
    $query = "SELECT empid from employee_details_table order by empid desc LIMIT 1";
    $res = $conn->query($query);
    if ($res-> num_rows > 0) {
            $row = $res->fetch_assoc();
            $last_empid = $row['empid'];
            $last_id_num = substr($last_empid, 2, 4);
            $last_id_num = (int) $last_id_num + 1;
            $new_empid = "RU" . $last_id_num;
            return $new_empid;
    } else {
            $new_empid = "RU122";
            return $new_empid;
            }
}
    
?>