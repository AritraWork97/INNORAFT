<?php

include 'data.php';

include 'loader.php';
include '../vendor/autoload.php';

use \student\student as student;

class create_students {

  function __construct() {
    $student_array = array();
    $new_array = array();
    global $students_var;
    $i = 0;
    $j = $i + 1;
    $prev_val = "";
    $prev_val = $students_var[$j]['gender'];
    foreach($students_var as $index => $details) {
      $student_array['student'][] = new student($details); //creating a array of objects of type students
      $i++;
    }
    $number_of_elements = count($student_array['student']);// counting the number of objects found in the new array of objects
    for($i = 0;$i < $number_of_elements; $i++) {
      $j = $i + 1;
      $next_val = $student_array['student'][$j]->gender;
      if ($student_array['student'][$i]->gender == 'F') {
        if ($next_val == 'F') {
          $prev = $student_array['student'][$i]; 
          $student_array['student'][$i] = $student_array['student'][$i+2];
          $student_array['student'][$i+1] = $prev;
        }
      }
    }
    echo "Original array";
    echo "<br>";
    for($i = 1; $i < $number_of_elements; $i++) {
      echo $students_var[$i]['name'] . " => ". $students_var[$i]['gender'];
      echo "<br>";
    }
    echo "*********************************";
    echo "<br>";
    echo "new array";
    echo "<br>";
    echo "*********************************";
    echo "<br>";
    for($i = 0; $i < $number_of_elements; $i++) {
      echo $student_array['student'][$i]->name . " => ". $student_array['student'][$i]->gender;
      echo "<br>";
    }
  }

}

$stdnt = new create_students();

?>