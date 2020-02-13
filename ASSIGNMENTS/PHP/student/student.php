<?php

namespace student;

class student 
{
    public $id = "";
    public $name = "";
    public $dob = "";
    public $grade = "";
    public $marks_obtained = array();
    public $passed = "";

    function __construct($details){
        $this->name = $details['name'];
        $this->id = $details['id'];
        $this->grade = $details['grade'];
        $this->dob = date("Y/m/d", $details['dob']);
    }
}


?>