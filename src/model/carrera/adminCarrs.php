<?php
namespace Horarios\model\carrera;

use Horarios\model\carrera\carreraDB;

class adminCarrs
{
  private $tipo;

  public function __construct($tipo)
  {
    $this->tipo = $tipo;
  }

  public function writeHTMLAddCarrs()
  {
    ?>
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmAddCarr">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Carrera</h4>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <label>Nombre de la carrera</label>
              <input type="text" class="form-control" placeholder="Nombre Carrera" name="txtNomCarr" id="txtNomCarr">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnClose">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnSaveCarr">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <?php
  }

  public function writeHTMLModCarr()
  {
    ?>
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmModCarr">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Carrera</h4>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <label>Nombre de la carrera</label>
              <input type="hidden" name="numCarr" id="numCarr" val="">
              <input type="text" class="form-control" placeholder="Nombre Carrera" name="txtModCarr" id="txtModCarr">
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
