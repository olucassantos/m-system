<?php
  function connect()
  {
    return mysqli_connect("localhost","root", "", "m-system"); //abrir conexao
  }

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

  function user_by_id($id)
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT * FROM user WHERE id ='. $id);

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      $res = $rows[0];
      return ($res != "") ? $res : '0';
    }else{
      return 0;
    }
  }

  function userid_by_name($name)
  {
    $mysqli = connect();
    $result = $mysqli->query("SELECT id FROM user WHERE name ='". $name ."'");

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      $res = $rows[0]['id'];
      return ($res != "") ? $res : '0';
    }else{
      return 0;
    }
  }

  function scheduleid_by_userid($id)
  {
    $mysqli = connect();
    $result = $mysqli->query("SELECT id FROM schedule WHERE user_id ='". $id ."'");

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      $res = $rows[0]['id'];
      return ($res != "") ? $res : '0';
    }else{
      return 0;
    }
  }

  function curse_by_user($id)
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT name FROM course WHERE user_id ='. $id);

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      $res = $rows[0]['name'];
      return ($res != "") ? $res : '-----';
    }else{
      return 0;
    }
  }

  function all_courses_select()
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT * FROM course');

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    return isset($rows) ? $rows : '';
  }

  function all_hours_by_scheduleid($id)
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT * FROM hour WHERE schedule_id="'. $id .'" ORDER BY id ASC ');

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    return isset($rows) ? $rows : '';
  }

  function all_users_select()
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT id, name FROM user');

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    return isset($rows) ? $rows : '';
  }

  function all_userid_select()
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT id FROM user');

    while($row = $result->fetch_array())
    {
      $rows[] = $row['id'];
    }

    return isset($rows) ? $rows : '';
  }

  function course_by_id($id)
  {
    $mysqli = connect();
    $result = $mysqli->query('SELECT name FROM course WHERE id ='. $id);

    while($row = $result->fetch_array())
    {
      $rows[] = $row;
    }

    if (isset($rows)){
      $res = $rows[0]['name'];
      return ($res != "") ? $res : '-----';
    }else{
      return 0;
    }
  }

?>