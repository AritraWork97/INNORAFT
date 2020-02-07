<?php
$res = array();

function check_diff_multi($array1, $array2){
    $result = array();
    foreach($array1 as $key => $val) {
        if(is_array($val) && isset($array2[$key])) {
            $tmp = check_diff_multi($val, $array2[$key]);
            if($tmp) {
                $result[$key] = $tmp;
            }
        }
        elseif(!isset($array2[$key])) {
            $result[$key] = $val;
        }
        elseif($val !== $array2[$key]) {
            $result[$key] = $array2[$key];
        }
        else {
            unset($array2[$key]);
        }
    }
    $result = array_merge($result, $array2);
    return $result;
}
$array2 = array("a" => "green", "b" => "brown", "100" => array("1"=>"red","orange"), "yellow");
$array1 = array("a" => "green","100"=>array("1"=>"red","violet"), "yellow","four");

$res = check_diff_multi($array1, $array2);

foreach($res as $key => $val)
{
    if(is_array($val) == true)
    {
        foreach($val as $key1 => $val1)
        {
            echo $key1 ."\t => ".$val1." ";
            echo "<br>";
        }
    } else {
     echo $key ."\t => ".$val." ";
     echo "<br>";
    }
}

?>