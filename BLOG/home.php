<?php

if ('/PHP/BLOG/home.php/index' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    include './blog/view/index.php';
    exit;
} else if ('/PHP/BLOG/home.php/show_my_posts' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    header('location:../blog/view/show_my_post.php');
    exit;
} else if ('/PHP/BLOG/home.php/create_post' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    header('location:../blog/view/create_post.php');
    exit;
} else if ('/PHP/BLOG/home.php/login' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    header('location:../authentication/login.html');
    exit;
} else if ('/PHP/BLOG/home.php/logout' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    header('location:../authentication/logout.php');
    exit;
} else if ('/PHP/BLOG/home.php/register' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    header('location:../authentication/register.html');
    exit;
} else if ('/PHP/BLOG/home.php' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    header('location:../BLOG/blog/view/index.php');
    exit;
} else if ('/PHP/BLOG/home.php/show_individual_post' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    $query_param = parse_url($_SERVER['REQUEST_URI'])['query'];
    $blog_id = substr($query_param,5);
    header("location:../blog/view/show_blog.php?data=".$blog_id);
} else if ('/PHP/BLOG/home.php/delete_individual_post' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    $query_param = parse_url($_SERVER['REQUEST_URI'])['query'];
    $blog_id = substr($query_param,5);
    header("location:../blog/controller/delete_my_post.php?data=".$blog_id);
} else if ('/PHP/BLOG/home.php/update_data' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    $query_param = parse_url($_SERVER['REQUEST_URI'])['query'];
    $blog_id = substr($query_param,5);
    header("location:../blog/view/update_data.php?data=".$blog_id);
}