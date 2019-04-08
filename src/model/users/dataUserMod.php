<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\users\userDB;

$dbuser = new userDB($_SESSION["tipo"]);

$isPost = $_POST["usuario"] ?? FALSE;

if ($isPost)
{
  $data = $dbuser->getUserData($isPost);
  header('Content-Type: application/json');
  //echo json_encode($data,JSON_FORCE_OBJECT);
  //var_dump($data);

  //var_dump($data[0]);
  echo json_encode($data[0],JSON_FORCE_OBJECT);

}

?>
