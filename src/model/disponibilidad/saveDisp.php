<?php
session_start();
include_once('../../../init.php');

use Horarios\model\disponibilidad\disponibilidadDB;

$dis = new disponibilidadDB($_SESSION["tipo"]);

$timeSlot = $_POST["timeSlot"] ?? FALSE;
$user = $_POST["user"] ?? $_SESSION["usuario"];

if ($timeSlot)
{
  switch($dis->saveTimeSlot($user,$timeSlot))
  {
    case 1:
      echo "SUCCESS";
      break;
    case -1:
      echo "No se reconoce el espacio de tiempo";
      break;
    case -2:
      echo "No se puede agregar a la base de datos";
      break;
    default:
      echo "!!! UPS !!! Algo va mal";
      break;
  }
}
?>
