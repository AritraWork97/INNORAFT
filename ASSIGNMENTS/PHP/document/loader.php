<?php

function autoloadcollege() {
    $filename = "create_college.php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloaddocument() {
    $filename = "create_document.php";
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register('autoloadcollege');
spl_autoload_register('autoloaddocument');

?>