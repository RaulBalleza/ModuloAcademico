<?php
session_start();
include_once('../../../init.php');

use Horarios\model\planes\planesDB;
//use Horarios\model\carrera\carreraDB;

$pdb = new planesDB($_SESSION["tipo"]);

if ($_SESSION["tipo"] == "admi"):
    $data = $pdb->getAllPlanes("CARR_NAME");
?>

<table class="table table-striped table-hover">
    <tr>
        <th>Clave</th>
        <th>Nombre del Plan</th>
        <th>Nivel</th>
    </tr>
    <?php foreach($data as $ca): ?>
    <tr>
            <td><?php echo $ca["clave"]; ?></td>
            <td><?php echo $ca["nombre"]; ?></td>
            <td><?php echo $ca["nivel"]; ?></td>
            <td><?php echo $ca["nombre_carrera"] ?></td>
            <td><a class="btn btn-primary" type="button" onclick="agregaFormulario('<?php echo $ca["clave"] . "','" . $ca["nombre"] . "'," . $ca["idcarrera"]; ?>)">
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
<?php
elseif ($_SESSION["tipo"] == "dire"):
  $data = $pdb->getPlanesCarrera($_SESSION["carrera"]);
?>

<table class="table table-striped table-hover">
    <tr>
        <th>Clave</th>
        <th>Nombre del Plan</th>
        <th>Nivel</th>
        <th></th>
    </tr>
    <?php foreach($data as $ca): ?>
    <tr>
            <td><?php echo $ca["clave"]; ?></td>
            <td><?php echo $ca["nombre"]; ?></td>
            <td><?php echo $ca["nivel"]; ?></td>
            <td><a class="btn btn-primary" type="button" onclick="agregaFormulario('<?php echo $ca["clave"] . "','" . $ca["nombre"]; ?>')">
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
<?php
else:
  echo "Tu no deberías estar aquí";
endif;
?>
