<?php
session_start();
include_once('../../../init.php');

use Horarios\model\materias\materiaDB;
use Horarios\model\planes\planesDB;
use Horarios\model\valorar\valorarDB;

$plan = $_POST["clvPlan"] ?? FALSE;

if (!$plan)
{
  exit;
}

$mdb = new materiaDB($_SESSION["tipo"]);
$pdb = new planesDB($_SESSION["tipo"]);

$mats = $mdb->getArrayMats($plan);

$strNumCuat = ["Primer", "Segundo", "Tercer", "Cuatro", "Quinto", "Sexto", "Septimo", "Octavo", "Noveno", "Decimo"];
$strPlan = $pdb->getStrPlan($plan);
$nivelPlan = $pdb->getNivelPlan($plan);

switch ($nivelPlan) {
  case 'ING':
  case 'LIC':
    $count = 10;
    break;
  case 'PA':
    $count = 7;
    break;
  case 'MI':
    $count = 6;
    break;
  default:
    $count = 0;
    break;
}
?>
<table class="table table-striped table-hover" id="tableMaterias">
  <div class="nombreCarr" id="tituloCarrera">
    <?php echo $strPlan; ?><br>
    [<?php echo $plan; ?>]
  </div>
  <thead>
    <tr>
      <?php
      //var_dump($mats);
      for($i=0; $i < $count; $i++)
      {
        echo "<th>" . $strNumCuat[$i] . " Cuatrimestre</th>";
      }
      ?>
    </tr>
  </thead>

  <?php

  $vdb = new valorarDB($_SESSION["tipo"]);

  for($i=1; $i <= 7; $i++)
  {
    echo "<tr>\n";
    for ($j=0; $j< $count; $j++)
    {
      if (isset($mats[$j+1][$i][1]))
      {
        ?>
        <td>
          <div  class="materia">
            <div class="claveMat"><?php echo $mats[$j+1][$i][0]; ?></div>
            <div class="nomMateria"><?php echo $mats[$j+1][$i][1]; ?></div>
            <?php
            if ($_SESSION["tipo"] == 'dire')
            {
              echo "<button type=\"button\" name=\"button\" class=\"boton\" onclick=\"showValuedProfs('" . $mats[$j+1][$i][0] . "')\"></button>";
            }
            else {
              echo "<div class=\"califProf\">\n";

              $pts = $vdb->getValProf($mats[$j+1][$i][0], $plan, $_SESSION["usuario"]);
              echo "<select class='lstPuntosProf' name='lstPuntosProf' onchange=\"savUpVal('" . $mats[$j+1][$i][0] . "',this.value)\">\n";
              for($k=0; $k<=5; $k++)
              {
                if ($k == $pts)
                {
                  echo "<option value=\"" . $k . "\" selected>" . $k . "</option>";
                }
                else {
                  echo "<option value=\"" . $k . "\">" . $k . "</option>";
                }

              }
              echo "</select>\n";
              echo "</div>\n";
            }
             ?>
          </div>
        </td>
        <?php
      }
      else {
        echo "<td>\n<div class=\"materia\">\n<div class=\"nomMateria\"></div><br>\n<div class=\"claveMat\"></div>|<div class=\"creditos\"></div></div></td>";
      }
    }
    echo "</tr>\n";
  }
   ?>

</table>
