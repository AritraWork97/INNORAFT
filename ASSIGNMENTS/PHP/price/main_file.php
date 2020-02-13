<?php

include 'data.php';

$new_arr = array();

$category = array(
  "C1" => 0,
  "C2" => 0,
);

$pd_arr = array();

for($i = 0; $i < count($array_data); $i++) {
  $new_arr[$i]['pd'] = $array_data[$i]['pd'];

  if(in_array($array_data[$i]['pd'], $pd_arr)) {
    $new_arr[$i]['ct'] =  $array_data[$i]['ct']."-"."p".$category[$array_data[$i]['ct']];
  } else {
    $category[$array_data[$i]['ct']] += 1;
    $new_arr[$i]['ct'] =  $array_data[$i]['ct']."-"."p".$category[$array_data[$i]['ct']];
  }
  $new_arr[$i]['sp'] = $array_data[$i]['sp'];
  

}

print_r($new_arr);
echo "<br>";
  


?>