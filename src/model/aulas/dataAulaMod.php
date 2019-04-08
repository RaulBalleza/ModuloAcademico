<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\aulas\aulaDB;

$dbaula = new aulaDB($_SESSION["tipo"]);

$isPost = $_POST["aula"] ?? FALSE;

if ($isPost)
{
  $data = $dbaula->getAulaData($isPost);
  header('Content-Type: application/json');
  //echo json_encode($data,JSON_FORCE_OBJECT);
  //var_dump($data);

  //var_dump($data[0]);
  echo json_encode($data[0],JSON_FORCE_OBJECT);

}

?>
