<?php

namespace college;

class college {
  
  public $coll_name = "";
  public $document_details = array();

  function __construct($coll_name) {
    $this->coll_name = $coll_name;
  }
}

?>