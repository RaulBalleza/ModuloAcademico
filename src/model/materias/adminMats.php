<?php
namespace Horarios\model\materias;

use Horarios\model\materias\carreraDB;
use Horarios\model\planes\planesDB;

class adminMats
{
  private $tipo;

  public function __construct($tipo)
  {
    $this->tipo = $tipo;
  }

  public function writeHTMLAddMat()
  {
    $pdb = new planesDB($_SESSION["tipo"]);
    $planes = $pdb->getPlanesCarrera($_SESSION["carrera"]);
    ?>
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmAddMat">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Materia</h4>
          </div>
          <div class="modal-body">
              <label>Plan de estudios</label>
              <select class="form-control" placeholder="Clave Plan" name="clavePlan" id="clavePlan">
                <?php
                foreach($planes as $plan)
                {
                  echo "<option value=\"" . $plan["clave"] . "\">" . $plan["nombre"] . "</option>";
                }
                ?>
              </select>
          </div>
          <div class="modal-body">
              <label>Clave</label>
              <input type="text" class="form-control" placeholder="Clave" name="clave" id="clave">
          </div>
          <div class="modal-body">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
          </div>
          <div class="modal-body">
              <label>Créditos</label>
              <input type="text" class="form-control" placeholder="Créditos" name="creditos" id="creditos">
          </div>
          <div class="modal-body">
              <label>Horas/Semana</label>
              <input type="text" class="form-control" placeholder="Horas/Semana" name="horas" id="horas">
          </div>
          <div class="modal-body">
              <label>Cuatrimestre</label>
              <select class="form-control" placeholder="Cuatrimestre" name="cuatri" id="cuatri">
                <?php
                for ($i=1; $i<=10;$i++)
                {
                  echo "<option value=\"" . $i . "\">$i</option>";
                }
                ?>
              </select>
          </div>
          <div class="modal-body">
              <label>Posición</label>
              <select class="form-control" placeholder="Posición" name="posicion" id="posicion">
                <?php
                for ($i=1; $i<=8;$i++)
                {
                  echo "<option value=\"$i\">$i</option>";
                }
                ?>
              </select>
          </div>
          <div class="modal-body">
              <label>Tipo de materia</label>
              <select class="form-control" placeholder="Tipo de materia" name="tipoMat" id="tipoMat">
                <option value="ESP">Especialidad</option>
                <option value="CIB">Ciencia Básica</option>
                <option value="TRC">Tronco Común</option>
              </select>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnClose">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnSaveMat">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <?php
  }

  public function writeHTMLModMat()
  {
    $pdb = new planesDB($_SESSION["tipo"]);
    $planes = $pdb->getPlanesCarrera($_SESSION["carrera"]);
    ?>
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmModMat">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Carrera</h4>
          </div>
          <div class="modal-body">
              <label>Plan de estudios</label>
              <select name="m_plan" id="m_plan" class="form-control">
                <?php
                foreach($planes as $plan)
                {
                  echo "<option value=\"" . $plan["clave"] . "\">" . $plan["nombre"] . "</option>";
                }
                ?>
              </select>
          </div>
          <div class="modal-body">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" name="m_nombre" id="m_nombre">
              <input type="hidden" id="m_clave" name="m_clave" value="">
          </div>
          <div class="modal-body">
              <label>Créditos</label>
              <input type="text" class="form-control" placeholder="Créditos" name="m_creditos" id="m_creditos">
          </div>
          <div class="modal-body">
              <label>Cuatrimestre</label>
              <select class="form-control" placeholder="Cuatrimestre" name="m_cuatri" id="m_cuatri">
                <?php
                for ($i=1; $i<=10;$i++)
                {
                  echo "<option value=\"$i\">$i</option>";
                }
                ?>
              </select>
          </div>
          <div class="modal-body">
              <label>Posición</label>
              <select class="form-control" placeholder="Posición" name="m_posicion" id="m_posicion">
                <?php
                for ($i=1; $i<=8;$i++)
                {
                  echo "<option value=\"$i\">$i</option>";
                }
                ?>
              </select>
            </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Tipo de materia</label>
              <select class="form-control" placeholder="Tipo de materia" name="m_tipoMat" id="m_tipoMat">
                <option value="ESP">Especialidad</option>
                <option value="CIB">Ciencia Básica</option>
                <option value="TRC">Tronco Común</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnModClose">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnModMat">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <?php
  }
}
?>
