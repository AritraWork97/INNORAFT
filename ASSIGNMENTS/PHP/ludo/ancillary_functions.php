<?php

function check_non_zero_number($match_val) {
    for($i = 0; $i <= count($match_val); $i++) {
        if($match_val[$i] > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>