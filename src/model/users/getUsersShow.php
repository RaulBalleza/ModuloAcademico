<?php
session_start();
include_once ('../../../init.php');

use Horarios\model\users\userDB;

$dbuser = new userDB($_SESSION["tipo"],$_SESSION["carrera"]);

$data = $dbuser->getAllUsers("CARR_NAME");
?>

<table class="table table-striped table-hover">
    <tr>
        <th>Clave/e-mail</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Carrera</th>
        <th>Contrato</th>
        <th>Opciones</th>
    </tr>
    <tr>
        <?php foreach($data as $us): ?>
            <td><?php echo $us["clave"]; ?></td>
            <td><?php echo $us["nivel"] . " " . $us["nombre"]; ?></td>
            <td><?php echo $us["tipo"]; ?></td>
            <td><?php echo $us["carrera"]; ?></td>
            <td><?php echo $us["contrato"]; ?></td>
            <td><a class="btn btn-primary" type="button" onclick="agregaFormulario('<?php echo $us["clave"]; ?>')">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  Modificar
                </a>
                <!-- <a class="btn btn-danger" onclick="">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  Eliminar
                </a> -->
            </td>
    </tr>
<?php endforeach; ?>
</table>
