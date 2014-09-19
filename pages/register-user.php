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
      <form action="../codes/register-user.php" method="POST" class="form-signup" role="form">
        <div class="fields">
          <h2 class="form-signin-heading">Cadastrar novo monitor</h2>

          <input class="form-control" type="text"  name="name"    placeholder="Nome completo">
          <input class="form-control" type="text"  name="address" placeholder="Endereço">
          <input class="form-control" type="tel"   name="phone"   placeholder="Telefone">
          <input class="form-control" type="email" name="email"   placeholder="Email">
          <input class="form-control" type="date"  name="age"     placeholder="Data de nascimento">

          <input class="form-control" type="text" name="rg" placeholder="RG">
          <input class="form-control" type="text" name="ra" placeholder="RA">
          <input class="form-control" type="text" name="cpf" placeholder="CPF">
          <input class="form-control" type="text" name="account" placeholder="Conta corrente">

          <input class="form-control" type="text" name="login" placeholder="Login">
          <input class="form-control" type="password" name="password" placeholder="Senha">
        </div>
         <!--Horarios(Schedule-Hour)-->
           <div class="week-hour">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>Domingo</th>
                  <th>Segunda</th>
                  <th>Terça</th>
                  <th>Quarta</th>
                  <th>Quinta</th>
                  <th>Sexta</th>
                  <th>Sabado</th>
                </tr>
              </thead>
              <tbody>
                <input type="hidden" name="0" value="sunday">
                <input type="hidden" name="1" value="monday">
                <input type="hidden" name="2" value="tuesday">
                <input type="hidden" name="3" value="wednesday">
                <input type="hidden" name="4" value="thursday">
                <input type="hidden" name="5" value="friday">
                <input type="hidden" name="6" value="saturday">
                <tr>
                  <td>Começa:</td>
                  <td><input type="text" name="s_sunday"    size="10px" /></td>
                  <td><input type="text" name="s_monday"    size="10px" /></td>
                  <td><input type="text" name="s_tuesday"   size="10px" /></td>
                  <td><input type="text" name="s_wednesday" size="10px" /></td>
                  <td><input type="text" name="s_thursday"  size="10px" /></td>
                  <td><input type="text" name="s_friday"    size="10px" /></td>
                  <td><input type="text" name="s_saturday"  size="10px" /></td>
                </tr>
                <tr>
                  <td>Termina:</td>
                  <td><input type="text" name="e_sunday"    size="10px" /></td>
                  <td><input type="text" name="e_monday"    size="10px" /></td>
                  <td><input type="text" name="e_tuesday"   size="10px" /></td>
                  <td><input type="text" name="e_wednesday" size="10px" /></td>
                  <td><input type="text" name="e_thursday"  size="10px" /></td>
                  <td><input type="text" name="e_friday"    size="10px" /></td>
                  <td><input type="text" name="e_saturday"  size="10px" /></td>
                </tr>
              </tbody>
            </table>
          </div>

        <div class="btn-group btn-group-justified">
          <div class="btn-group">
            <button type="submit" class="btn btn-lg btn-success">Cadastrar</button>
          </div>
          <div class="btn-group">
            <a type="button" href="monitors.php" class="btn btn-lg btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
