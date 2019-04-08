<?php
session_start();
include_once('../../../init.php');

use Horarios\model\carrera\carreraDB;

$cdb = new carreraDB($_SESSION["tipo"]);
$data = $cdb->getAllCarr();

?>

<table class="table table-striped table-hover">
    <tr>
        <th>Número</th>
        <th>Nombre de la Carrera</th>
        <th>Opciones</th>
    </tr>
    <tr>
        <?php foreach($data as $ca): ?>
            <td><?php echo $ca["idcarrera"]; ?></td>
            <td><?php echo $ca["nombre_carrera"]; ?></td>
            <td><a class="btn btn-primary" type="button" onclick="agregaFormulario('<?php echo $ca["idcarrera"] . "','" . $ca["nombre_carrera"]; ?>')">
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
