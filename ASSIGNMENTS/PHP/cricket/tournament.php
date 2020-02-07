<?php

include 'match.php';

class tournamnet
{
    function test(){
        $obj = new match();
        print_r($obj->create_obj());
    }
}

$obj1 = new tournamnet();
print_r($obj1->test());

?>