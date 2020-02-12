<?php

    include '../vendor/autoload.php';

    include_once 'data.php';

    function get_random_number()
    {
        return rand(1,100);

    }

    $runs = array();
    $i = 0;
    foreach($team_details as $index => $team_players)
    {
        $team = "team".$index;
        foreach($team_players as $player_index => $player_details)
        {
            //$runs[$team][$i]['name'][] = $player_details['player_name'];
            $runs[$team][] = get_random_number();
            $i++;
        }
    }
    //d($runs);
?>