<?php
namespace Horarios\model;

use Horarios\model\managePanel;

class manageProf extends managePanel
{
  public function __construct(String $user, String $tipo, String $carrera, String $contrato)
  {
    parent::__construct($user, $tipo, $carrera, $contrato);
  }

  public function writeHTMLNavBar()
  {
    ?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar color-barra">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link actual" href="panel.php"><span class="fa fa-cog iconos actualic" aria-hidden="true"></span> Home</a>
            </li>

            <!-- Esta parte no me acuerdo como lo estoy manejando, no se si un profesor puede dar materias en otra carrera
            <li class="nav-item">
              <a class="nav-link" href="carreras.php"><span class="fa fa-institution iconos" aria-hidden="true"></span> CARRERAS <span class="badge badge-pill badge-primary pull-right textonum">echo getNumCarrera()</span></a>
            </li> -->
           <!--  <li class="nav-item">
              <a class="nav-link" href="valueMat.php"><span class="fa fa-calendar iconos" aria-hidden="true"></span> EVALUAR MATERIA<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="disponibilidad.php"><span class="fa fa-legal iconos" aria-hidden="true"></span> DISPONIBILIDAD<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ProfAulas.php"><span class="fa fa-legal iconos" aria-hidden="true"></span>GRUPOS<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
          </ul>
        </div>

    <?php
  }

  public function writeHTMLBoard()
  {
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <h1 class="page-header"><span class="fa fa-cog" aria-hidden="true"></span> Panel de Administración del Profesor</h1>
     <div class="row placeholders">
       <!-- Lo mismo que el punto anterior
       <div class="col-md-3 cuadro2">
               <h1 class="numcuad">2</h1>
               <h4>Carreras</h4>
               <span class="fa fa-home grandes2 pull-right" aria-hidden="true"></span>
       </div> -->
       <a href="disponibilidad.php">
         <div class="col-md-3 cuadro3">
            <h1 class="numcuad"></h1>
            <h4> Actualizar Disponibilidad</h4>
            <span class="fa fa-calendar grandes3 pull-right" aria-hidden="true"></span>
         </div>
        </a>
        
        <!-- <a href="valueMat.php">
          <div class="col-md-3 cuadro1">
            <h1 class="numcuad"></h1>
            <h4>Evaluar Materia</h4>
            <span class="fa fa-legal grandes1 pull-right" aria-hidden="true"></span>
          </div>
       </a> -->
     </div>
   </div>

    <?php
  }
}
?>
