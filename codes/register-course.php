<?php
  include 'database.php';
  
  $course = $_POST['course'];
  $monitor = $_POST['monitor'];
  
  if($course == "" || $monitor == "")
  {
    header('Location: ../pages/courses.php');
  }
  else
  {
    insert('course', array('name', 'user_id'), array($course, $monitor));
    header('Location: ../pages/courses.php');
  }

?>