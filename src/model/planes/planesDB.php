<?php

namespace Horarios\model\planes;

use Horarios\Data\DataBase\SQLTrans;

class planesDB {

  private $trans;
  //private $tipo;
  //private $carrera;

  public function __construct($tipo)
  {
    $this->tipo = $tipo;
    $this->trans = new SQLTrans($tipo);
  }

  public function getStrPlan($clvPlan)
  {
    $sql = "SELECT plan_estudios.nombre_plan as nombre FROM plan_estudios WHERE clv_plan ='" . $clvPlan . "'";
    $r = $this->trans->execNonTrans($sql);

    return $r[0]["nombre"];
  }

  public function getNivelPlan($clvPlan)
  {
    $sql = "SELECT plan_estudios.nivel as nivel FROM plan_estudios WHERE clv_plan = '" . $clvPlan . "'";
    $r = $this->trans->execNonTrans($sql);

    return $r[0]["nivel"];
  }

  public function getAllPlanes($carrera=NULL)
  {
    if ($carrera == "CARR_NAME")
    {
      $sql = "SELECT plan_estudios.clv_plan as clave, plan_estudios.nombre_plan as nombre, carrera.nombre_carrera as nombre_carrera, carrera.idcarrera as idcarrera, plan_estudios.nivel as nivel FROM plan_estudios, carrera WHERE plan_estudios.idcarrera = carrera.idcarrera";
    }
    else {
      $sql = "SELECT clv_plan as clave, nombre_plan as nombre, nivel FROM plan_estudios";
    }

    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  public function getPlanesCarrera($idcarrera)
  {
    $sql = "SELECT clv_plan as clave, nombre_plan as nombre, nivel FROM plan_estudios WHERE idcarrera =" . $idcarrera;
    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  public function addNewPlan($clvPlan, $nomPlan, $nivel, $idcarrera)
  {
    $ban = 0;

    if (!$this->isPlanRegistered($clvPlan))
    {
      $sql = "INSERT INTO plan_estudios(clv_plan, nombre_plan, nivel, idcarrera) VALUES ('" . $clvPlan . "', '" . $nomPlan . "','" . $nivel . "'," . $idcarrera . ")";
      $count = $this->trans->execTrans($sql);

      if ($count > 0)
      {
        $ban = 1;
      }
      else {
        $ban = -2;
      }
    }
    else {
      $ban = -1;
    }


    return $ban;
  }

  public function isPlanRegistered($clvPlan)
  {
    $sql = "SELECT COUNT(*) as count FROM plan_estudios WHERE clv_plan = '" . $clvPlan . "'";

    $r = $this->trans->execNonTrans($sql);

    return ($r[0]["count"] == 1) ? TRUE : FALSE;
  }

  public function updatePlan($clvPlan, $newName)
  {
    $ban = 0;

    if ($this->isPlanRegistered($clvPlan))
    {
      $sql = "UPDATE plan_estudios SET nombre_plan = '" . $newName . "' WHERE clv_plan = '" . $clvPlan . "'";
      $count = $this->trans->execTrans($sql);

      if ($count > 0)
      {
        $ban = 1;
      }
      else {
        $ban = -2;
      }
    }
    else {
      $ban = -1;
    }

    return $ban;
  }
}

?>
