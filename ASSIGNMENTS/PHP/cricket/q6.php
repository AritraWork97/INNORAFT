<?php
    $i = 1;
    $match_a = array(
        "kolkata" => array(
            "a" => 6,
            "b" => 5,
            "c" => 55,
            "d" => 52,
            "e" => 59,
            "f" => 48,
            "g" => 22,
            "h" => 58,
            "i" => 98,
            "j" => 2,
            "k" => 5
        ),
        "delhi" => array(
            "ac" => 6,
            "bf" => 5,
            "ce" => 55,
            "dr" => 5,
            "eq" => 59,
            "fg" => 48,
            "gh" => 2,
            "hk" => 58,
            "io" => 78,
            "jj" => 2,
            "kl" => 5
        )
    );

    $highest_scorer = array(
        "1" => array(
            "name" => "",
            "runs" => 0
        ),
        "2" => array(
            "name" => "",
            "runs" => 0
        ),
    );

    $match_stats = array(
        "runs_scored" => array(
            "1" => 0,
            "2" => 0
        ),
        "highest_scorer" => array(
            "name" => "",
            "runs" => ""
        ) 
    );

    foreach($match_a as $key => $val){
        $high_name = "";
        $total_runs = 0;
        $previous_highest = 0;
        if(is_array($val) == true)
        {
            foreach($val as $player => $run){
                $total_runs = $total_runs + $run;
                if($run > $previous_highest) {
                    $previous_highest = $run;
                    $high_name = $player;
                }
            }
        }
        $match_stats['runs_scored'][$i] = $total_runs;
        $highest_scorer[$i]['name'] = $high_name;
        $highest_scorer[$i]['runs'] = $previous_highest;
        $i++;
        $total_runs = 0;
    }

    if($highest_scorer[1]['runs'] > $highest_scorer[2]['runs']){
        $match_stats['highest_scorer']['name'] = $highest_scorer[1]['name'];
        $match_stats['highest_scorer']['runs'] = $highest_scorer[1]['runs'];
    } else {
        $match_stats['highest_scorer']['name'] = $highest_scorer[2]['name'];
        $match_stats['highest_scorer']['runs'] = $highest_scorer[2]['runs'];
    }



    print_r($match_stats);
    //print_r($highest_scorer);

?>