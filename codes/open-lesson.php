<?php
  include 'database.php';
  session_start();

  date_default_timezone_set('America/Sao_Paulo');
  $course = $_POST['course'];
  
  if($course == "")
  {
    header('Location: / ');
  }
  else
  {
    if(active_lesson_by_courseid($course) == ''){
      $user = user_by_course_id($course);
      insert('lesson', array('start', 'course_id', 'active', 'open_by', 'user_id'), array(date('Y-m-d H:i:s'), $course, true, $_SESSION['user'], $user['id']));
      header('Location: /');

    }else{
      header('Location: /');
    }
  }

?>