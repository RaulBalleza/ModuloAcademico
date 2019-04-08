<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\planes\planesDB;

$nomPlan = $_POST["nomPlan"] ?? FALSE;
$clvPlan = $_POST["clave"] ?? FALSE;

if ($nomPlan != FALSE && $clvPlan != FALSE)
{
  $pdb = new planesDB($_SESSION["tipo"]);

  switch ($pdb->updatePlan($clvPlan, $nomPlan)) {
    case 0:
        echo "!!! Ups !!! algo va mal";
      break;
    case -1:
      echo "El plan no esta registrado, intente con otro";
      break;
    case -2:
      echo "Error: No se pudo actualizar el nuevo plan";
      break;
    case 1:
      echo "SUCCESS";
      break;
    default:
     echo "Error no definido";
      break;
  }
}
else {
  echo "!!! Ups !!! algo va mal";
}
