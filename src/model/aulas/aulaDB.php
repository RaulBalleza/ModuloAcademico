<?php
namespace Horarios\model\aulas;

//se hará uso de los archivos de conexión a la base de datos
use Horarios\Data\DataBase\SQLTrans;

//se crea una clase con las transacciones que se harán entre el controlador y el modelo
class aulaDB
{
  private $trans;
  private $tipo;

//el constructor recibirá el tipo de usuario que haya ingresado al sistema para poder conocer que permisos tiene para agregar, modificar
//en las tablas de la base de datos, estos permisos se encuentran descritos en el script de la base de datos
  public function __construct($tipo)
  {
    $this->tipo = $tipo;
    $this->trans = new SQLTrans($tipo);
  }

  /*public function isAulaRegistered($aula)
  {
    $sql = "SELECT count(*) as count FROM aulas WHERE id = '$aula'";

    $r = $this->trans->execNonTrans($sql);

    return ($r[0]["count"] < 1) ? FALSE : TRUE;
  }*/

//obtener la información de una aula específica, este método recibe el id de dicha aula
  public function getAulaData($aula)
  {
    $sql = "SELECT id as clave, nombre, tipo, capacidad FROM aulas WHERE id = '$aula'"; //se crea la consulta sql que traerá los campos de ese registro
    $res = $this->trans->execNonTrans($sql); //esta es una consulta no transaccional, es decir, que no modificará nada en la base de datos
    //el método execNonTrans se encuentra en el archivo SQLTrans

    return $res; //se retorna el registro solicitado
  }

//obtiene la información de todas las aulas que se encuentren registradas en la base de datos
  public function getAllAulas()
  {
    $sql = "SELECT id as clave, nombre as nombre, tipo as tipo, capacidad as capacidad FROM aulas"; //se específica que campos se quieren
    //la palabra "as" nos sirve para dar un alias al campo y es así como lo vamos a llamar fuera de aquí
    $res = $this->trans->execNonTrans($sql); //solo será una consulta en la base de adminAulasActions

    return $res; //se retornan todos los registros que se encuentran en la base de datos
  }
  
