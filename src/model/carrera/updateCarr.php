<?php
session_start();
include_once('../../../init.php');

use Horarios\model\carrera\carreraDB;

$dbcarr = new carreraDB($_SESSION["tipo"]);

$nomcarr = $_POST["txtModCarr"] ?? FALSE;
$idcarr = $_POST["idcarrera"] ?? FALSE;

if ($nomcarr != FALSE && $idcarr != FALSE)
{
  switch($dbcarr->updateCarr($nomcarr, $idcarr))
  {
    case -1:
      echo "No se pudo ingresar el usuario. Verifique los datos";
    break;
    case 1:
      echo "SUCCESS";
    break;
    default:
      echo "!!! Ups !!! algo va mal";
    break;
  }
}
else {
  echo "!!! UPS !!! algo va mal";
}
?>
