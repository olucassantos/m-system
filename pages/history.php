<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Histórico da Monitoria</title>

    <!-- Bootstrap -->
    <link href="../css/index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../js/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>


    <script>
      $(document).ready( function () {
        $('#closed-table').DataTable();
      } );
    </script>
    
    <?php
      include '../codes/checker.php';
    ?>
  </head>
  <body>
    <?php include('../templates/nav.php'); ?>
    <div class="container">
      <div class="open-lessons">
        <div class="page-header">
          <h3>Aulas Abertas</h3>
        </div>

        <table class="table table-bordered">
          <tbody>
            <?php
              unset($rows);
              unset($row);
              $mysqli = connect();
              $open = $mysqli->query("SELECT * FROM lesson WHERE active=true ORDER BY id DESC");
              if($open != ''){
                while($row = $open->fetch_array())
                {
                  $rows[] = $row;
                }
              }

              if(isset($rows)){
                foreach ($rows as $row) {                 
                  $end = date_format(date_create($row['end']) , 'H:i:s');
                  $day = date_format(date_create($row['start']), 'd/m/y');
                  $start = date_format(date_create($row['start']), 'H:i:s') ;             
                  echo "<tr><td>Aula dia <mark>". $day."</mark> com inicio as: <mark>".$start ."</mark> da matéria de <mark>". course_name_by_id($row['course_id']) .".</mark></td></tr>";
                }
              }else{
                echo "<tr><td>Nenhuma aula aberta.</td></tr>";
              }
            ?>  
          </tbody>
        </table>
      </div>
      <div class="closed-lessons">
        <div class="page-header">
          <h3>Aulas Fechadas</h3>
        </div>

        <table class="table table-bordered">
          <tbody>
            <?php
              unset($rows);
              unset($row);
              $mysqli = connect();
              $close = $mysqli->query("SELECT * FROM lesson WHERE active=false ORDER BY id DESC");
              if($close != ''){
                while($row = $close->fetch_array())
                {
                  $rows[] = $row;
                }
              }
              
              if(isset($rows)){
                foreach ($rows as $row) {
                  $end = date_format(date_create($row['end']) , 'H:i:s');
                  $day = date_format(date_create($row['start']), 'd/m/y');
                  $start = date_format(date_create($row['start']), 'H:i:s') ;             
                  echo "<tr><td>Aula de <mark>". course_name_by_id($row['course_id']) ."</mark> no dia <mark>". $day."</mark> com inicio as: <mark>".$start ."</mark> e termino as <mark>". $end ."</mark> com duração de <mark>". lesson_duration_by_id($row['id'])."</mark> minutos.</td></tr>";
                }
              }else{
                echo "<tr><td>Nenhuma aula concluida.</td></tr>";
              }
            ?>  
          </tbody>
        </table>
      </div>

<!--       <table id="closed-table" class="display table table-bordered">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Dia</th>
                <th>Inicio</th>
                <th>Fim</th>
                <th>Duração</th>
                <th>Monitor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
                <td>Row 1 Data 2</td>
                <td>Row 1 Data 2</td>
                <td>Row 1 Data 2</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
                <td>Row 1 Data 2</td>
                <td>Row 1 Data 2</td>
                <td>Row 3 Data 2</td>
                <td>Row 1 Data 2</td>
            </tr>
        </tbody>
      </table>
 -->
    </div>
  </body>
</html>