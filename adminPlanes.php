<?php
session_start();

$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged || ($_SESSION["tipo"] == "prof"))
{
  header("Location: logout.php");
  exit;
}

include_once ('init.php');

use Horarios\model\manageAdmin;
use Horarios\model\manageDire;

switch($_SESSION["tipo"]) {
  case 'admi':
    $panel = new manageAdmin($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
  case 'dire':
    $panel = new manageDire($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
  default:
    die ("Ha ocurrido un problema.");
    break;
}

use  Horarios\model\planes\adminPlanes;

$ap = new adminPlanes($_SESSION["tipo"],$_SESSION["carrera"]);
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

    <!-- alertify -->
    <link rel="stylesheet" type="text/css" href="style/alertify/css/alertify.css" >
    <link rel="stylesheet" type="text/css" href="style/alertify/css/themes/default.css" >

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
            <h3 class="panel-title">Plan de estudios</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <a class= "btn btn-success" type="button" id="btnAddPlan">
                  Agregar nuevo Plan de Estudios
                </a>
              </div>
              <div id="msnAlert">
              </div>
            </div>
            <br>

            <div id="tablePlanes">

            </div>

          </div>
        </div>
      </div>
    </div>


  </div><!-- cierre del vanBar Panel -->
</div> <!-- cierre del panelBar -->


    <!-- Agregar maestro/usuario-->
    <?php
    $ap->writeHTMLAddPlan();
    ?>


    <!--Modificar maestro-->
    <?php
    $ap->writeHTMLModPlan();
    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  	<script src="js/adminPlanesActions.js"></script>

  	<!-- <script src="style/alertify/alertify.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
