<?php

  class player
  {
    public $player_id = "";
    public $name ="";
    public $runs = "";

    function __construct($player_id, $player_name)
    {
      $this->player_id = $player_id;
      $this->name = $player_name;
    }
  }


?>