<?php
namespace Horarios\model;

use Horarios\model\managePanel;

class manageAdmin extends managePanel
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
              <a class="nav-link actual" href="panel.php"><span class="fa fa-cog iconos actualic" aria-hidden="true"></span> GENERAL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminUsers.php"><span class="fa fa-briefcase iconos" aria-hidden="true"></span> USUARIOS <span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminAulas.php"><span class="fa fa-university iconos" aria-hidden="true"></span> AULAS<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminCarr.php"><span class="fa fa-institution iconos" aria-hidden="true"></span> CARRERAS <span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="adminMat.php"><span class="fa fa-book iconos" aria-hidden="true"></span> MATERIAS<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li>-->
            <!-- <li class="nav-item">
              <a class="nav-link" href="adminPlanes.php"><span class="fa fa-list-alt iconos" aria-hidden="true"></span> PLANES<span class="badge badge-pill badge-primary pull-right textonum"></span></a>
            </li> -->
          </ul>
        </div>

    <?php
  }


  public function writeHTMLBoard()
  {
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <h1 class="page-header"><span class="fa fa-cog" aria-hidden="true"></span> Panel de Administración</h1>
     <div class="row placeholders">
        <a href="adminCarr.php">
          <div class="col-md-3 cuadro2">
            <h1 class="numcuad"></h1>
            <h4>Carreras</h4>
            <span class="fa fa-institution grandes2 pull-right" aria-hidden="true"></span>
          </div>
        </a>
        <a href="adminUsers.php">
          <div class="col-md-3 cuadro3">
            <h1 class="numcuad"></h1>
            <h4>Usuarios</h4>
            <span class="fa fa-briefcase grandes3 pull-right" aria-hidden="true"></span>
          </div>
        </a>
        <a href="adminAulas.php">
          <div class="col-md-3 cuadro4">
             <h1 class="numcuad"></h1>
             <h4>Aulas</h4>
             <span class="fa fa-university grandes4 pull-right" aria-hidden="true"></span>
          </div>
        </a>
          <!-- <a href="adminPlanes.php">
            <div class="col-md-3 cuadro4">
              <h1 class="numcuad"></h1>
              <h4>Planes</h4>
              <span class="fa fa-list-alt grandes4 pull-right" aria-hidden="true"></span>
            </div>
          </a>
          <a href="disponibilidad.php">
           <div class="col-md-3 cuadro1">
              <h1 class="numcuad"></h1>
              <h4> Actualizar Disponibilidad</h4>
              <span class="fa fa-legal grandes1 pull-right" aria-hidden="true"></span>
           </div>
          </a> -->
        <!--<div class="col-md-3 cuadro5">
                <h1 class="numcuad"></h1>
                <h4>Materias</h4>
                <span class="fa fa-book grandes5 pull-right" aria-hidden="true"></span>
        </div>-->
      </div>
   </div>

    <?php
  }
}
?>
