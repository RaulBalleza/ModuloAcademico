<?php
session_start();
include_once ('../../../init.php');

use Horarios\model\aulas\aulaDB;

$dbaula = new aulaDB($_SESSION["tipo"]);

$data = $dbaula->getAllAulas();
?>

<form action="asignarEquipo.php" method="POST">
<table class="table table-striped table-hover">
    <tr>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Capacidad</th>
        <th>Opciones</th>
    </tr>
    <tr>
        <?php foreach($data as $au): ?>
            <td><?php echo $au["clave"]; ?></td>
            <td><?php echo $au["nombre"]; ?></td>
            <td><?php echo $au["tipo"]; ?></td>
            <td><?php echo $au["capacidad"]; ?></td>
            <td>
                <a class="btn btn-primary" type="button" onclick="agregaFormulario('<?php echo $au["clave"]; ?>')">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  Modificar
                </a> 
            </td>
    </tr>
<?php endforeach; ?>
</table>
</form>
