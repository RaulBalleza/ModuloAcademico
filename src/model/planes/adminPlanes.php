<?php
namespace Horarios\model\planes;

use Horarios\model\planes\planesDB;
use Horarios\model\carrera\carreraDB;

class adminPlanes
{
  private $tipo;
  private $carrera;

  public function __construct($tipo, $carrera=0)
  {
    $this->tipo = $tipo;
    $this->carrera = $carrera;
  }

  public function writeHTMLAddPlan()
  {
    ?>
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmAddPlan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Plan de Estudios</h4>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <label>Clave del Plan</label>
              <input type="text" class="form-control" placeholder="Clave Plan" name="txtClavePlan" id="txtClavePlan">
            </div>
            <div class="form-group">
              <label>Nombre del Plan</label>
              <input type="text" class="form-control" placeholder="Nombre Plan" name="txtNomPlan" id="txtNomPlan">
            </div>
            <div class="form-group">
              <label>Carrera:</label>
              <select name="lstCarreras" class="form-control">
              <?php
              $cdb = new carreraDB($this->tipo);

              if ($this->tipo == "admi")
              {
                $r = $cdb->getAllCarr();
                foreach($r as $carrera)
                {
                  echo "<option value='" . $carrera["idcarrera"] . "'>" . $carrera["nombre_carrera"] . "</option>";
                }
              }
              else {
                $r =$cdb->getCarrera($this->carrera);
                echo "<option value='" . $r[0]["idcarrera"] . "'>" . $r[0]["nombre_carrera"] . "</option>";
              }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nivel:</label>
              <select name="lstNivel" class="form-control">
                <option value="ING">Ingeniería</option>
                <option value="LIC">Licenciatura</option>
                <option value="PA">Profesional Asociado</option>
                <option value="MI">Maestría</option>
              </select>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnClose">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnSavePlan">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <?php
  }

  public function writeHTMLModPlan()
  {
    ?>
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmModPlan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Plan de Estudios</h4>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <label>Nombre del Plan</label>
              <input type="hidden" name="clvPlan" id="clvPlan" val="">
              <input type="text" class="form-control" placeholder="Nombre Plan" name="txtModNomPlan" id="txtModNomPlan">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnModClose">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnModCarr">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <?php
  }
}
?>
