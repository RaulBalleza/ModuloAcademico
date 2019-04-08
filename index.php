<?php
session_start();

include_once ('init.php');

$isLogged = $_SESSION["islogged"] ?? FALSE;

if ($isLogged)
{
  header("Location: panel.php");
  exit;
}





?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ingresar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style/login_califs.css">

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- <script src="js/initSessionActions.js"></script> -->
    <script type="text/javascript" src="js/initSessionActions.js"></script>
</head>
<body>
    <form action="#" method="post">
        <h2>Iniciar sesión</h2>
        <p align="center"><img src="img/logo.png" width="106.96" height="90.3"></p>
        <input type="text" placeholder="Usuario" name="usuario" required>
        <input type="password" placeholder="Contraseña" name="clave" required>
        <div id="msnAlert"></div>
        <input id="btnInicia" type="button" value="Inicia Sesion" name="btnInicia" onclick="enviaDatos();">
    </form>
</body>
</html>
