<?php

$i = 1;
$j = 0;
$k = 1;

echo "<table border='2' class='stats' cellspacing='0'>";
for($i = 1; $i <= 6; $i++)
{
    echo "<tr>";
    for($j = 1; $j <= 5; $j++)
    {
        echo "<td>" . $k . "x".$j." = ".($i * $j)."</td>";
    }
    echo "</tr>";
    $k++;
}

?>