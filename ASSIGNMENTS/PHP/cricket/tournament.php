<?php


include '../vendor/autoload.php';

include 'loader.php';

include_once 'data.php';
include_once 'match_data.php';
include_once 'match_ancillary_functions.php';


use \team\team as newteam;
use \match\match as newmatch;

$teams = array();

for($i = 0; $i < 4; $i++)
{
  $team_id = "team".$i;
  $teams[] = new newteam($team_id,$team_details[$i]);
} 

//d($teams);

for($j = 0; $j < 6; $j++)
{
  shuffle($teams);
  $team_1_runs =  $runs[$teams[0]->team_id];
  $team_2_runs =  $runs[$teams[1]->team_id];
  $matches[] = new newmatch($teams[0], $teams[1], $team_1_runs, $team_2_runs);
}

$tournament_highest_scorer = 0;


for($i = 0; $i < count($matches); $i++)
{
  $matches[$i]->match_details['match_won_by'] = match_won_by($matches[$i]);
  $matches[$i]->match_details['highest_scorer'] = get_highest_scorer_in_a_match($matches[$i]);
  update_win_record($matches[$i]->match_details['match_won_by'], $i);
  if($tournament_highest_scorer < $matches[$i]->match_details['highest_scorer'])
  {
  $tournament_highest_scorer = $matches[$i]->match_details['highest_scorer'];
  }

}

$team_name = "";
$number_of_wins = 0;

for($i = 0; $i < count($teams); $i++)
{
  if ($teams[$i]->matches_won > $number_of_wins) {
   $number_of_wins = $teams[$i]->matches_won;
   $team_name = $teams[$i]->team_id;
  }
}

echo "Tournament Won By ".$team_name;
echo "<br>";
echo "The highest score made by a player is ".$tournament_highest_scorer;
d($teams);


?>