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
$sql="SELECT u.nombre_usuario, u.clv_usuario, c.unidad1, c.unidad2, c.unidad3, c.promedio FROM usuarios u, calificaciones c WHERE c.idAula='ITI-ED' AND u.clv_usuario=c.idAlumno";
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
  <script>
    function obtenerSuma()
    {
      document.getElementById('promedio').value=(parseFloat(document.getElementById('unidad1').value)+parseFloat(document.getElementById('unidad2').value)+parseFloat(document.getElementById('unidad3').value))/3;
    }
  </script> 
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
            <h1>Calificaciones</h1>
            <!--  <a href="index.php?view=list&team_id=<?php echo $_GET["team_id"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
            <!-- <form class="form-horizontal" id="loadlist" role="form">
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Fecha:</label>
                <div class="col-lg-7">
                  <input type="date" name="date_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
                </div>
                <div class="col-lg-offset-3">
                  <input type="hidden" name="team_id" value="<?php echo $_GET["team_id"];?>">
                  <button type="submit" class="btn btn-primary">Buscar</button>

                </div>

              </div>
            </form> -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-0 main">
              <div class="col-md-12 colarr">
                <div class="panel panel-default">
                  <form method="POST" action="saveCal.php" >
                    <div class="panel-heading main-color-bg">
                      <h3 class="panel-title">Alumnos</h3>
                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                    </div>
                    <table class="table table-bordered table-hover">
                      <thead>
                        <th>Nombre completo</th>
                        <th>Unidad 1</th>
                        <th>Unidad 2</th>
                        <th>Unidad 3</th>
                        <th>Promedio (Se actualizara despues de guardar)</th>
                      </thead>
                      <?php foreach($result as $au): ?>
                        <tr>
                          <td><?php echo $au["nombre_usuario"]?></td>
                          <input type="hidden" name="alumnos[]" value="<?php echo $au["clv_usuario"] ?>">
                          <input type="hidden" name="aula" value="<?php echo $ID ?>">
                          <td><input onkeyup="obtenerSuma();" min="0" max="100" type="number" value="<?php echo $au["unidad1"] ?>" class="form-control" name="unidad1[]"></td>
                          <td><input onkeyup="obtenerSuma();" min="0" max="100" type="number" value="<?php echo $au["unidad2"] ?>" class="form-control" name="unidad2[]"></td>
                          <td><input onkeyup="obtenerSuma();" min="0" max="100" type="number" value="<?php echo $au["unidad3"] ?>" class="form-control" name="unidad3[]"></td>
                          <td><input type="" value="<?php echo $au["promedio"] ?>" class="form-control" name="promedio[]" disabled id="promedio"></td>
                        </tr>
                      <?php endforeach; ?>
                    </table>
                  </form>
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