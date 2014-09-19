<?php 

  include 'database.php';
  
  $schedule_id = $_POST['schedule_id'];
  $posts = array($_POST['0'], $_POST['1'], $_POST['2'],$_POST['3'], $_POST['4'], $_POST['5'], $_POST['6']);
  foreach($posts as $post)
  { 
    $sday = ($_POST["s_".$post] != "") ? $_POST["s_".$post] : '-----';
    $eday = ($_POST["e_".$post] != "") ? $_POST["e_".$post] : '-----';
    update('hour', array('start', 'end'), array($sday, $eday), "WHERE schedule_id='$schedule_id' AND week_day='$post'");
  }

   header('Location: ../pages/schedule.php');
?>