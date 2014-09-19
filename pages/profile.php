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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>

    <script src="../js/chart.js"></script>


    <script>
      $(function() {
        $("#accordion").accordion();
      });
    </script>
    <?php
      include '../codes/checker.php';
      $user_id = (isset($_GET["id"])) ? $_GET["id"] : $_SESSION['user'];
      $user = user_by_id($user_id);
    ?>

  </head>
  <body>
   <?php include('../templates/nav.php'); ?>
    <div class="container">
      <div class="profile">
        <div class="image">
          <img src="../images/eu.jpg" alt="..." class="img-rounded">
        </div>
        <div class="user-contact">
          <?php
            $courses = (sizeof(courses_by_user($user_id)) == 1) ? "<h3>Monitor de: ". string_courses(courses_by_user($user_id)) ."</h3>" : '';
            echo "
              <h2>". $user['name'] ." <a href='../pages/edit-user.php?id=". $user['id'] ."' class='glyphicon glyphicon-pencil'></a></h2>
              ". $courses ."
              <h3>". $user['phone'] ."</h3>
              <h3>". $user['address'] ."</h3>
              <a href=mailto:". $user['email'] .">". $user['email'] ."</a>
            ";
          ?>
        </div>
      </div>

      <div class="page-header course">
        <?php 
          echo (sizeof(courses_by_user($user_id)) > 1) ? "<h3>Monitor nos cursos: ". string_courses(courses_by_user($user_id)) ."</h3>" : '';
        ?>
      </div>

      <?php
        $id = $user_id;
        include('../templates/week-hour.php'); 
      ?>  
     
      <div class="lessons">
        <div class="page-header">
          <h3>Últimas Aulas</h3>
        </div>

        <table class="table table-bordered">
          <tbody>
            <?php
              unset($rows);
              unset($row);
              $mysqli = connect();
              $close = $mysqli->query("SELECT * FROM lesson WHERE active='false' AND user_id='". $user['id'] ."' ORDER BY id DESC LIMIT 5");
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
                  echo "<tr><td>Aula dia <mark>". $day."</mark> com inicio as: <mark>".$start ."</mark> e termino as <mark>". $end ."</mark> com duração de <mark>". lesson_duration_by_id($row['id'])."</mark> minutos.</td></tr>";
                }
              }else{
                echo "<tr><td>Nenhuma aula concluida.</td></tr>";
              }
            ?>  
          </tbody>
        </table>
      </div>

      <div class="history">
        <div class="page-header">
          <h3>Historico de Pagamentos</h3>
        </div>
        <div class="panel-group" id="accordion">         
          <?php
            $rows = total_months_worked_by_user($user_id);
            if ($rows !='')
            {
              foreach ($rows as $row) {
                $days = total_days_worked_by_monts_user($user_id ,$row['MONTH(end)']);
                $table = "
                  <div class='panel panel-default'>
                    <div class='panel-heading'>
                      <h4 class='panel-title'>
                        <a data-toggle='collapse' data-parent='#accordion' href='#". $row['MONTH(end)'] ."'>
                          ". return_month_name($row['MONTH(end)']) ."
                        </a>
                      </h4>
                    </div>
                    <div id='". $row['MONTH(end)'] ."' class='panel-collapse collapse'>
                      <div class='panel-body'>
                        <div class='panel-body'>
                          <div class='row'>
                            <div class='col-md-6'>
                              <strong>Dias trabalhados:</strong> <mark>". sizeof($days) ." Dias</mark> 
                            </div>

                            <div class='col-md-6'>
                              <strong><mark>". minutes_to_hours(total_time_course_by_user_month($user_id, $row['MONTH(end)'])) ."</strong></mark> trabalhadas
                            </div>
                          </div>
                          <div class='row'>
                            <div class='col-md-6'>
                              <strong>Depositado em:</strong> 15/8
                            </div>

                            <div class='col-md-6'>
                              <strong>Valor total:</strong> <mark>R$ ". salary_value_by_user_month($user_id, $row['MONTH(end)']) ."</mark>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ";
                $register_price = "
                  <div class='panel panel-default'>
                    <div class='panel-heading'>
                      <h4 class='panel-title'>
                        <a data-toggle='collapse' data-parent='#accordion' href='#". $row['MONTH(end)'] ."'>
                          ". return_month_name($row['MONTH(end)']) ."
                        </a>
                      </h4>
                    </div>
                    <div id='". $row['MONTH(end)'] ."' class='panel-collapse collapse'>
                      <div class='panel-body'>
                        <div class='panel-body'>
                          <h4>Não foi encontrado preço por hora para o mês de <mark>". return_month_name($row['MONTH(end)']) ."</mark></h4>
                          <a href='../pages/register-price.php'>Clique aqui para cadastrar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                ";
                if(value_of_active_price($row['MONTH(end)']) != 0)
                {
                  echo $table;
                }else{
                  echo $register_price;
                }
              }
            }else{
              echo "<h3>Nenhum pagamento encontrado.</h3>";
            }
          ?>
        </div>
      </div> 
  </body>
</html>