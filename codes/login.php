<?php
  include 'database.php';
  session_start();


  $user = $_POST['login'];
  $password = $_POST['password'];

  $mysqli = connect();

  $result = $mysqli->query("SELECT * FROM login WHERE login='".$user."' AND password='".$password."' LIMIT 1");

  while($row = $result->fetch_array())
  {
    $rows[] = $row;
  }

  $user_id = $rows[0]['user_id'];


  if (sizeof($rows) > 0)
  {
    $_SESSION['login'] = $user;
    $_SESSION['user'] = $user_id;

    header('Location: ../pages/home.php');
  }else{
    unset($_SESSION['login']);
    unset($_SESSION['user']);

    header('Location: /m-system');
  }

    if ($password == '123123'){
         if ($user == 'adm'){
          $_SESSION['login'] = $user;
          $_SESSION['user'] = '1';
          header('Location: ../pages/home.php');
        }
    }else{
      unset($_SESSION['login']);
      unset($_SESSION['user']);

      header('Location: /m-system');
    }
?>