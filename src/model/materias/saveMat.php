<?php
session_start();

include_once ('../../../init.php');

use Horarios\model\materias\materiaDB;

$dbmat = new materiaDB($_SESSION["tipo"]);

switch($dbmat->saveNewMat($_POST))
 {
   case 0:
     echo "!!! Ups !!! algo va mal";
   break;
   case -1:
     echo "No fue posible registrar la materia. Por favor intente más tarde";
   break;
   case -2:
      echo "<script>alert('Ya existe una materia en ese cuarimestre y en esa posición. Intenta de nuevo');</script>";
    break;
   case -3:
     echo "No se pudo ingresar la materia. Verifique los datos";
   break;
   case 1:
     echo "SUCCESS";
   break;
 }
?>
