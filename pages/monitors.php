<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatorio: Cursos e Monitores</title>
    <link rel="stylesheet" href="../css/index.css"/>
    <link href="../css/login.css" rel="stylesheet">

    <?php
      include '../codes/checker.php';
    ?>
  </head>
  <body>
    <?php include('../templates/nav.php'); ?>
    <div class="container">
      <div class="table">
        <div class="page-header">
          <h2>Cursos e Monitores</h2>
        </div>
        <div class="row"> 
          <div class="col-md-12">  
            <table class="table">
              <thead><!-- Cabeçalho da tabela-->
                <tr><!-- linha da tabela-->
                  <th>Monitor </th> 
                  <th>Curso </th>
                  <th>Horario </th>
                  <th>Opções </th>
                </tr>   
              </thead>
              <tbody>
                <?php
                  $rows = all_users_select();

                  if ($rows != ''){
                    foreach ($rows as $row) {
                      echo "
                        <tr>
                          <td>
                            ". $row['name'] ."
                          </td>
                          <td> ". curse_by_user($row['id']) ."</td>
                          <td> Example Time </td>
                          <td class='buttons'>
                            <div class='btn-group btn-group-justified'>
                              <div class='btn-group'>
                                <button type='button' class='btn btn-xs btn-info'>Atualizar</button>
                              </div>
                              <div class='btn-group'> 
                                <button type='button' value=". $row['id'] ." class='btn btn-xs btn-warning'>Apagar </button>
                              </div>  
                            </div>    
                          </td>  
                        </tr> 
                      ";
                    }
                  }else{
                    echo "<div class='page-header'><h4>Nenhum monitor encontrado.</h4></div>";
                  }

                ?>
              </tbody>
            </table>                  
          </div>   
        </div>
      </div>
      <div class="register button">
        <div class="btn-group">
          <a class="btn btn-xl btn-info" href="register-user.php">Cadastrar Monitor</a>
        </div> 
      </div> 
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
