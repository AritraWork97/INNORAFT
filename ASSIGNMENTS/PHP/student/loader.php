<?php

function autoloadstudent() {
    $filename = "student.php";
    if (is_readable($filename)) {
        require $filename;
    }
}



spl_autoload_register('autoloadstudent');


?>