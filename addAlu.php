<?php
session_start();

$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged)
{
  header("Location: logout.php");
  exit;
}

include_once ('init.php');
include 'DB.php';
$ID=$_POST["aula"];
$sql="SELECT u.nombre_usuario, u.clv_usuario FROM usuarios u WHERE u.tipo_usuario = 'ALU'";
$result = $conn->query($sql);

use Horarios\model\manageProf;
use Horarios\model\aulas\adminAulas;
$au = new adminAulas($_SESSION["tipo"]);

switch($_SESSION["tipo"]) {
  case 'prof':
  $panel = new manageProf($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
  break;
  default:
  die ("Ha ocurrido un problema.");
  break;
}


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
        <div class="row">
          <div class="col-md-12">
            <h1>Asistencia</h1>
            <form id="form-3" action="addAlumnos.php" method="POST">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Alumnos
                  <button type="submit" class="btn btn-primary">Guardar</button></h3>
                </div>
                <input type="hidden" name="aula" value="<?php echo $ID?>">
                <div id="tableProfs">
                  <table class="table table-striped table-hover">
                    <tbody>
                      <tr>
                        <th>Nombre completo</th>
                        <th>Marcar para agregar</th>
                      </tr>
                      <?php foreach($result as $au):
                        echo '<tr>
                        <td>'.$au["nombre_usuario"].'</td>
                        <td><input type="checkbox" value="'.$au["clv_usuario"].'" name="check[]"></input></td>';
                      endforeach; ?>
                      <input type="hidden" name="aula" value="<?php echo $ID ?>">
                    </form>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
      <script src="js/adminAulasActions.js"></script>

      <!-- <script src="style/alertify/alertify.min.js"></script> -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>