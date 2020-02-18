<?php


class post {
    public $author_name = "";
    public $blog_title = "";
    public $blog_content = "";
    public $blog_created_on = "";

    function __construct($name, $title, $content, $date) {
        $this->author_name = $name;
        $this->blog_title = $title;
        $this->blog_content = $content;
        $this->blog_created_on = $date;        
    }
}