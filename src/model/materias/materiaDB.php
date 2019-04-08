<?php
namespace Horarios\model\materias;

use Horarios\Data\DataBase\SQLTrans;

class materiaDB
{
  private $trans;

  public function __construct($tipo)
  {
    $this->trans = new SQLTrans($tipo);
  }

  public function getArrayMats($plan)
  {
    $sql = "SELECT clv_materia as clave, nombre_materia as nombre, creditos, cuatrimestre, posicion FROM materias WHERE clv_plan = '" . $plan . "' ORDER BY cuatrimestre, posicion";

    $r = $this->trans->execNonTrans($sql);
    $mats = array();


    foreach ($r as $materia)
    {

      $mats[$materia["cuatrimestre"]][$materia["posicion"]] = [$materia["clave"], $materia["nombre"], $materia["creditos"]];
    }

    return $mats;
  }

  public function getMateriaData($materia, $plan, $flag=NULL)
  {
    $sql = "";

    if ($flag == "PLAN_NAME")
    {
      $sql = "select materias.clv_materia as clave, materias.nombre_materia as nombre, materias.creditos as creditos, materias.cuatrimestre as cuatrimestre, materias.posicion as posicion, plan_estudios.nombre_plan as nom_plan, materias.tipo_materia as tipoMat FROM materias where plan_estudios.clv_plan = materias.clv_plan and materias.clv_materia = '$materia' and materias.clv_plan='$plan'";
    }
    else {
      $sql = "SELECT clv_materia as clave, nombre_materia as nombre, creditos as creditos, cuatrimestre as cuatrimestre, posicion as posicion, clv_plan as clv_plan, tipo_materia as tipoMat FROM materias WHERE clv_materia = '" . $materia . "' and clv_plan = '" . $plan . "'";
    }

    $res = $this->trans->execNonTrans($sql);

    return $res;
  }

  public function getAllMat()
  {
    $sql = "SELECT * FROM materias";

    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

/*
  public function getAllMatByCarr($carr)
  {
    $sql = "SELECT materias.clv_materia,   FROM materias WHERE idc";

    $r = $this->trans->execNonTrans($sql);

    return $r;
  }
  */

  public function getMateria($numMat)
  {
    $sql = "SELECT * FROM materias WHERE clv_materia =" . $numMat;
    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  private function countMatByName($name)
  {
    $sql = "SELECT COUNT(*) as count from materias where nombre_materia = '" . $name . "'";

    $r = $this->trans->execNonTrans($sql);
    return $r[0]["count"];
  }

  private function chkMatCuatriPos($clvPlan, $cuatri, $pos)
  {
    $sql = "SELECT count(*) as count FROM materias WHERE clv_plan = '" . $clvPlan . "' AND cuatrimestre = " . $cuatri . " AND posicion = " .$pos;
    $r = $this->trans->execNonTrans($sql);

    return ($r[0]["count"] < 1) ? TRUE : FALSE;
  }

  public function saveNewMat($data)
  {
    //var_dump($data);
    $fields = ["clave", "nombre", "creditos", "horas", "cuatrimestre", "posicion", "clv_plan", "tipoMat"];
    $ban = 0; //0 es un punto neutral, es el estado inicial.

    if ($this->chkMatCuatriPos($data["clv_plan"], $data["cuatrimestre"],$data["posicion"]))
    {
      if ($this->checkFields($fields, $data))
      {
        $sql = "INSERT INTO materias(clv_materia, nombre_materia, creditos, horas, cuatrimestre, posicion, clv_plan, tipo_materia) VALUES ('" . $data["clave"] . "','" . $data["nombre"] . "','" . $data["creditos"] . "','". $data["horas"]. "'," . $data["cuatrimestre"] . ",'" . $data["posicion"] . "','" . $data["clv_plan"] . "','" . $data["tipoMat"] . "')";
        //echo $sql;
        $count = $this->trans->execTrans($sql);

        if ($count > 0)
        {
          $ban = 1;
        }
        else {
          $ban = -3;
        }
      }
      else {
        $ban = -1; // -1 significa que no se enviaron los campos necesarios y/o campos correctos, debe de verificarlos.
      }
    }
    else {
      $ban = -2;
    }


    return $ban;
  }

  public function updateMat($data)
  {
    $ban = 0;
    $fields = ["clave", "nombre", "creditos", "cuatrimestre", "posicion", "clv_plan", "tipoMat"];

    if ($this->chkMatCuatriPos($data["clv_plan"], $data["cuatrimestre"],$data["posicion"]))
    {
      if ($this->checkFields($fields, $data))
      {
        //$sql = "UPDATE materias SET nombre_materia = '" . $data["nombre"] . "', creditos=" . $data["creditos"] . ", cuatrimestre=" . $data["cuatrimestre"] . ", posicion = " . $data["posicion"] . ", tipo_materia = '" . $data["tipoMat"] . "' WHERE clv_materia = '" . $data["clave"] . "' AND clv_plan = '" . $data["clv_plan"] . "'";
        $sql = "UPDATE materias SET nombre_materia = '" . $data["nombre"] . "', creditos=" . $data["creditos"] . ", cuatrimestre=" . $data["cuatrimestre"] . ", posicion = " . $data["posicion"] . ", clv_plan = '" . $data["clv_plan"] . "', tipo_materia = '" . $data["tipoMat"] . "' WHERE clv_materia = '" . $data["clave"] . "'";
        //echo $sql;
        $count = $this->trans->execTrans($sql);

        if ($count > 0)
        {
          $ban = 1;
        }
        else {
          $ban = -3;
        }
      }
      else $ban = -1;
    }
    else $ban = -2;

    return $ban;
  }

  private function checkFields($fields, $data)
  {
    $ban = TRUE;

    foreach($fields as $f) //verificamos que esten definidas los campos necesarios
    {
      if (!isset($data[$f]))
      {
        $ban = FALSE;
        break;
      }
    }

    return $ban;
  }

}
?>
