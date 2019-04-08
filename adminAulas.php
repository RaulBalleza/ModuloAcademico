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
use Horarios\model\aulas\adminAulas;

$au = new adminAulas($_SESSION["tipo"]);

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
                           <div class="col-md-12">
                               <a class= "btn btn-success" type="button" id="btnAddAula"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar nueva aula</a>

                               
                               <!-- <a class= "btn btn-info" type="button" id="btnAddEquipo"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar nuevo equipo</a> -->
                               <!-- <a class= "btn btn-light" type="button" id="btnAddCategoria"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar nueva categoría</a> -->
                           </div>
                       </div>
                       <br>
                       <div id="tableAulas">
                         
                       </div>
                   </div>
               </div>
           </div>
   </div>

      <?php
      $au->writeHTMLAddEquipo();
      ?>

      <?php
      $au->writeHTMLAddCategoria();
      ?>
      
      <?php
      $au->writeHTMLModAula();
      ?>

      <?php
      $au->writeHTMLAddAula();
      ?>
      

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
