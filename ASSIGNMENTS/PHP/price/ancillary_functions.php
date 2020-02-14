<?php


include 'data.php';

function get_date($date_format){
  $date_num = substr($date_format,0,1);
  $month = substr($date_format, 3,5);
  $new_date = "2020/02/0".$date_num;
  return $new_date;
}

function id_compare($element1, $element2) { 
    $datetime1 = $element1['pd']; 
    $datetime2 = $element2['pd']; 
    return $datetime1 >= $datetime2; 
}  

function date_compare($element1, $element2) {
    $date1 = strtotime($element1['sd']);
    $date2 = strtotime($element2['sd']);
    return $date1 - $date2;    
}

function get_pd($str) {
    $new_str = $str[0]."".$str[-1];
    return $new_str;
}

?>