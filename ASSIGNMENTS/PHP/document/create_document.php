<?php


namespace document;

class document{
    public $name ="";
    public $type ="";
    public $document_college ="";
    public $sent ="";

    function __construct($details)
    {
        $this->name = $details['name'];
        $this->type = $details['type'];
        $this->document_college = $details['document_college'];
        $this->sent = $details['sent'];
    }
}

?>