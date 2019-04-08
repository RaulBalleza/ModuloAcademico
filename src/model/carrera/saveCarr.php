<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\carrera\carreraDB;

$dbcarr = new carreraDB($_SESSION["tipo"]);

$nomcarr = $_POST["nomcarr"] ?? FALSE;

if ($nomcarr)
{
  switch($dbcarr->saveNewCarr($nomcarr))
  {
    case 0:
      echo "!!! Ups !!! algo va mal";
    break;
    case -1:
      echo "La carrera ya existe. Por favor ingresa otra";
    break;
    case -2:
      echo "No fue posible registrar la carrera. Por favor intente más tarde";
    break;
    case 1:
      echo "SUCCESS";
    break;
  }
}
else {
  echo "!!! Ups !!! algo va mal";
}


?>
