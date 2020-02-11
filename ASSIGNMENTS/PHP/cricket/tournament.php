<?php

include 'match.php';
include 'data.php';

$matches = new match($team_1, $team_2);

print_r($matches->team_b);

?>