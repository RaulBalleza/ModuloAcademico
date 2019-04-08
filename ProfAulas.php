  <?php
  session_start();

  $isLogged = $_SESSION["islogged"] ?? FALSE;

  if (!$isLogged)
  {
    header("Location: logout.php");
    exit;
  }

  include_once ('init.php');

  use Horarios\model\manageAdmin;
  use Horarios\model\manageDire;
  use Horarios\model\manageProf;

  switch($_SESSION["tipo"]) {
    case 'prof':
    $panel = new manageProf($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
    default:
    die ("Ha ocurrido un problema.");
    break;
  }
  use Horarios\model\aulas\aulaDB;
  include 'DB.php';
  $user=$_SESSION["usuario"];
  $sql="SELECT * FROM aulas WHERE clv_prof='$user'";
  $result = $conn->query($sql);
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Panel de Administración</title>

    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="style/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <?php
    $panel->writeHTMLPanelBar();
    $panel->writeHTMLNavBar();
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <div class="col-md-12 colarr">
       <div class="panel panel-default">
         <div class="panel-heading main-color-bg">
           <h3 class="panel-title">Aulas</h3>
         </div>
         <div class="panel-body">
           <div class="row">
             <br>
             <div id="tableAulas">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Clave</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Capacidad</th>
                  <th>Opciones</th>
                </tr>
                <tr>
                  <?php foreach($result as $au): ?>
                    <td><?php echo $au["id"]; ?></td>
                    <td><?php echo $au["nombre"]; ?></td>
                    <td><?php echo $au["tipo"]; ?></td>
                    <td><?php echo $au["capacidad"]; ?></td>
                    <td>                      
                      <div class="row">
                        <form action="ListaAsistencia.php" method="POST">
                          <button class="btn btn" type="submit" value="<?php echo $au["id"]; ?>" name="aula">
                            <a>Asistencia <span class="glyphicon glyphicon-list-alt"></span></a>
                          </button>
                        </form>

                        <form action="Calificaciones.php" method="POST">
                          <input value="<?php echo $au["id"]; ?>" name="aula" type="hidden">
                          <button class="btn btn" type="submit" >
                            <a>Calificaciones <span class="glyphicon glyphicon-list-alt"></span></a>
                          </button>
                        </form>
                        <form action="addAlu.php" method="POST">
                          <button class="btn btn" type="submit" value="<?php echo $au["id"]; ?>" name="aula">
                            <a>Agregar Alumnos <span class="glyphicon glyphicon-list-alt"></span></a>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <!-- <script src="style/alertify/alertify.min.js"></script> -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>