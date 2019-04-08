<?php
session_start();
include_once('../../../init.php');

use Horarios\model\materias\materiaDB;

$dbmat = new materiaDB($_SESSION["tipo"]);

switch($dbmat->updateMat($_POST))
{
  case 0:
    echo "!!! Ups !!! algo va mal";
  break;
  case -1:
    echo "Verifique los datos enviados.";
  break;
  case -2:
    echo "La materia ya esta registrada.";
  break;
  case -3:
    echo "No se pudo ingresar la materia. Verifique los datos";
  break;
  case 1:
    echo "SUCCESS";
  break;
}

?>
