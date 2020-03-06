<?php

if ('/PHP/BLOG/home.php/index' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  $url = "";
  include './blog/view/index.php';
} else if ('/PHP/BLOG/home.php' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  $url = '/PHP/BLOG/home.php';
  var_dump(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  header('location: ./blog/view/index.php');
  exit;
} else if ('/PHP/BLOG/home.php/show_my_posts' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './blog/view/show_my_post.php';
} else if ('/PHP/BLOG/show_my_posts' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './blog/view/show_my_post.php';
} else if ('/PHP/BLOG/home.php/create_post' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './blog/view/create_post.php';
} else if ('aritra.com/login' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './authentication/login.html';
} else if ('/PHP/BLOG/home.php/logout' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './authentication/logout.php';
} else if ('/PHP/BLOG/home.php/register' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './authentication/register.html';
} else if ('/PHP/BLOG/home.php/show_individual_post' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  $blog_id = "";
  if (isset(parse_url($_SERVER['REQUEST_URI'])['query'])) {
    $query_param = parse_url($_SERVER['REQUEST_URI'])['query'];
    $blog_id = substr($query_param, 5);
  }
  include './blog/view/show_blog.php';
} else if ('/PHP/BLOG/home.php/delete_individual_post' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  $query_param = parse_url($_SERVER['REQUEST_URI'])['query'];
  $blog_id = substr($query_param, 5);
  include './blog/controller/delete_my_post.php';
} else if ('/PHP/BLOG/home.php/update_data' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  $query_param = parse_url($_SERVER['REQUEST_URI'])['query'];
  $blog_id = substr($query_param, 5);
  include './blog/view/update_data.php';
} else if ('/PHP/BLOG/home/index' == parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
  include './blog/view/index.php';
} else {
  $url = "";
  include './blog/view/index.php';
}
