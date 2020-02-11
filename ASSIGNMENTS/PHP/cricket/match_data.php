<?php

    function get_random_number()
    {
        return rand(1,100);

    }

    $runs_scored = array(
        "team2" => array(
            "Aritra" => get_random_number(),
            "Tanaya" => get_random_number(),
            "Atrima" => get_random_number(),
            "Arnab" =>  get_random_number(),
            "Swaraj" => get_random_number(),
            "Debadrita" => get_random_number(),
            "Avirup" => get_random_number(),
            "Anwesha Sharma Sarkar" => get_random_number() 
        ),
        "team1" => array(
            "Aritra" => get_random_number(),
            "Tanaya" => get_random_number(),
            "Atrima" => get_random_number(),
            "Arnab" => get_random_number(),
            "Swaraj" => get_random_number(),
            "Debadrita" => get_random_number(),
            "Avirup" => get_random_number(),
            "Anwesha Sharma Sarkar" => get_random_number()
        ),
    );
?>