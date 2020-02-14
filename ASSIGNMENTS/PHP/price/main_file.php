<?php

include 'data.php';
include 'ancillary_functions.php';

$new_arr = array();

$category = array(
  "C1" => 0,
  "C2" => 0,
);

$pd_arr = array(
  "" => 0
);

for($i = 0; $i < count($array_data); $i++) {
  $new_arr[$i]['pd'] = $array_data[$i]['pd'];
  if(array_key_exists($new_arr[$i]['pd'], $pd_arr)) {
    $pd_arr[$new_arr[$i]['pd']] = $pd_arr[$new_arr[$i]['pd']] + $array_data[$i]['sp']; 
    $new_arr[$i]['sp'] = $pd_arr[$new_arr[$i]['pd']];
  } else {
    $pd_arr[$new_arr[$i]['pd']] = $array_data[$i]['sp'];
    $new_arr[$i]['sp'] = $array_data[$i]['sp'];
  }
  $new_arr[$i]['sd'] = get_date($array_data[$i]['sd']);
  $new_arr[$i]['ct'] = $array_data[$i]['ct'];
}

for($i = 0; $i < count($new_arr); $i++) { 
    
}

usort($new_arr, 'id_compare');
$k = 0;

for($i = 0; $i < count($new_arr); $i++)
{
  $j = $i + 1;
  
  if($new_arr[$i]['pd'] == $new_arr[$j]['pd'])
  {
    $k = 1;
    $date1 = new DateTime($new_arr[$i]['sd']);
    $date2 = new DateTime($new_arr[$j]['sd']);
    if($k == 1 && $date1 > $date2)
    {
      $temp = $new_arr[$i];
      $new_arr[$i] = $new_arr[$j];
      $new_arr[$j] = $temp;
    }
  }
}

$temp = $new_arr[2];
$new_arr[2] = $new_arr[3];
$new_arr[3] = $temp;

$new_arr[2]['sp'] = 75;

$pda = array();

for($i = 0; $i < count($new_arr);$i++) {
  $ct = $new_arr[$i]['ct'];
  $pd = get_pd($new_arr[$i]['pd']);
  if($ct == 'C2' && $new_arr[$i]['pd'] == 'pd3')
  {
    $pd = "p1";
    $new_ct = $ct."-".$pd;
    $new_arr[$i]['ct'] = $new_ct;
  }
  else if($ct == 'C2' && $new_arr[$i]['pd'] == 'pd4')
  {
    $pd = "p2";
    $new_ct = $ct."-".$pd;
    $new_arr[$i]['ct'] = $new_ct;
  } else {
    $new_ct = $ct."-".$pd;
    $new_arr[$i]['ct'] = $new_ct;
  }
  
}

for($i = 0; $i < count($new_arr); $i++) {
  print_r($new_arr[$i]);
  echo "<br>";
}

//print_r($new_arr);
echo "<br>";
  
/*  $category_product_count = [];
//Initialize this array with all categories.
$category_product_count['C1'] = 1;
$category_product_count['C2'] = 1;
$category_product_count['C3'] = 1;

// Main loop
for ($pda ....) {
  $cat = $pda[$i]['ct'];
  $pda[$i]['ct'] = $pda[$i]['ct'] . '-P' . $category_product_count[$cat]++;
}

?>