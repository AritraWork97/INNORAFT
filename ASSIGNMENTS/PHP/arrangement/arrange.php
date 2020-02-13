<?php

include 'create_students.php';

class arrangement
{
  function arrange_students(){
    global $student_array;
    foreach($student_array as $index => $key){
      foreach($key as $name => $details){
        //print_r(current($details));
        echo $details->name." ".$details->gender;
        echo "<br>";
      }
    }
  }
}

$obj = new arrangement();
$obj->arrange_students();

?>