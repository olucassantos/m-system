<?php
  function connect()
  {
    return mysqli_connect("localhost","root", "", "m-system");
    // return mysqli_connect("mysql.hostinger.com.br","u602974892_syste", "m-system", "u602974892_syste");
  }

  $mysqli = connect();

  function insert($table, $col, $value)
  {
    $mysqli = connect();
    $cols = "";
    for ($i=0; $i < (sizeof($col) - 1) ; $i++)
    { 
      $cols .= $col[$i] . " ,";
    }
    $cols .= $col[(sizeof($col) - 1)];

    $values = "";
    for ($i=0; $i < (sizeof($value) - 1) ; $i++)
    { 
      $values .= " '" . $value[$i] . "' , ";
    }
    $values .= " '" . $value[(sizeof($value) - 1)] . "' ";

    $code = "insert into $table ( $cols ) values ( $values )";
    $insert_row = $mysqli->query($code);

    if($insert_row){
      return true;
    }else{
        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
    }
  }

  function update($table, $col, $value, $clause)
  {
    $mysqli = connect();

    $data = "";
    for ($i=0; $i < (sizeof($col) - 1) ; $i++)
    {
        $data .= "$col[$i]='$value[$i]', " ;
    }
    $data .= "$col[$i]='$value[$i]'";
    $code =  "UPDATE $table SET  $data $clause";

    
    
    $insert_row = $mysqli->query($code);
    if($insert_row){
      return true;
    }else{
        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
    }
  }

  function first_of_row($query)
  {
    $mysqli = connect();
    $result = $mysqli->query($query);

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      return $rows[0];
    }else{
      return array();
    }
  }

  function value_of_first_row($query, $value)
  {
    $mysqli = connect();
    $result = $mysqli->query($query);

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      return $rows[0][$value];
    }else{
      return '';
    }
  }

  function all_rows($table, $clause='')
  {
    $mysqli = connect();
    $result = $mysqli->query("SELECT * FROM $table $clause");

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    return isset($rows) ? $rows : array();
  }

  function all_rows_especial($query)
  {
    $mysqli = connect();
    $result = $mysqli->query($query);

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    return isset($rows) ? $rows : array();
  }

  function login_by_login($user, $password)
  {
    return first_of_row("SELECT * FROM login WHERE login='$user' AND password='$password' LIMIT 1");
  }

  function login_by_user($user_id)
  {
    return first_of_row("SELECT * FROM login WHERE user_id='$user_id'");
  }

  function user_by_id($id)
  {
    return first_of_row("SELECT * FROM user WHERE id='$id'");
  }

  function userid_by_rg($rg)
  {
    return value_of_first_row("SELECT id FROM user WHERE rg='$rg'", 'id');
  }

  function scheduleid_by_userid($id)
  {
    return value_of_first_row("SELECT id FROM schedule WHERE user_id='$id'", 'id');
  }

  function courses_by_user($id)
  {
    return all_rows('course', "WHERE user_id='$id'");
  }

  function user_by_course_id($id)
  {
    $user_id = userid_by_course($id);
    return first_of_row("SELECT * FROM user WHERE id ='$user_id'");
  }

  function userid_by_course($id)
  {
    return value_of_first_row("SELECT user_id FROM course WHERE id='$id'", 'user_id');
  }

  function user_by_scheduleid($id)
  {
    return value_of_first_row("SELECT user_id FROM schedule WHERE id='$id'", 'user_id');
  }

  function all_courses_select()
  {
    return all_rows('course');
  }

  function all_prices_select()
  {
    return all_rows('price');
  }

  function all_hours_by_scheduleid($id)
  {
    return all_rows('hour', "WHERE schedule_id='$id' ORDER BY id ASC");
  }

  function all_users_select($clause = "")
  {
    return all_rows('user', $clause);
  }

  function course_name_by_id($id)
  {
    return value_of_first_row("SELECT name FROM course WHERE id ='$id'", 'name');
  }

  function course_by_id($id)
  {
    return first_of_row("SELECT * FROM course WHERE id='$id'");
  }

  function active_lesson_by_courseid($id)
  {
    return value_of_first_row("SELECT id FROM lesson WHERE course_id ='$id' AND active=true", 'id');
  }

  function select_start_end_lesson($id)
  {   
      $query = "SELECT start, end FROM lesson WHERE id ='$id' AND active='false'";
      return array(value_of_first_row($query, 'start'), value_of_first_row($query, 'end'));
  }

  function lessons_by_month_and_user($id, $month)
  {
    return all_rows('lesson', "WHERE MONTH(end)='$month' AND user_id='$id'");
  }

  function total_months_worked_by_user($id)
  { 
    return all_rows_especial("SELECT DISTINCT MONTH(end) FROM lesson where user_id='$id' ORDER BY MONTH(end) ASC");
  }

  function total_days_worked_by_monts_user($id, $month)
  {
    return all_rows_especial("SELECT DISTINCT DAY(end) FROM `lesson` WHERE user_id='$id' AND MONTH(end)='$month' ORDER BY DAY(end) ASC");
  }

  function day_of_schedule($day, $schedule_id)
  {
    return first_of_row("SELECT * FROM hour WHERE schedule_id='$schedule_id' AND week_day='$day'");
  }

  function value_of_active_price($month){
    return value_of_first_row("SELECT * FROM price WHERE MONTH(month)='$month'", 'value');
  }
?>