<?php

namespace student;

class student 
{
  public $name = "";
  public $gender = "";

  function __construct($details){
    $this->name = $details['name'];
    $this->gender = $details['gender'];
  }
}


?>