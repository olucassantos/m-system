<?php
  include 'database.php';
  
  $price = $_POST['price'];
  $month = $_POST['month'];
  
  if($price == "" || $month == "")
  {
    header('Location: ../pages/prices.php');
  }
  else
  {
    insert('price', array('value', 'month'), array($price, $month));
    header('Location: ../pages/prices.php');
  }
?>