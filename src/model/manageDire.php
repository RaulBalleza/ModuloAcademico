<?php
namespace Horarios\model;

use Horarios\model\managePanel;
use Horarios\model\carrera\carreraDB;

class manageDire extends managePanel
{
  public function __construct(String $user, String $tipo, String $carrera, String $contrato)
  {
    parent::__construct($user, $tipo, $carrera, $contrato);
  }
  public function writeHTMLNavBar2()
  {
    ?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar color-barra">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link actual" href="panel.php"><span class="fa fa-cog iconos actualic" aria-hidden="true"></span> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="disponibilidad.php"><span class="fa fa-calendar iconos" aria-hidden="true"></span> DISPONIBILIDAD<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewSalones.php"><span class="fa fa-calendar iconos" aria-hidden="true"></span>CALIFICACONES<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
          </ul>
        </div>

        <?php
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
            <li class="nav-item">
              <a class="nav-link" href="adminUsers.php"><span class="fa fa-briefcase iconos" aria-hidden="true"></span> PROFESORES<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="adminMat.php"><span class="fa fa-book iconos" aria-hidden="true"></span> MATERIAS<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="adminAulas.php"><span class="fa fa-university iconos" aria-hidden="true"></span> AULAS<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="disponibilidad.php"><span class="fa fa-calendar iconos" aria-hidden="true"></span> DISPONIBILIDAD PROFESOREs<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>

            
            <!-- <li class="nav-item">
              <a class="nav-link" href="adminPlanes.php"><span class="fa fa-list-alt iconos" aria-hidden="true"></span> PLANES<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="valueMat.php"><span class="fa fa-legal iconos" aria-hidden="true"></span> EVALUAR PROFESOR<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li> -->
          </ul>
        </div>

        <?php
      }

      private function strNomCarr()
      {
        $carr = new carreraDB($this->tipo);
        return $carr->getCarreraUser($this->user);
      }

      public function writeHTMLBoard()
      {
        ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header"><span class="fa fa-cog" aria-hidden="true"></span> Panel de Administración de la <?php echo $this->strNomCarr(); ?></h1>
         <div class="row placeholders">
       <!-- Lo mismo que el punto anterior
       <div class="col-md-3 cuadro2">
               <h1 class="numcuad">2</h1>
               <h4>Carreras</h4>
               <span class="fa fa-home grandes2 pull-right" aria-hidden="true"></span>
             </div> -->

             <a href="adminUsers.php">
               <div class="col-md-3 cuadro5">
                <h1 class="numcuad"></h1>
                <h4>Profesores</h4>
                <span class="fa fa-briefcase grandes5 pull-right" aria-hidden="true"></span>
              </div>
            </a>
       <!-- <a href="adminMat.php">
         <div class="col-md-3 cuadro2">
            <h1 class="numcuad"></h1>
            <h4>Materias</h4>
            <span class="fa fa-book grandes2 pull-right" aria-hidden="true"></span>
         </div>
       </a> -->
       <a href="adminMat.php">
         <div class="col-md-3 cuadro4">
          <h1 class="numcuad"></h1>
          <h4>Aulas</h4>
          <span class="fa fa-university grandes4 pull-right" aria-hidden="true"></span>
        </div>
      </a>
      <a href="disponibilidad.php">
       <div class="col-md-3 cuadro3">
        <h1 class="numcuad"></h1>
        <h4> Ver Disponibilidad</h4>
        <span class="fa fa-calendar grandes3 pull-right" aria-hidden="true"></span>
      </div>
    </a>
       <!-- <a href="adminPlanes.php">
         <div class="col-md-3 cuadro4">
            <h1 class="numcuad"></h1>
            <h4> Planes de Estudio</h4>
            <span class="fa fa-list-alt grandes4 pull-right" aria-hidden="true"></span>
         </div>
       </a>
       <a href="valueMat.php">
         <div class="col-md-3 cuadro1">
            <h1 class="numcuad"></h1>
            <h4>Evaluar Profesor</h4>
            <span class="fa fa-legal grandes1 pull-right" aria-hidden="true"></span>
         </div>
       </a> -->
       
     </div>
   </div>

   <?php
 }
 public function writeHTMLBoard2()
 {
  ?>

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   <h1 class="page-header"><span class="fa fa-cog" aria-hidden="true"></span> Panel de Administración de la <?php echo $this->strNomCarr(); ?></h1>
   <div class="row placeholders">
     <a href="viewSalones.php">
       <div class="col-md-3 cuadro5">
        <h1 class="numcuad"></h1>
        <h4>Ver Calificaciones</h4>
        <span class="fa fa-briefcase grandes5 pull-right" aria-hidden="true"></span>
      </div>
    </a>
    <a href="disponibilidad.php">
     <div class="col-md-3 cuadro3">
      <h1 class="numcuad"></h1>
      <h4> Ver Disponibilidad de Profesores Y Horario</h4>
      <span class="fa fa-calendar grandes3 pull-right" aria-hidden="true"></span>
    </div>
  </div>
</div>

<?php
}
}
?>
