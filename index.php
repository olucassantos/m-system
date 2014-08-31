<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Monitoria</title>

    <!-- Bootstrap -->
    <link href="css/index.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
      session_start(); 
      if((isset($_SESSION['login']) == true) and (isset($_SESSION['user']) == true))
      { 
        header('Location: pages/home.php');
      }
    ?>
  </head>
  <body>
    <div class="container">
      <form action="codes/login.php" class="form-signin" method="POST" role="form">
        <h2 class="form-signin-heading">Entrar no sistema</h2>
        <input class="form-control" type="text" name="login" placeholder="Endereço de email">
        <input class="form-control" type="password" name="password" placeholder="Senha">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar usuário
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>