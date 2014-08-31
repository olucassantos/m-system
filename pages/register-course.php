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

    <?php
      include '../codes/checker.php';
      $mysqli = connect();
      $result = $mysqli->query('SELECT name, id FROM user');
    ?>
  </head>
  <body>
   <?php include('../templates/nav.php'); ?>
    <div class="container">
      <form action="../codes/register-course.php" method="POST" class="form-signup" role="form">
        <h2 class="form-signin-heading">Cadastrar novo curso</h2>

        <input class="form-control" type="text" name="course" placeholder="Matéria">

        <?php
          while($row = $result->fetch_array())
          {
            $rows[] = $row;
          }
          echo '<select class="form-control" name="monitor">';
            foreach ($rows as $row) {
              echo $row['id'];
              echo "<option value=" . $row['id'] . ">". $row['name'] ."</option>";
            }
          echo "</select>";
        ?>

        <br>
        <div class="btn-group btn-group-justified">
          <div class="btn-group">
            <button type="submit" class="btn btn-lg btn-success">Cadastrar</button>
          </div>
          <div class="btn-group">
            <a type="button" href="courses.php" class="btn btn-lg btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>