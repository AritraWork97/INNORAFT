<?php

include 'data.php';
include 'loader.php';

use \college\college as college;
use \document\document as document;

$coll_name = 0;
$k = 0;

$documents = array();
$colleges = array();

$count_colleges = count($college_name);

foreach($document_data as $index => $data)
{
    $documents[] = new document($data);
}

for($coll_name = 0; $coll_name < $count_colleges; $coll_name++)
{
    $colleges[$college_name[$coll_name]] = new college($college_name[$coll_name]);
}

foreach($colleges as $coll_name => $coll_details)
{
    //print_r($document_data);
    foreach($document_data as $index => $docu_details)
    {
        if($coll_name == $docu_details['document_college'] || strlen($docu_details['name']) < 1)
        {
            $colleges[$coll_name]->document_details[] = $docu_details;
        }
    }
}

foreach($colleges as $coll_name => $coll_details)
{
    $coll_details_count = count($colleges[$coll_name]->document_details);
    for($k = 0; $k < $coll_details_count; $k++)
    {
        if($colleges[$coll_name]->document_details[$k]['sent'] == 1)
        {
            $colleges[$coll_name]->document_details[$k]['sent'] = "Success";
        } else {
            $colleges[$coll_name]->document_details[$k]['sent'] = "Fail";
        }
    }
}

foreach($colleges as $coll_id => $coll_details)
{
    print_r($coll_id);
    echo "<br>";
    print_r($coll_details);
    echo "<br>";
}

/*echo "<table border='2' class='stats' cellspacing='0'>
                  <tr>
                   <th>Name</th>
                   <th>Dob</th>
                   <th>Grade</th>
                   <th>Subjects</th>
                   <th>Result</th>
                  </tr>";

                  echo "</tr>";
                  foreach($colleges as $coll_name => $coll_details){
                     echo "<tr>";
                     echo "<td>" . $colleges[$coll_name] . "</td>";
                     /*foreach($coll_details as $index => $coll_details_1)
                     {
                        echo "<td>" . $coll_details[$index]->name . "</td>";
                        echo "<td>" . $coll_details[$index]->type . "</td>";
                        echo "<td>" . $colleges[$coll_name]->document_college."</td>";
                        echo "<td>" . $colleges[$coll_name]->sent . "</td>";
                     }
                     echo "</tr>"; 
            }*/




?>