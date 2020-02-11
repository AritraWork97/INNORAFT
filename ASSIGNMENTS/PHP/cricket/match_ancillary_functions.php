<?php

    include 'match_data.php';
    //include 'match.php';

    function get_highest_scorer_in_a_match()
    {
        global $runs_scored;
        
        $i = 1;

        $team_1_highest_scorer = array(
            "name" => "",
            "runs" => 0
        );
        $team_2_highest_scorer = array(
            "name" => "",
            "runs" => 0
        );

        foreach($runs_scored as $team => $runs)
        {
            $highest_player_name = "";
            $highest_runs = 0;
            foreach($runs as $player_name => $runs)
            {
                if($runs > $highest_runs)
                {
                    $highest_runs = $runs;
                    $highest_player_name = $player_name;
                }   
            }
            if($i == 1)
            {
                $team_1_highest_scorer['name'] = $highest_player_name;
                $team_1_highest_scorer['runs'] = $highest_runs;
            }
            else if($i == 2)
            {
                $team_2_highest_scorer['name'] = $highest_player_name;
                $team_2_highest_scorer['runs'] = $highest_runs;
            }
                
        
            $i++;
        }
        if($team_1_highest_scorer['runs'] > $team_2_highest_scorer['runs'])
        {
            return $team_1_highest_scorer;
        }
        else 
        {
            return $team_2_highest_scorer;
        }
    }

    function get_team_score($team_details)
    {
        $total_runs = 0;
        
        foreach($team_details as $name => $runs)
        {
            $total_runs = $total_runs + $runs;
        }
        
        return $total_runs;
    }

    function match_won_by()
    {
        global $runs_scored;
        $i = 0;
        $total_runs = array(
            "0" => array(
                'name' => '',
                'runs' => ''
            )
        );
        
        foreach($runs_scored as $team => $runs)
        {
            $total_runs[$i]['name'] = $team;
            $total_runs[$i]['runs'] = get_team_score($runs);
            $i++;
            
        }
        arsort($total_runs);
        return (array_slice($total_runs,0,1))[0];

   }
    

?>