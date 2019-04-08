<?php
session_start();
include_once('../../../init.php');

use Horarios\model\valorar\valorarDB;
use Horarios\model\users\userDB;

$mat = $_POST["clvMat"] ?? FALSE;
$plan = $_POST["clvPlan"] ?? FALSE;

if ($mat && $plan):
  $vdb = new valorarDB($_SESSION["tipo"]);

  $vpm = $vdb->getValProfMat($plan, $mat);
?>
<table class="table table-striped table-hover">
    <tr>
        <th>Nombre</th>
        <th>Correo electrónico</th>
        <th>Ponderación propia</th>
        <th>Ponderación del director</th>
        <th>Total</th>
    </tr>
    <tr>
      <form name="frmNewValProf">
      <td>
        <select name="lstNameProf" id="lstNameProf" onchange="putTdClvProf(this.value)">
          <?php
          $udb = new userDB($_SESSION["tipo"],$_SESSION["carrera"]);
          $usrs = $udb->getAllUsers();
          ?>
          <option value="-1" selected>Selecciona a un profesor</option>
          <?php
          foreach($usrs as $u)
          {
            $ok = TRUE;
            foreach ($vpm as $prof)
            {
              if($u["clave"] == $prof["clave"])
              {
                $ok = FALSE;
                break;
              }
            }

            if($ok)
            {
              echo "<option value=\"" . $u["clave"] . "\">" . $u["nombre"] . "</option>";
            }
          }
          ?>
        </select>
      <td id="clvProf"></td>
      <td>0</td>
      <td>
        <select id="lstPtsNewProf" disabled="true" onchange="cambiaPtsTotal(this.value)">
        <?php
          for ($i=0; $i<=5; $i++)
          {
              echo "<option value=\"" . $i . "\">" . $i . "</option>";
          }
        ?>
        </select>
      </td>
      <td id="PtsTotal"></td>
    </form>
    </tr>
    <?php
    foreach ($vpm as $prof):
    ?>
    <tr>
        <td><?php echo $prof["nombre"]; ?></td>
        <td><?php echo $prof["clave"]; ?></td>
        <td><?php echo $prof["ptsProf"]; ?></td>
        <td>
          <select id="lstPuntos" onchange="savUpValDir('<?php echo $prof["clave"]; ?>',this.value)">
          <?php
            for ($i=0; $i<=5; $i++)
            {
              if ($i == $prof["ptsDire"])
              {
                echo "<option value=\"" . $i . "\" selected>" . $i . "</option>";
              }
              else {
                echo "<option value=\"" . $i . "\">" . $i . "</option>";
              }

            }
          ?>
        </select>
        </td>
        <td><?php echo $prof["total"]; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
