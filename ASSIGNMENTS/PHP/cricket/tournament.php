<?php

include_once 'match.php';
include_once 'data.php';
include_once 'team.php';


$teams = array();

for($i = 0; $i < 5; $i++)
{
  $team_id = "team".$i;
  $teams[$i] = new team($team_id,$team_details[$i]);
} 

for($j = 0; $j < 6; $j++)
{
  shuffle($teams);
  $matches[] = new match($teams[0], $teams[1]);
}

for($k = 0; $k < count($matches); $k++)
{
  print_r($matches[$k]->match_details);
  echo "<br>";
}

?>