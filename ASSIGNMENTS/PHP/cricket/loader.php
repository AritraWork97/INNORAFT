<?php

function autoloadmatch() {
  $filename = "match.php";
  if (is_readable($filename)) {
    require $filename;
  }
}

function autoloadteam() {
  $filename = "team.php";
  if (is_readable($filename)) {
    require $filename;
  }
}

function autoloadmatch_ancillary_function() {
  $filename = "match_ancillary_functions.php";
  if (is_readable($filename)) {
    require $filename;
  }
}

function autoloaddata() {
  $filename = "data.php";
  if (is_readable($filename)) {
    require $filename;
  }
}

spl_autoload_register('autoloadmatch');
spl_autoload_register('autoloadteam');
spl_autoload_register('autoloadmatch_ancillary_function');
spl_autoload_register('autoloaddata');

?>