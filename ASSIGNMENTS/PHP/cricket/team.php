<?php


include '../vendor/autoload.php';


class team
{
    public $team_id = "";
    public $team_players = array();
    public $matches_won = 0;

    function __construct($id, $players)
    {
        $this->team_id = $id;
        $this->team_players = $players;
    }
}



?>