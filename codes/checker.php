<?php
  include 'database.php';
  include 'helper.php';
  session_start(); 
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['user']) == true))
  { 
    unset($_SESSION['login']);
    unset($_SESSION['user']);
    header('location: /');
  }
?>