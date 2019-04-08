<?php
namespace Horarios\model\aulas; //el namespace funciona para no mostrar toda la ruta del archivo, sino que oculta parte de la ruta
use Horarios\model\aulas\aulaDB; //se hará uso del archivo aulaDB

//se crea una clase llamada adminAulas que contendrá los modales o formularios que son llamados en el archivo adminAulas.php que se encuentra en la raíz
class adminAulas
{
  private $tipo;

  //que recibirá el tipo de usuario
  public function __construct(String $tipo)
  {
    $this->tipo = $tipo;
  }

  //este método crea el modal para modificar una aula, lo importante es que el modal y el botón de guardar y cancelar tengan un id
  //y el fomulario y los elementos de este formulario contengan un name con el cual se puedan identificar, ya que estos serán
  // llamarán eventos en el archivo adminAulasActions.js que se encuentra en la carpeta js
  public function writeHTMLModAula()
  {
    ?>
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action="" enctype="multipart/form-data" name="frmAulaModificar">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modificar aula</h4>
            </div>
            <div class="modal-body">
             <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" name="m_nombre" id="m_nombre">
              <input type="hidden" id="m_clave" name="m_clave" value="">
            </div>
            <div class="form-group">
              <label>Tipo</label>
              <select name="m_tipoa" id="m_tipoa" class="form-control">
                <option>Aula</option>
                <option>Laboratorio</option>
                <option>Taller</option>
              </select>
            </div>
            <div class="form-group">
              <label>Capacidad</label>
              <input type="number" class="form-control" placeholder="Capacidad" name="m_capacidad" id="m_capacidad">
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

//este método crea el modal para agregar una nueva aula, tanto el modal como el botón necesitan de un id y el formulario como sus elementos un name
public function writeHTMLAddAula()
{
  ?>
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="" enctype="multipart/form-data" name="frmAddAula"/>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar aula</h4>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label>Clave</label>
            <input type="text" class="form-control" placeholder="Clave" name="clave" id="clave">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
          </div>
          <div class="form-group">
            <label>Tipo</label>
            <select name="tipoa" id="tipoa" class="form-control">
              <option>Aula</option>
              <option>Laboratorio</option>
              <option>Taller</option>
            </select>
          </div>
          <div class="form-group">
            <label>Capacidad</label>
            <input type="number" class="form-control" placeholder="Capacidad" name="capacidad" id="capacidad">
          </div>
          <div class="form-group">
            <label>Profesor</label>
            <select name="prof" id="prof" class="form-control">
              <?php
              include "DB.php";
              $query = $mysqli -> query ("SELECT * FROM usuarios WHERE tipo_usuario='PROF'");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores[clv_usuario].'">'.$valores[nombre_usuario].'</option>';
              }
              $conn = null;
              ?>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="btnClose">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnSaveAula">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}

//este método es para agregar un nuevo equipo, el modal como los botones de cancelar y guardar tienen un id y el formulario y sus elementos un name
public function writeHTMLAddEquipo()
{
  ?>
  <div class="modal fade" id="agregarEquipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form method="POST" action="" enctype="multipart/form-data" name="frmAddEquipo" />
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Agregar Equipo</h4>
       </div>
       <div class="modal-body">
         <div class="form-group">
           <label>Nombre</label>
           <input type="text" class="form-control" placeholder="Nombre" name="e_nombre" id="e_nombre">
         </div>
         <div class="form-group">
           <label>Descripción</label>
           <textarea class="form-control" rows="5" cols="80" name="e_descripcion" id="e_descripcion"></textarea>
         </div>
         <div class="form-group">
           <label>Categoría</label>
           <select name="e_categoria" id="e_categoria" class="form-control">
             <?php
             $cat = new aulaDB($this->tipo);
             $r = $cat->getAllCategorias();

             foreach($r as $rCat){
              echo "<option value='" . $rCat["id"] . "'>".$rCat["nombre"]."</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseEquipo">Cancelar</button>
       <button type="submit" class="btn btn-primary" id="btnSaveEquipo">Guardar</button>
     </div>
   </form>
 </div>
</div>
</div>

<?php
}

//modal para agregar una nueva categoría, los botones de cancela y guardar junto con el modal tienen un id y el formulario y sus elementos un name
public function writeHTMLAddCategoria()
{
  ?>
  <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <form method="POST" action="" enctype="multipart/form-data" name="frmAddCategoria" />
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">Agregar Categoría</h4>
       </div>
       <div class="modal-body">
         <div class="form-group">
           <label>Nombre</label>
           <input type="text" class="form-control" placeholder="Nombre" name="c_nombre" id="c_nombre">
         </div>
         <div class="form-group">
           <label>Descripción</label>
           <textarea class="form-control" rows="5" cols="80" name="c_descripcion" id="c_descripcion"></textarea>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseCat">Cancelar</button>
         <button type="submit" class="btn btn-primary" id="btnSaveCategoria">Guardar</button>
       </div>
     </form>
   </div>
 </div>
</div>
<?php
}
}
?>
