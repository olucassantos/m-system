<?php
  include 'database.php';
  
  $course = $_POST['course'];
  $monitor = $_POST['monitor'];
  
  if($course == "" || $monitor == "")
  {
    echo "Errot";
    $error = "error";
    header('Location: ../pages/courses.php');
  }
  else
  {
    $error = "";
    insert('course', array('name', 'user_id'), array($course, $monitor));
    header('Location: ../pages/courses.php');
  }

?>