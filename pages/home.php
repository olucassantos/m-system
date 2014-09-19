<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Monitoria</title>

    <!-- Bootstrap -->
    <link href="../css/index.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/chart.js"></script>
    <script src="../js/highcharts.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <?php
      include '../codes/checker.php';
      $mysqli = connect();
      $open = $mysqli->query('SELECT name, id FROM course');
      $close = $mysqli->query('SELECT * FROM lesson WHERE active=true');
    ?>
  </head>
  <body>
    <?php include('../templates/nav.php'); ?>
    
    <div class="container">
      <div class="panel">
        <div class="row">
          <div class="col-md-6">
            <div class="panel start">
              <div class="page-header">
                <h3>Iniciar aula da monitoria</h3>
              </div>
                <form action="../codes/open-lesson.php" class="form-register" method="POST" role="form">
                  <?php
                    while($row = $open->fetch_array())
                    {
                      $rows[] = $row;
                    }
                    echo '<select class="form-control" name="course">';
                      foreach ($rows as $row) {
                        echo "<option value=" . $row['id'] . ">". $row['name'] ."</option>";
                      }
                    echo "</select>";

                    unset($rows);
                    unset($row);
                  ?>
                <button class="btn btn-primary" type="submit">Ok</button>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel end">
              <div class="page-header">
                <h3>Encerrar aulas iniciadas</h3>
              </div>
                <form action="../codes/close-lesson.php" class="form-register" method="POST" role="form">
                  <?php
                    if($close != ''){
                      while($row = $close->fetch_array())
                      {
                        $rows[] = $row;
                      }
                    }
                    echo '<select class="form-control" name="lesson">';
                      if(isset($rows)){
                          foreach ($rows as $row) {
                            $user = user_by_id($row['open_by']);
                            echo "<option value=" . $row['id'] . ">Aula de ''". course_name_by_id($row['course_id']) ."'' iniciada as ''". date_format(date_create($row['start']), 'H:i:s') ."'' </option>";
                          }
                        }else{
                          echo "<option value=''>Nenhuma aula aberta</option>";
                        }
                    echo "</select>";
                    unset($rows);
                    unset($row);
                  ?>
                <button class="btn btn-primary" type="submit">Ok</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="container" style="width:100%; height:400px;"></div>
    </div>
  </body>
</html>