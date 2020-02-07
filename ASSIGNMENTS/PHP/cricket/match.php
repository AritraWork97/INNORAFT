<?php
    include ('team.php');
    include '../vendor/autoload.php';

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

    class match
    {
        function create_obj(){
            global $match_a;
            //print_r($match_a);
            // $i = 1;
            $teams = array();
            foreach($match_a as $key => $val){
                $teams[] = new team($key, $val);
                // $i++;
            }
            d($teams);
            echo $teams->players;
            // foreach($teams as $team_index => $team_val){
            //    // d($team_val);
            //     foreach($team_val as $team_name => $team_details){
            //         //d($team_details);
            //         echo "<br>";
            //     }
            // }
            //d($teams);
        }
    }

?>