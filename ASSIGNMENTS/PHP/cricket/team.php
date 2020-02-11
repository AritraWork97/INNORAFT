<?php


include '../vendor/autoload.php';


class team
{
    public $team_id = "";
    public $team_players = array();

    function __construct($id, $players)
    {
        $this->team_id = $id;
        $this->team_players = $players;
    }
}



?>