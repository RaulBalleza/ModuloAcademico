<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\materias\materiaDB;

$dbmat = new materiaDB($_SESSION["tipo"]);

$isPost = $_POST["materia"] ?? FALSE;
$clvPlan = $_POST["clvPlan"] ?? FALSE;

if ($isPost && $clvPlan)
{
  $data = $dbmat->getMateriaData($isPost, $clvPlan);
  header('Content-Type: application/json');
  echo json_encode($data[0],JSON_FORCE_OBJECT);
}

?>
