<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registar preço por hora</title>

    <!-- Bootstrap -->
    <link href="../css/index.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/chart.js"></script>
    <script src="../js/jquery.min.js"></script>

    <?php
      include '../codes/checker.php';
    ?>
  </head>
  <body>
   <?php include('../templates/nav.php'); ?>
    <div class="container">
      <form action="../codes/register-price.php" method="POST" class="form-signup" role="form">
        <h2 class="form-signin-heading">Cadastrar preço por hora.</h2>

        <input class="form-control" type="text" name="price" placeholder="Valor">

        <select class="form-control" name="month">
          <option value='2000-01-01'>Janeiro</option>
          <option value='2000-02-01'>Fevereiro</option>
          <option value='2000-03-01'>Março</option>
          <option value='2000-04-01'>Abril</option>
          <option value='2000-05-01'>Maio</option>
          <option value='2000-06-01'>Junho</option>
          <option value='2000-07-01'>Julho</option>
          <option value='2000-08-01'>Agosto</option>
          <option value='2000-09-01'>Setembro</option>
          <option value='2000-10-01'>Outubro</option>
          <option value='2000-11-01'>Novembro</option>
          <option value='2000-12-01'>Dezembro</option>
        </select>

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
  </body>
</html>