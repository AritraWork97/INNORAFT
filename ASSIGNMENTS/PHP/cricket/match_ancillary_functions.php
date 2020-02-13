<?php

  include '../vendor/autoload.php';

  include_once 'tournament.php';

    function get_highest_team_scorer($runs) {
      $highest_run = 0;
      foreach($runs as $index => $run) {
        if ($run > $highest_run) {
          $highest_run = $run;
        }
      }
      return $highest_run;
    }

    function get_highest_scorer_in_a_match($match) {
      $team_1_highest_score = get_highest_team_scorer($match->match_details['team1_runs']);
      $team_2_highest_score = get_highest_team_scorer($match->match_details['team2_runs']);
      if ($team_2_highest_score > $team_1_highest_score) {
        return $team_2_highest_score;
      }
      else {
        return $team_1_highest_score;
      }
    }

    function get_team_score($runs) {
      $total_runs = 0;
      foreach($runs as $index => $runs) {
        $total_runs = $total_runs + $runs;
      }
      return $total_runs;
    }

    function match_won_by($match) {
      $team_1_score_arr = $match->match_details['team1_runs'];
      $team_2_score_arr = $match->match_details['team2_runs'];

      //d($match);

      $team_1_total_runs = get_team_score($team_1_score_arr);
      $team_2_total_runs = get_team_score($team_2_score_arr);

      if ($team_1_total_runs > $team_2_total_runs) {
        return $match->team_a->team_id;
      } else {
        return $match->team_b->team_id;
      }
  }

  function update_win_record($match_won_by, $index) {
      global $teams;
      global $matches;
      for($i = 0; $i < count($teams); $i++) {
        if ($teams[$i]->team_id == $matches[$index]->match_details['match_won_by']) {
          $teams[$i]->matches_won = $teams[$i]->matches_won + 1;
          break;
        }
     }
  }

?>