<?php

  function string_courses($courses)
  {
    $courses_line = '';

    for ($i=0; $i < (sizeof($courses) - 1); $i++) { 
      $courses_line .= $courses[$i]['name'] . ', ';
    }

    $courses_line .= $courses[sizeof($courses) - 1]['name'];
    return $courses_line;
  }

  function lesson_duration_by_id($id)
  {
    $time = select_start_end_lesson($id);
    $start = strtotime($time[0]);
    $end = strtotime($time[1]);
    
    $total = ((strtotime($time[1]) - strtotime($time[0])) / 60);

    return round($total);
  }

  function total_time_course_by_user_month($id, $month)
  {
    $lessons = lessons_by_month_and_user($id, $month); 

    $total_month = 0;
    if (isset($lessons))
    {
      foreach($lessons as $lesson)
      {
       $total_month += lesson_duration_by_id($lesson['id']);
      }
    }
    return $total_month;
  }

  function salary_value_by_user_month($id, $month)
  {
    $time = total_time_course_by_user_month($id, $month);

    $value = value_of_active_price($month);
    $value_per_minute = ($value / 60);

    return round(($time * $value_per_minute), 2);
  }

  function minutes_to_hours($mins) {

    $min = $mins;

    $h = floor($min / 60);
    $m = ($min - ($h * 60)) / 100;
    $horas = $h + $m;

    if ($mins < 0)
        $horas *= -1;

    $sep = explode('.', $horas);
    $h = $sep[0];
    if (empty($sep[1]))
        $sep[1] = 00;

    $m = $sep[1];

    if (strlen($m) < 2)
        $m = $m . 0;

    return sprintf('%2d:%02d', $h, $m);
  }

  function return_month_name($month)
  {
    switch ($month) {
      case 1:
        return 'Janeiro';
      case 2:
        return 'Fevereiro';
      case 3:
        return 'Março';
      case 4:
        return 'Abril';
      case 5:
        return 'Maio';
      case 6:
        return 'Junho';
      case 7:
        return 'Julho';
      case 8:
        return 'Agosto';
      case 9:
        return 'Setembro';
      case 10:
        return 'Outubro';
      case 11:
        return 'Novembro';
      case 12:
        return 'Dezembro';  
      default:
        return 'Mês nenhum';
    }
  }
?>