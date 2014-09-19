<?php
  include 'database.php';
  
  $course = $_POST['course'];
  $monitor = $_POST['monitor'];
  $course_id = $_POST['course_id'];
  
  if($course == "" || $monitor == "")
  {
    header('Location: ../pages/courses.php');
  }
  else
  {
    update('course', array('name', 'user_id'), array($course, $monitor), "WHERE id='$course_id'");
    header('Location: ../pages/courses.php');
  }

?>