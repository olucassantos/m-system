<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Monitoria</title>

    <!-- Bootstrap -->
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/historico.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            echo "
              <h2>". $user['name'] ."</h2>
              <h3>Monitor de: ". curse_by_user($user_id) ."</h3>
              <h3>". $user['phone'] ."</h3>
              <h3>". $user['address'] ."</h3>
              <a href=mailto:". $user['email'] .">". $user['email'] ."</a>
            ";
          ?>
        </div>
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
            <tr><td>Aula dia <mark>21/5</mark> com inicio ás: <mark>12:05</mark> e termino ás <mark>13:15</mark>.</td></tr>
            <tr><td>Aula dia <mark>24/5</mark> com inicio ás: <mark>11:05</mark> e termino ás <mark>13:15</mark>.</td></tr>
            <tr><td>Aula dia <mark>25/5</mark> com inicio ás: <mark>15:05</mark> e termino ás <mark>16:15</mark>.</td></tr>
          </tbody>
        </table>
      </div>

      <div class="history">
        <div class="page-header">
          <h3>Historico de Pagamentos</h3>
        </div>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Junho
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <strong>Dias trabalhados:</strong> 15 Dias
                    </div>

                    <div class="col-md-6">
                      <strong>32</strong> Horas trabalhadas
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <strong>Depositado em:</strong> 15/8
                    </div>

                    <div class="col-md-6">
                      <strong>Valor total:</strong> R$ 250,30
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  Julho
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <strong>Dias trabalhados:</strong> 29 Dias
                    </div>

                    <div class="col-md-6">
                      <strong>42</strong> Horas trabalhadas
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <strong>Depositado em:</strong> 14/9
                    </div>

                    <div class="col-md-6">
                      <strong>Valor total:</strong> R$ 500,30
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>