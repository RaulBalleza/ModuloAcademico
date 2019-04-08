<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\planes\planesDB;

$nomPlan = $_POST["nomPlan"] ?? FALSE;
$clvPlan = $_POST["clave"] ?? FALSE;

if ($nomPlan != FALSE && $clvPlan != FALSE)
{
  $pdb = new planesDB($_SESSION["tipo"]);

  switch ($pdb->addNewPlan($clvPlan, $nomPlan,$_POST["nivel"], $_POST["carrera"])) {
    case 0:
        echo "!!! Ups !!! algo va mal";
      break;
    case -1:
      echo "El plan ya esta registrado, intente con otro";
      break;
    case -2:
      echo "Error: No se pudo ingresar el nuevo plan";
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


?>
