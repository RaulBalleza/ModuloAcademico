<?php session_start();

$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged || ($_SESSION["tipo"] != "dire"))
{
  header("Location: logout.php");
  exit;
}

include_once ('init.php');

use Horarios\model\manageDire;
use Horarios\model\materias\adminMats;
use Horarios\model\planes\planesDB;

$panel = new manageDire($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
$am = new adminMats($_SESSION["tipo"]);
$pdb = new planesDB($_SESSION["tipo"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

    <style type="text/css">

    .nombreCarr{
      text-align: center;
      font-size: 50px;
    }
    .materia {
       position: relative;
      text-align: center;
      width: 85px;
      height: 85px;
      background-image: url(img/materia.png);
    }

    .materia div.nomMateria, div.claveMat, div.creditos {
      font-size: 0.7em;
      color: #000;
      font-weight: bold;
    }

    .materia div.nomMateria{
      width: 100%;
      line-height: 1.0;
      position: absolute;
      top: 75%; left: 50%;
      transform: translate(-50%,-50%);
    }

    .materia div.claveMat {
      width: 90%;
      text-align: left;
      position: absolute;
      top: 10%; left: 50%;
      transform: translate(-50%,-50%);
    }

    .materia div.creditos {
      width: 90%;
      text-align: right;
      position: absolute;
      top: 10%; left: 50%;
      transform: translate(-50%,-50%);
    }

    .materia button.boton{
      margin-left: -42px;
      position: absolute;
      display: inline-block;
      width: 85px;
      height: 85px;
      background-color: rgba(0, 0, 0, 0.0);
      border: none;
      outline: none;
    }
    </style>
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
            <h3 class="panel-title">Materias</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <button class= "btn btn-success" type="button" id="btnAddMat" disabled >Agregar Nueva Materia</button>
              </div>
              <div class="row" style="margin: auto; width: 50%; padding-bottom: 50px; padding-top: 30px; margin-left: 30%">
                <div class="col-md-9">
                  Plan de estudios:
                  <select id="lstPlanes" name="lstPlanes" class="form-control">
                    <option value="-1">Selecciona un Plan de estudios</option>
                    <?php
                    $planes = $pdb->getPlanesCarrera($_SESSION["carrera"]);
                    foreach ($planes as $plan)
                    {
                      echo "<option value=\"" . $plan["clave"] . "\">" . $plan["nombre"] . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div id="msnAlert">
              </div>
            </div>
            <br>

            <div id="tableMaterias">

            </div>

          </div>
        </div>
      </div>
    </div>


  </div><!-- cierre del vanBar Panel -->
</div> <!-- cierre del panelBar -->


    <!-- Agregar maestro/usuario-->
    <?php
    $am->writeHTMLAddMat();
    ?>


    <!--Modificar maestro-->
    <?php
    $am->writeHTMLModMat();
    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  	<script src="js/adminMatActions.js"></script>

  	<!-- <script src="style/alertify/alertify.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
