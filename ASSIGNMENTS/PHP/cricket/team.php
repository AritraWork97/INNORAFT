<?php


include '../vendor/autoload.php';

class team {
   public $players = array(
       ""=>array(
           "name" => "",
           "value" => array(
               "player_name" => "",
               "runs" => 0
           )
         )
        );

    function __construct($key, $val) {
        //th'index' = 0;
        $i =1;
        $this->players['name'] = $key;
        foreach($val as $name => $runs)
        {
            //d($name, $runs);
            $this->players['value']['player_name'][] = $name;
            $this->players['value']['runs'][] = $runs;
            $i++;
        }
        //d($this->players);

      }
}



?>