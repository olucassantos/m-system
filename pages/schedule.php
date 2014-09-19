<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatorio: Cursos e Monitores</title>
    <link rel="stylesheet" href="../css/index.css"/>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/chart.js"></script>
    <script src="../js/jquery.min.js"></script>
  </head>
  <body>
    <?php 
      include('../templates/nav.php'); 
      include '../codes/checker.php';
    ?>

    <div class="container">
      <?php
        $users = all_users_select();
        if (sizeof($users) > 0){
          foreach ($users as $user){
            $id = $user['id'];
            include('../templates/week-hour.php'); 
          }
        }else{
          echo "<div class='page-header'><h1>Nada encontrado.</h1></div>";
        }
      ?> 
    </div>
  </body>
</html>
