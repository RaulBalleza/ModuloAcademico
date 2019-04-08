<?php
session_start();
include_once ('../../../init.php');

use Horarios\model\valorar\valorarDB;

$vdb = new valorarDB($_SESSION["tipo"]);

$mat = $_POST["clvMat"] ?? FALSE;
$plan = $_POST["clvPlan"] ?? FALSE;
$usr = $_POST["clvUser"] ?? $_SESSION["usuario"];

if (isset($_POST["ptsProf"]))
{
  $pts["ptsProf"] = $_POST["ptsProf"];
}

if (isset($_POST["ptsDire"]))
{
  $pts["ptsDire"] = $_POST["ptsDire"];
}

if ($mat && $plan)
{
  switch ($vdb->saveConfidence($mat, $plan, $usr,$pts))
  {
    case 0:
      echo "!!!UPS, algo salio mal ¡¡¡";
    break;
    case 1:
      echo "SUCCESS";
    break;
    case -1:
      echo "No se pudo actualizar la puntuación del director";
    break;
    case -2:
      echo "No se pudo actualizar la puntuación del profesor";
    break;
    case -3:
      echo "No se pudo ingresar la puntuación del director";
    break;
    case -4:
      echo "No se pudo ingresar la puntuación del profesor";
    break;
    default:
      echo "!!! Algo va mal ¡¡¡";
    break;
  }
}
else
{
  echo "Algo va muy mal.";
}


 ?>
