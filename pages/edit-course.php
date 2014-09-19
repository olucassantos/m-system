<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Curso</title>

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

      $course = course_by_id($_GET["id"]);
    ?>
  </head>

  <body>
    <?php include('../templates/nav.php'); ?>

    <div class="container">
      
      <form action="../codes/edit-course.php" method="POST" class="form-signup" role="form">
        <h2 class="form-signin-heading form-course">Editar curso - <?php echo $course['name']; ?> </h2>

        <input class="form-control" type="text" name="course" value='<?php echo $course['name']; ?>'>

        <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
        <?php
          echo '<select class="form-control" name="monitor">';
            $user = user_by_course_id($course['id']);
            echo "<option selected='selected' value=" . $course['user_id'] . ">". $user['name'] ." </option>";
            foreach (all_users_select('WHERE id <> '.$course['user_id']) as $row) {
              echo "<option value=" . $row['id'] . ">". $row['name'] ."</option>";
            }
          echo "</select>";
        ?>

        <br>
        <div class="btn-group btn-group-justified">
          <div class="btn-group">
            <button type="submit" class="btn btn-lg btn-success">Salvar</button>
          </div>
          <div class="btn-group">
            <a type="button" href="courses.php" class="btn btn-lg btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
