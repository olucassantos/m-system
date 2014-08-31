<?php 
 $rows = all_hours_by_scheduleid(scheduleid_by_userid($id));
?>

<div class="week-hour">
<div class="page-header">

  <h3><?php $user = user_by_id($id); echo "Horário - ". $user['name']; ?></h3>
  <?php echo "<a href='../editar/horario.php?id=". $id ."'>Editar</a>" ?>
</div> 
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
      if ($rows != ''){
        foreach($rows as $row)
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
      if ($rows != ''){
        foreach($rows as $row)
        {
          echo  "<td>". $row['end'] ."</td>";
        }
      }
    ?>
    </tr>
  </tbody>
</table>
</div>