  public function getAllAulasProf($user)
  {
    $sql = "SELECT id as clave, nombre as nombre, tipo as tipo, capacidad as capacidad FROM aulas"; //se específica que campos se quieren
    //la palabra "as" nos sirve para dar un alias al campo y es así como lo vamos a llamar fuera de aquí
    $res = $this->trans->execNonTrans($sql); //solo será una consulta en la base de adminAulasActions

    return $res; //se retornan todos los registros que se encuentran en la base de datos
  }

//obtiene todas las categorías registradas en la base de datos
  public function getAllCategorias()
  {
    $sql = "SELECT * FROM categorias_equipo"; //todos los atributos del registro serán retornados
    $res = $this->trans->execNonTrans($sql); //esta es una consulta simple que no altera ningún elemento en la base de datos

    return $res; //retorna todos los registros que se encuentran en la tabla categorías
  }

//obtiene todos los equipos registrados que se encuentran en una categoría específica de la tabla equipo
  public function getAllEquipos($cat)
  {
    $sql = "SELECT * FROM equipo WHERE id_categoria=$cat"; //es una consulta simple donde seleccionará los registros de acuerdo a su categoría
    $res = $this->trans->execNonTrans($sql); //se utiliza el método execNonTrans ya que no alterará la base de datos

    return $res; //se retornarán todos los campos de todos los registros que pertenecen a la categoría dada
  }

//este método hará una insercción en la tabla aulas, es decir, se agregará un nuevo registro
  public function saveNewAula($data)
  {
    $fields = ["clave", "nombre", "tipoa", "capacidad","prof"]; //son los campos que se necesitan para realizar el INSERT en la base de datos
    //esta variable sirve para saber si ocurrió un error en el proceso o no
    $ban = 0; //0 es un punto neutral, es el estado inicial.

    //esta función retornará un true o false y recibe los campos que son necesarios para la insercción y los campos que fueron enviados a este método
    if ($this->checkFields($fields, $data))
    {
      //if(!$this->isAulaRegistered($data["clave"])){
      //se crea la insercción, primero es el nombre de la tabla con el nombre de los campos que se llenarán
      //y los valores que trae la variable $data la forma en la que está concatenado es muy importante, si algo no se puso correctamente
      //la insercción no se hará 

      $sql = "INSERT INTO aulas(id, nombre, tipo, capacidad,clv_prof) VALUES ('" . $data["clave"] . "','" . $data["nombre"] . "','" . $data["tipoa"] . "', '" . $data["capacidad"] . "','" . $data["prof"] . "')";
      $r = $this->trans->execTrans($sql); //este método se manda llamar cuando se harán cambios en la base de datos y ya que esta es
      // una insercción se agregará un nuevo registro a la tabla aulas
      echo "<script language='javascript'>";
      echo "</script>";
      //si el método execTrans no retorna un uno, quiere decir que no se realizó la insercción
      if ($r != 1)
      {
        $ban = -2; //y la variable $ban toma un valor de -2 que servirá más adelante
      }
      else {
        $ban = 1; //y en dado caso de que la insercción se realizó correctamente la variable toma valor de 1
        echo "<script language='javascript'>"; 
        echo "location.reload();"; 
        echo "</script>";
      }
    //}else{
      //$ban = -2;
//    }
    }
    else {
      $ban = -1; //si los campos que trae la variable $data no son los mismos que los que son necesarios para la insercción
      //la variable $ban toma el valor de -1
    }

    return $ban; //se retorna la variable $ban
  }

//método para realizar la insercción de un nuevo registro en la tabla categorias_equipo
  public function saveNewCategoria($data)
  {
    $fields = ["c_nombre", "c_descripcion"]; //campos que son necesarios para la insercción
    $ban = 0; //0 es un punto neutral, es el estado inicial.

    //se ejecuta la función para comprobar los campos
    if ($this->checkFields($fields, $data))
    {
      //se crea la insercción, nombre de la tabla, campos que se llenarán y valores que trae la variable $data
      $sql = "INSERT INTO categorias_equipo(id, nombre, descripcion) VALUES(NULL,'" . $data["c_nombre"] . "','" . $data["c_descripcion"] . "')";
      $r = $this->trans->execTrans($sql); //se ejecuta el método que se encarga de modificar la base de datos

      if ($r != 1) //si la insercción no se hizo correctamente la variable $ban toma el valor de -2
      {
        $ban = -2;
      }
      else {
        $ban = 1; //y si la insercción fue exitosa la variable $ban toma el valor de 1
      }
    }
    else {
      $ban = -1; //si los campos que trae $data no coinciden con los que son necesarios($fields) la variable $ban toma valor de -1
    }

    return $ban; //se retorna la variable $ban
  }

//método para agregar un nuevo registro en la tabla equipo
  public function saveNewEquipo($data)
  {
    $fields = ["e_nombre", "e_descripcion","e_categoria"]; //campos que son necesarios para la insercción
    $ban = 0; //0 es un punto neutral, es el estado inicial.

    //se ejecuta la función para comprobar si los campos que trae $data coinciden con los de $fields
    if ($this->checkFields($fields, $data))
    {
      //se crea la insercción, nombre de la tabla, campos y valores que trae la variable $data
      $sql = "INSERT INTO equipo(id, nombre, descripcion, id_categoria) VALUES(NULL,'" . $data["e_nombre"] . "','" . $data["e_descripcion"] . "','" . $data["e_categoria"] . "')";
      $r = $this->trans->execTrans($sql); //se ejecuta el método para para realizar cambios en la base de datos

      if ($r != 1)
      {
        $ban = -2; //si la insercción no se realizó la variable $ban toma el valor de -2
      }
      else {
        $ban = 1; //si la insercción fue exitosa la variable $ban toma el valor de 1
      }
    }
    else {
      $ban = -1; //si los campos de $data no coinciden con los de $fields la variable $ban toma el valor de -1
    }

    return $ban; //se retorna la variable $ban
  }

//método para modificar un registro en la tabla aulas, recibe el id del aula
  public function updateAula($data)
  {
    $ban = 0; //saber si hubo errores o no
      $fields = ["clave", "nombre", "tipoa", "capacidad"]; //campos que son necesarios para realizar el update

      //se ejecuta la función para comprobar si los campos de $data coinciden con los de $fields
      if ($this->checkFields($fields, $data))
      {
        //se crea el update, nombre de la tabla, nombre de los campos y valores que tomarán de la variable $data y id del aula
        $sql = "UPDATE aulas SET nombre ='" . $data["nombre"] . "', tipo='" . $data["tipoa"] . "', capacidad=" . $data["capacidad"] . " WHERE id = '" . $data["clave"] . "'";
        $count = $this->trans->execTrans($sql); //se ejecuta el método para realizar cambios en la base de datos

        if ($count != 1)
        {
          $ban = -2; //si el update falló la variable $ban toma el valor de -2
        }
        else {
          $ban = 1; //si el update fue exitoso la variable $ban toma el valor de 1
        }
      }
      else{
        $ban = -1; //si los campos de $data no coinciden con los de $fields la variable $ban toma el valor de -1
      }

    return $ban; //se retorna la variable $ban
  }

