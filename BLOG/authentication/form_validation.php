<?php

$password = "";

if(isset($_POST['firstname'])) {
    if(empty($_POST['firstname'])){
        echo "false";
    } else {
        echo "true";
    }
}

if(isset($_POST['lastname'])) {
    if(empty($_POST['lastname'])){
        echo "false";
    } else {
        echo "true";
    }
}

if(isset($_POST['password'])) {
    if(empty($_POST['password'])){
        echo "false";
    } else {
        $password = $_POST['password'];
        echo "true";
    }
}

if(isset($_POST['check_password'])) {
    if(!empty($_POST['check_password']) && $_POST['password'] == $_POST['check_password']){
        echo "true";
    } else {
        echo "false";
    }
}

if(isset($_POST['email'])) {
    if(empty($_POST['email'])){
        echo "false";
    } else {
        echo "true";
    }
}

if(isset($_POST['mobilenumber'])) {
    if(empty($_POST['mobilenumber'])){
        echo "false";
    } else {
        echo "true";
    }
}

if(isset($_POST['address'])) {
    if(empty($_POST['address'])){
        echo "false";
    } else {
        echo "true";
    }
}