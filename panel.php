<?php

session_start();
include_once ('init.php');

$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged)
{
  header("Location: logout.php");
  exit;
}

use Horarios\model\manageAdmin;
use Horarios\model\manageProf;
use Horarios\model\manageDire;


switch($_SESSION["tipo"]) {
  case 'prof':
  $panel = new manageProf($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
  break;
  case 'admi':
  $panel = new manageAdmin($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
  break;
  case 'dire':
  $panel = new manageDire($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
  break;
  case 'alu':
  $panel = new manageDire($_SESSION["usuario"], "dire", $_SESSION["carrera"],$_SESSION["contrato"]);
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
  if ($_SESSION["contrato"]=="Alu") {
    $panel->writeHTMLPanelBar2();
    $panel->writeHTMLNavBar2();
    $panel->writeHTMLBoard2();
  }else{
    $panel->writeHTMLPanelBar();
    $panel->writeHTMLNavBar();
    $panel->writeHTMLBoard();
  }

  ?>

</div>
</div>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
