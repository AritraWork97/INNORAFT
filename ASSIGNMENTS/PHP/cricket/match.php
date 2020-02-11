<?php
    include '../vendor/autoload.php';

    include 'team.php';
    include 'match_data.php';
    include 'match_ancillary_functions.php';
    
    class match
    {
        public $team_a = array();
        public $team_b = array();
        public $match_details = array();

        function __construct($team_1, $team_2)
        {
            $this->team_a = $team_1;
            $this->team_b = $team_2;
            $this->match_details['highest_run_scorer'] = get_highest_scorer_in_a_match();
            $this->match_details['match_won_by'] = (match_won_by())['name'];
        }
        
    }

?>