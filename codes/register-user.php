<?php
  include 'database.php';
  
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
    insert('user', array('name', 'address', 'phone', 'cpf', 'rg', 'ra', 'account', 'age', 'email'), array($name, $address, $phone, $cpf, $rg, $ra, $account, $age, $email));
    insert('login', array('login', 'password', 'user_id'), array($login, $password, userid_by_rg($rg)));
  }

  insert('schedule', array('user_id'), array(userid_by_name($name)));

  $posts = array($_POST['0'], $_POST['1'], $_POST['2'],$_POST['3'], $_POST['4'], $_POST['5'], $_POST['6']);
  foreach($posts as $post)
  { 
    $sday = ($_POST["s_".$post] != "") ? $_POST["s_".$post] : '-----';
    $eday = ($_POST["e_".$post] != "") ? $_POST["e_".$post] : '-----';
    insert('hour', array('week_day', 'start', 'end', 'schedule_id'), array($post, $sday, $eday, scheduleid_by_userid(userid_by_name($name))));
  }

  header('Location: ../pages/monitors.php');
?>