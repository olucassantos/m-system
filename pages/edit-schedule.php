<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Horário</title>

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
      $schedule_id =  $_GET["id"];
      
      $schedule = all_hours_by_scheduleid(scheduleid_by_userid($schedule_id));
      $user = user_by_id(user_by_scheduleid($schedule_id));
    ?>
  </head>

  <body>
    <?php include('../templates/nav.php'); ?>

    <div class="container">
      <form action="../codes/edit-schedule.php" method="POST" class="form-signup" role="form">
         <h2 class="form-schedule">Editar horario de - <?php echo $user['name']; ?></h2>
         <h4>Horário Atual</h4>
         <table class="table table-bordered">
            <thead>
              <tr>
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
              <tr>  
              <?php
                if ($schedule != ''){
                  foreach($schedule as $row)
                  {
                    echo  "<td>". $row['start'] ."</td>";
                  }
                }else{
                  echo "<h4>Nenhum horario encontrado.</h4>";
                }
              ?>
              </tr>
              <tr>
              <?php 
                if ($schedule != ''){
                  foreach($schedule as $row)
                  {
                    echo  "<td>". $row['end'] ."</td>";
                  }
                }
              ?>
              </tr>
            </tbody>
         </table>

        <h4 class="edit-schedule">Novo Horário</h4>
         <!--Horarios(Schedule-Hour)-->
          <form action="../codes/edit-schedule.php" method="POST" class="form-signup" role="form">
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
                <input type="hidden" name="schedule_id" value=<?php echo $schedule_id; ?>>
                <input type="hidden" name="0" value="sunday">
                <input type="hidden" name="1" value="monday">
                <input type="hidden" name="2" value="tuesday">
                <input type="hidden" name="3" value="wednesday">
                <input type="hidden" name="4" value="thursday">
                <input type="hidden" name="5" value="friday">
                <input type="hidden" name="6" value="saturday"> 
                <tr>
                  <td>Começa:</td>
                  <?php
                    $sunday = day_of_schedule('sunday', $schedule_id );
                    $monday = day_of_schedule('monday', $schedule_id );
                    $tuesday = day_of_schedule('tuesday', $schedule_id );
                    $wednesday = day_of_schedule('wednesday', $schedule_id );
                    $thursday = day_of_schedule('thursday', $schedule_id );
                    $friday = day_of_schedule('friday', $schedule_id );
                    $saturday = day_of_schedule('saturday', $schedule_id );
                  ?>
                  <td><input type="text" name="s_sunday"    size="10px" value=<?php echo $sunday['start']; ?> /></td>
                  <td><input type="text" name="s_monday"    size="10px" value=<?php echo $monday['start']; ?>  /></td>
                  <td><input type="text" name="s_tuesday"   size="10px" value=<?php echo $tuesday['start']; ?>  /></td>
                  <td><input type="text" name="s_wednesday" size="10px" value=<?php echo $wednesday['start']; ?>  /></td>
                  <td><input type="text" name="s_thursday"  size="10px" value=<?php echo $thursday['start']; ?>  /></td>
                  <td><input type="text" name="s_friday"    size="10px" value=<?php echo $friday['start']; ?>  /></td>
                  <td><input type="text" name="s_saturday"  size="10px" value=<?php echo $saturday['start']; ?>  /></td>
                </tr>
                <tr>
                  <td>Termina:</td>
                  <td><input type="text" name="e_sunday"    size="10px" value=<?php echo $sunday['end']; ?> /></td>
                  <td><input type="text" name="e_monday"    size="10px" value=<?php echo $monday['end']; ?> /></td>
                  <td><input type="text" name="e_tuesday"   size="10px" value=<?php echo $tuesday['end']; ?> /></td>
                  <td><input type="text" name="e_wednesday" size="10px" value=<?php echo $wednesday['end']; ?> /></td>
                  <td><input type="text" name="e_thursday"  size="10px" value=<?php echo $thursday['end']; ?> /></td>
                  <td><input type="text" name="e_friday"    size="10px" value=<?php echo $friday['end']; ?> /></td>
                  <td><input type="text" name="e_saturday"  size="10px" value=<?php echo $saturday['end']; ?> /></td>
                </tr>
              </tbody>
            </table>
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
