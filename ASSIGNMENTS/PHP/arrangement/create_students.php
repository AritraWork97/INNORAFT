<?php

include 'student.php';
include '../vendor/autoload.php';


$students_var = array(
    "1" => array(
        "name" => "aritra",
        "gender" => "M"
    ),
    "2" => array(
        "name" => "Tanaya",
        "gender" => "F"
    ),
    "3" => array(
        "name" => "Tanaya",
        "gender" => "F"
    ),
    "4" => array(
        "name" => "Tanaya",
        "gender" => "F"
    ),
    "5" => array(
        "name" => "aritra",
        "gender" => "M"
    ),
    "6" => array(
        "name" => "Tanaya",
        "gender" => "F"
    ),
    "7" => array(
        "name" => "aritra",
        "gender" => "M"
    ),
    "8" => array(
        "name" => "aritra",
        "gender" => "M"
    ),
    "9" => array(
        "name" => "aritra",
        "gender" => "M"
    ),
    "10" => array(
        "name" => "aritra",
        "gender" => "M"
    ),
);

class create_students
{
    function __construct()
    {
        $student_array = array();
        global $students_var;
        $i = 1;
        foreach($students_var as $index => $details)
        {
            //$student_array[$i]['id'] = $index;
            $student_array[$i]['student'] = new student($details);
            $i++;
        }
        //d($student_array);
        foreach($student_array as $index => $key){
            foreach($key as $name => $details){
                
            }
        }
   
    }
}

$stdnt = new create_students();
//$newStudents->create_student1();


?>