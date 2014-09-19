<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>

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

      $user = user_by_id($_GET["id"]);
      $login = login_by_user($user['id']);
    ?>
  </head>
  <body>
    <?php include('../templates/nav.php'); ?>

    <div class="container">
      <form action="../codes/edit-user.php" method="POST" class="form-signup" role="form">
        <div class="fields">
          <h2 class="form-signin-heading form-course">Editar Usuário - <?php echo $user['name']; ?></h2>
          <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
          <input class="form-control" type="text"  name="name"    value='<?php echo $user['name']; ?>'>
          <input class="form-control" type="text"  name="address" value='<?php echo $user['address']; ?>'>
          <input class="form-control" type="tel"   name="phone"   value='<?php echo $user['phone']; ?>'>
          <input class="form-control" type="email" name="email"   value='<?php echo $user['email']; ?>'>
          <input class="form-control" type="date"  name="age"     value='<?php echo $user['age']; ?>'>

          <input class="form-control" type="text" name="rg" value='<?php echo $user['rg']; ?>'>
          <input class="form-control" type="text" name="ra" value='<?php echo $user['ra']; ?>'>
          <input class="form-control" type="text" name="cpf" value='<?php echo $user['cpf']; ?>'>
          <input class="form-control" type="text" name="account" value='<?php echo $user['account']; ?>'>

          <input class="form-control" type="text" name="login" value='<?php echo $login['login']; ?>'>
          <input class="form-control" type="password" name="password" value='<?php echo $login['password']; ?>'>
        </div>

        <div class="btn-group btn-group-justified">
          <div class="btn-group">
            <button type="submit" class="btn btn-lg btn-success">Salvar</button>
          </div>
          <div class="btn-group">
            <a type="button" href="monitors.php" class="btn btn-lg btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
