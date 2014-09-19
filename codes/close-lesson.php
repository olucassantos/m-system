<?php
  include 'database.php';
  session_start();

  date_default_timezone_set('America/Sao_Paulo');
  $lesson = $_POST['lesson'];
  
  if($lesson == "")
  {
    header('Location: /');
  }
  else
  {
    $time_end = date('H:i:s');
    update('lesson', array('end', 'active', 'closed_by'), array(date('Y-m-d H:i:s'), 'false', $_SESSION['user']), "WHERE id='$lesson'");
    header('Location: /');
  }

?>