<?php

  session_start(); /* Starts the session */
  $_SESSION['userid'] = "";
  $_SESSION['username'] = "";
  session_destroy(); /* Destroy started session */
  header("location:http://aritra.com");  /* Redirect to login page */
  exit;
