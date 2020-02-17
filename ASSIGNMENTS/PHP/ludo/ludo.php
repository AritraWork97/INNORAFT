<?php

include 'ancillary_functions.php';

$ludo_blocks_blue = [1]; // positions available for Yogita
$ludo_blocks_green = [1,2,3]; // positions available for zubin

function game_winner($moves){
  global $ludo_blocks_blue;
  global $ludo_blocks_green;
  $turn = 1;
  $moves_array = str_split($moves);
  for($i = 0; $i < count($moves_array); $i++) {
      if($turn == 1) {
        for($k = 0; $k < count($ludo_blocks_green); $k++)
        {
            if($ludo_blocks_green[$k] == $moves[$i]) {
                $ludo_blocks_green[$k] = 0;
                //$i = $i + 1;
                 break;
                
            } else if($ludo_blocks_green[$k] >= $moves[$i]) {
                    $ludo_blocks_green[$k] -= $moves[$i];
                    $turn = 0;
                    break;
                    
            } else if($ludo_blocks_green[$k] < $moves[$i]){
                $turn = 0;
                break;   
            } 
         }
         continue;
        } else if($turn == 0){
            if($ludo_blocks_blue[0] == $moves_array[$i] ) {
                $ludo_blocks_blue[0] = 0;
                //$i = $i + 1;
              } else {
                  //echo $moves_array[$i];
                  $turn = 1;
                  continue;
              
              }
        }
        print_r($ludo_blocks_blue);
        echo "<br>";
        if(check_non_zero_number($ludo_blocks_blue) == false)
        {
            return "Yogita Wins in ".($i+1)." Moves";
        } else if(check_non_zero_number($ludo_blocks_green) == false) {
            return "Zubin Wins in ".($i+1)." Moves";
        } else {
            continue;
        }

      } 
}

?>
 