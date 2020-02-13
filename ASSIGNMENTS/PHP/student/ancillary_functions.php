<?php

include 'data.php';

function get_marks_details($grade) {
  global $sub_arr;
  $grade_marks = array();
  $grade_marks = $sub_arr[$grade];
  return $grade_marks;
}

function get_student_marks($id) {
  global $student_marks;
  $student_obtained_marks = array();
  $student_obtained_marks = $student_marks[$id];
  return $student_obtained_marks;
}

function output_subjects($id, $grade) {
  global $student_marks;
  global $sub_arr;
  $output_fromat = array(
    "$id" => array(
      "M" => array(
        "obtained_marks" => $student_marks['M'],
        "pass_marks" => $sub_arr[$grade]['1']['pass_marks']
      ),
      "C" => array(
        "obtained_marks" => $student_marks['C'],
        "pass_marks" => $sub_arr[$grade]['2']['pass_marks']
      ),
    )
  );
  return $output_fromat;
}

function number_of_sub_passed($id) {
  global $student_marks;
  $comp_marks_obtained = $student_marks[$id]['C'];
  $math_marks_obtained = $student_marks[$id]['M'];
  return ($comp_marks_obtained >= 35 && $math_marks_obtained >= 35);
}

?>