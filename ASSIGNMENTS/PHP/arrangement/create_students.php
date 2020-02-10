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
        $new_array = array();
        global $students_var;
        $i = 0;
        $j = $i + 1;
        $prev_val = "";
        $prev_val = $students_var[$j]['gender'];
        foreach($students_var as $index => $details)
        {
            //$student_array[$i]['id'] = $index;
            $student_array['student'][] = new student($details);
            $i++;
        }
        //print_r($student_array['student'][0]->name);
        $number_of_elements = count($student_array['student']);
        //print_r($number_of_elements);
        for($i = 0;$i < $number_of_elements; $i++)
        {
            $j = $i + 1;
            $next_val = $student_array['student'][$j]->gender;
           // d($student_array);
            if($student_array['student'][$i]->gender == 'F'){
                if($next_val == 'F'){
                    $prev = $student_array['student'][$i]; 
                    $student_array['student'][$i] = $student_array['student'][$i+2];
                    $student_array['student'][$i+1] = $prev;
                }
            }
            //print_r($student_array['student']['$i']->name);
        }
        echo "Original array";
        echo "<br>";
        //print_r($students_var[1]);
        for($i = 1; $i < $number_of_elements; $i++)
        {
            echo $students_var[$i]['name'] . " => ". $students_var[$i]['gender'];
            echo "<br>";
        }
        echo "*********************************";
        echo "<br>";
        echo "new array";
        echo "<br>";
        echo "*********************************";
        echo "<br>";
        for($i = 0; $i < $number_of_elements; $i++)
        {
            echo $student_array['student'][$i]->name . " => ". $student_array['student'][$i]->gender;
            echo "<br>";
        }
    }
}

$stdnt = new create_students();
//$newStudents->create_student1();


?>