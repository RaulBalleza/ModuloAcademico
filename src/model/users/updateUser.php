<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\users\userDB;

$dbuser = new userDB($_SESSION["tipo"]);

switch($dbuser->updateUser($_POST))
{
  case 0:
    echo "!!! Ups !!! algo va mal";
  break;
  case -1:
    echo "Verifique los datos enviados.";
  break;
  case -2:
    echo "El usuario ya esta registrado.";
  break;
  case -3:
    echo "No se pudo ingresar el usuario. Verifique los datos";
  break;
  case 1:
    echo "SUCCESS";
  break;
}

?>