  //método para agregar un nuevo registro en la tabla equipo
  public function saveNewEquipoAula($data)
  {
    $fields = ["aula","equipo","cantidad"]; //campos que son necesarios para la insercción
    $ban = 0; //0 es un punto neutral, es el estado inicial.

    //se ejecuta la función para comprobar si los campos que trae $data coinciden con los de $fields
    if ($this->checkFields($fields, $data))
    {
      $aula = $data["aula"];
      $sql_d = "DELETE FROM aula_equipo WHERE id_aula = $aula";
      $res = $this->trans->execTrans($sql_d); 
      //se crea la insercción, nombre de la tabla, campos y valores que trae la variable $data
      $cont=0;
      foreach($data["equipo"] as $idEquipo){
        $cantidad = $data["cantidad"][$cont];
        $sql = "INSERT INTO aula_equipo(id_equipo, id_aula, cantidad) VALUES($idEquipo,$aula,$cantidad)";
        $r = $this->trans->execTrans($sql); //se ejecuta el método para para realizar cambios en la base de datos
        $cont++;
      }
      if ($r != 1)
      {
        $ban = -2; //si la insercción no se realizó la variable $ban toma el valor de -2
      }
      else {
        $ban = 1; //si la insercción fue exitosa la variable $ban toma el valor de 1
      }
    }else {
      $ban = -1; //si los campos de $data no coinciden con los de $fields la variable $ban toma el valor de -1
    }

    return $ban; //se retorna la variable $ban
  }

  public function getCantidad($idEquipo, $idAula)
  {
    $sql = "SELECT * FROM aula_equipo WHERE id_equipo = $idEquipo AND id_aula = $idAula"; //todos los atributos del registro serán retornados
    $res = $this->trans->execNonTrans($sql); //esta es una consulta simple que no altera ningún elemento en la base de datos

    return $res;
  }


//este método (función) sirve para comprobar si los campos que son enviados a los métodos coinciden con los esperados
  private function checkFields($fields, $data)
  {
    $ban = TRUE; //la variable se inicia en TRUE

    foreach($fields as $f) //verificamos que esten definidas los campos necesarios
    {
      if (!isset($data[$f]))
      {
        $ban = FALSE; //si un campo que se encuentra en $fields no se encuentra en $data la variable $ban se cambia a FALSE
        break;
      }
    }
    return $ban; //se retorna la variable $ban
  }

}
?>
