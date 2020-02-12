<?php
    include '../vendor/autoload.php';

    include_once 'team.php';
    include_once 'match_data.php';
    include_once 'match_ancillary_functions.php';
    
    class match
    {
        public $team_a = array();
        public $team_b = array();
        public $match_details = array();

        function __construct($team_1, $team_2, $team1_runs, $team2_runs)
        {
            $this->team_a = $team_1;
            $this->team_b = $team_2;
            $this->match_details['team1_runs'] = $team1_runs;
            $this->match_details['team2_runs'] = $team2_runs;
        }
        
    }

?>