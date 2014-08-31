<?php
  include 'database.php';
  session_start(); 
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['user']) == true))
  { 
    unset($_SESSION['login']);
    unset($_SESSION['user']);
    header('location: /m-system');
  }
?>