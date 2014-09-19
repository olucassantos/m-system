<?php
  include 'database.php';
  
  $id = $_POST['user_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $email = $_POST['email'];

  $rg = $_POST['rg'];
  $ra = $_POST['ra'];
  $cpf = $_POST['cpf'];
  $account = $_POST['account'];

  $login = $_POST['login'];
  $password = $_POST['password'];
  
  if($name == "" || $address == "" || $phone == "" || $age == "" || $rg == "" || $ra == "" || $cpf == "" || $account == "" || $login == "" || $password == "")
  {
    header('Location: ../pages/monitors.php');
  }
  else{
    update('user', array('name', 'address', 'phone', 'cpf', 'rg', 'ra', 'account', 'age', 'email'), array($name, $address, $phone, $cpf, $rg, $ra, $account, $age, $email), "WHERE id='$id'");
    update('login', array('login', 'password'), array($login, $password), "WHERE user_id='$id'");
  }

  header("Location: ../pages/profile.php?id=".$id);
?>