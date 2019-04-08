<?php
namespace Horarios\model\users;

use Horarios\model\users\userDB;
use Horarios\model\carrera\carreraDB;

class adminUsers
{
  private $user;
  private $tipo;
  private $carrera;
  private $contrato;

  public function __construct(String $user, String $tipo, String $carrera, String $contrato)
  {
    $this->user = $user;
    $this->tipo = $tipo;
    $this->carrera = $carrera;
    $this->contrato = $contrato;
  }

  public function writeHTMLModUser()
  {
    ?>
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form name="frmModificar">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modificar profesor</h4>
            </div>
            <div class="modal-body">
             <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" name="m_nombre" id="m_nombre">
              <input type="hidden" id="m_clave" name="m_clave" value="">
            </div>
            <div class="form-group">
              <label>Tipo de usuario</label>
              <select name="m_tipou" id="m_tipou" class="form-control">
                <option>PROF</option>
                <option>ALUM</option>
                <?php if ($this->tipo == 'admi'): ?> <option>DIRE</option> <?php endif; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Carrera</label>
              <select name="m_carrera" id="m_carrera" class="form-control">
                <?php $this->getHTMLOptionCarrera(); ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nivel de adscripción</label>
              <select name="m_nivelads" id="m_nivelads" class="form-control">
                <option>Dr.</option>
                <option>M.C</option>
                <option>Ing.</option>
                <option>Lic.</option>
                <option> </option>
              </select>
            </div>
            <div class="form-group">
              <label>Contrato</label>
              <select name="m_contrato" id="m_contrato" class="form-control">
                <option>PA</option>
                <option>PTC</option>
                <option>-</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnModCancel">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnModGuardar">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}

public function writeHTMLAddUser()
{
  ?>
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="" enctype="multipart/form-data" name="registration"/>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar profesor</h4>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label>Clave/Correo electronico</label>
            <input type="text" class="form-control" placeholder="Correo electrónico" name="clave" id="clave">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" placeholder="nombre" name="nombre" id="nombre">
          </div>
          <div class="form-group">
            <label>Tipo de usuario</label>
            <select name="tipou" class="form-control">
              <option value="PROF">Profesor</option>
              <?php if ($this->tipo == "dire"): ?> <option value="DIRE">Alumno</option> <?php endif; ?>
              <?php if ($this->tipo == "admi"): ?> <option value="DIRE">Director</option> <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Carrera</label>
            <select name="carrera" class="form-control">
              <?php $this->getHTMLOptionCarrera(); ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nivel de adscripción</label>
            <select name="nivelads" class="form-control">
              <option>Dr.</option>
              <option>M.C</option>
              <option>Ing.</option>
              <option>Lic.</option>
              <?php if ($this->tipo == "dire"): ?> <option>Alumno</option> <?php endif; ?>
            </select/>
          </div>
          <div class="form-group">
            <label>Contrato</label>
            <select name="contrato" class="form-control">
              <option>PA</option>
              <option>PTC</option>
              <?php if ($this->tipo == "dire"): ?> <option>Alumno</option> <?php endif; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="btnClose">Cancelar</button>
          <button type="submit" class="btn btn-primary" id="btnSaveUser">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
}

private function getHTMLOptionCarrera()
{
  $carre = new carreraDB($this->tipo);
  if ($this->tipo == 'admi')
  {
    $r = $carre->getAllCarr();
  }
  else {
    $r = $carre->getCarrera($this->carrera);
  }

  foreach ($r as $carr) {
    echo "<option value='" . $carr["idcarrera"] . "'>" . $carr["nombre_carrera"] . "</option>";
  }
}
}
?>
