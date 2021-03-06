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
    <?php
      include '../codes/checker.php';
    ?>
  </head>
  <body>
    <?php include('../templates/nav.php'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="table">
            <div class="page-header">
              <h3>Cursos</h3>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Curso</th>
                  <th>Monitor</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $rows = all_courses_select();

                  if ($rows != ''){
                    foreach ($rows as $row) {
                      $user = user_by_id($row['user_id']);
                      echo "
                        <tr>
                          <td>". $row['name'] ."</td>
                          <td>". $user['name'] ."</td>
                          <td class='buttons'>
                            <div class='btn-group btn-group-justified'>
                              <div class='btn-group'>
                                <a href='../pages/edit-course.php?id=". $row['id'] ."' type='button' class='btn btn-xs btn-info'>Atualizar</a>
                              </div>
                              <div class='btn-group'> 
                                <button type='button' value=". $row['id'] ." class='btn btn-xs btn-warning'>Apagar</button>
                              </div>  
                            </div>    
                          </td>
                        </tr> 
                      ";
                    }
                }else{
                    echo "<div class='page-header'><h4>Nenhum curso encontrado.</h4></div>";
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="register button">
            <div class="btn-group">
              <a class="btn btn-xl btn-info" href="register-course.php">Cadastrar Curso</a>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
