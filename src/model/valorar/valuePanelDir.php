<?php
namespace Horarios\model\valorar;

use Horarios\model\manageDire;

class valuePanelDir extends manageDire
{

  public function __construct(String $user, String $tipo, String $carrera, String $contrato)
  {
    parent::__construct($user, $tipo, $carrera, $contrato);
  }

  public function writeProfsVals()
  {
    ?>
    <!--agregar puntuacion materia-->
    <div class="modal fade" id="califDir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><div>Profesores valuados para la materia </div><div id="modalMatClv"></div></h4>
                    </div>
                    <div class="modal-body" id="valMatProf" name="valMatProf">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <!--  <button type="submit" class="btn btn-primary" id="actualiza">Guardar</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
  }

}
?>
