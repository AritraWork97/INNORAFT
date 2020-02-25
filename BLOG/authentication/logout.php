<?php

  session_start(); /* Starts the session */
  $_SESSION['userid'] = "";
  $_SESSION['username'] = "";
  session_destroy(); /* Destroy started session */
  header("location:login.html");  /* Redirect to login page */
  exit;
