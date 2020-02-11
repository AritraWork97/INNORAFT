<?php

include 'student.php';
include 'subject.php';
include 'data.php';
include 'ancillary_functions.php';



$student_arr_objects = array();
$marks_by_grade = array();
$marks_obtained_by_student = array();
$output_marks_display = array();


//print_r($sub_arr);

$count_student = count($student_arr);
$count_subject = count($sub_arr);

for($i = 1; $i <= $count_student; $i++)
{
    $student_arr_objects[] = new student($student_arr[$i]);
}

for($i = 0; $i < $count_student; $i++)
{
    $student_arr_objects[$i]->marks_obtained = get_student_marks($student_arr_objects[$i]->id);
    if(number_of_sub_passed($student_arr_objects[$i]->id) == 1){
        $student_arr_objects[$i]->passed = "True";
    } else {
        $student_arr_objects[$i]->passed = "False";
    }
}
//print_r($student_arr_objects['0']);


echo "<table border='2' class='stats' cellspacing='0'>
                  <tr>
                   <th>Name</th>
                   <th>Dob</th>
                   <th>Grade</th>
                   <th>Subjects</th>
                   <th>Result</th>
                  </tr>";

                  echo "</tr>";
                  for($i = 0; $i < $count_student; $i++){
                     echo "<tr>";
                     echo "<td>" . $student_arr_objects[$i]->name . "</td>";
                     echo "<td>" . $student_arr_objects[$i]->dob . "</td>";
                     echo "<td>" . $student_arr_objects[$i]->grade . "</td>";
                     echo "<td>" . $student_arr_objects[$i]->marks_obtained['M'].'<br>'.$student_arr_objects[$i]->marks_obtained['C'] . "</td>";
                     echo "<td>" . $student_arr_objects[$i]->passed . "</td>";
                     echo "</tr>"; 
            }

print_r($student_arr_objects);







?>