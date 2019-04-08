<?php
namespace Horarios\model\valorar;

use Horarios\Data\DataBase\SQLTrans;

class valorarDB
{
  private $trans;
  private $tipo;

  public function __construct($tipo)
  {
    $this->tipo = $tipo;

    $this->trans = new SQLTrans($tipo);
  }

  public function getValProfMat($plan, $mat)
  {
    $sql = "SELECT usuarios.nombre_usuario AS nombre, usuarios.clv_usuario AS clave, materia_usuario.puntos_confianza AS ptsProf, materia_usuario.puntos_director AS ptsDire, (materia_usuario.puntos_confianza + materia_usuario.puntos_director) AS total FROM usuarios, materia_usuario WHERE usuarios.clv_usuario = materia_usuario.clv_usuario AND materia_usuario.clv_materia = '" . $mat . "' AND materia_usuario.clv_plan = '" . $plan . "'";

    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  private function chkValueExists($clvMat, $clvPlan, $clvUsr)
  {
    $sql = "SELECT count(*) as count FROM materia_usuario WHERE clv_materia = '" . $clvMat . "' AND clv_plan = '" . $clvPlan . "' AND clv_usuario = '" . $clvUsr . "'";

    $r = $this->trans->execNonTrans($sql);

    return ($r[0]["count"] > 0) ? TRUE : FALSE;
  }

  public function saveConfidence($clvMat, $clvPlan, $clvUsr, $pts=NULL)
  {
    $ban = 0;
    if (!$this->chkValueExists($clvMat, $clvPlan, $clvUsr))
    {
      if (isset($pts["ptsDire"]))
      {
        if ($this->insertPtsDire($clvMat, $clvPlan, $clvUsr,$pts["ptsDire"]))
        {
          $ban = 1;
        }
        else {
          $ban = -3;
        }
      }

      if (isset($pts["ptsProf"]))
      {
        if ($this->insertPtsProf($clvMat, $clvPlan, $clvUsr,$pts["ptsProf"]))
        {
          $ban = 1;
        }
        else {
          $ban = -4;
        }
      }
    }
    else
    {
      if (isset($pts["ptsDire"]))
      {
        if ($this->updatePtsDir($clvMat, $clvPlan, $clvUsr,$pts["ptsDire"]))
        {
          $ban = 1;
        }
        else {
          $ban = -1;
        }
      }

      if (isset($pts["ptsProf"]))
      {
        if ($this->updatePtsProf($clvMat, $clvPlan, $clvUsr,$pts["ptsProf"]))
        {
          $ban = 1;
        }
        else {
          $ban = -2;
        }
      }
    }

    return $ban;
  }

  public function getValProf($clvMat, $clvPlan, $clvUsr)
  {
    $pts = 0;
    $sql = "SELECT puntos_confianza as puntos FROM materia_usuario WHERE clv_materia = '" . $clvMat . "' and clv_plan = '" . $clvPlan . "' and clv_usuario = '" . $clvUsr . "'";
    $r = $this->trans->execNonTrans($sql);

    if (count($r) > 0)
    {
      $pts = $r[0]["puntos"];
    }

    return $pts;
  }

  private function insertPtsProf($clvMat, $clvPlan, $clvUsr, $ptsProf)
  {
    $sql = "INSERT INTO materia_usuario(clv_materia,clv_plan,clv_usuario,puntos_confianza) VALUES ('" . $clvMat . "','" . $clvPlan . "','" . $clvUsr . "'," . $ptsProf . ")";

    $r = $this->trans->execTrans($sql);

    return ($r == 1) ? TRUE : FALSE;
  }

  private function insertPtsDire($clvMat, $clvPlan, $clvUsr, $ptsDire)
  {
    $sql = "INSERT INTO materia_usuario(clv_materia,clv_plan,clv_usuario,puntos_director) VALUES ('" . $clvMat . "','" . $clvPlan . "','" . $clvUsr . "'," . $ptsDire . ")";

    $r = $this->trans->execTrans($sql);

    return ($r == 1) ? TRUE : FALSE;
  }



  private function updatePtsDir($clvMat, $clvPlan, $clvUsr, $ptsDire)
  {
    $sql = "UPDATE materia_usuario SET puntos_director = " . $ptsDire . " WHERE clv_materia = '" . $clvMat . "' AND clv_plan = '" . $clvPlan . "' AND clv_usuario = '". $clvUsr . "'";

    $r = $this->trans->execTrans($sql);

    return ($r == 1) ? TRUE : FALSE;
  }

  private function updatePtsProf($clvMat, $clvPlan, $clvUsr, $ptsProf)
  {
    $sql = "UPDATE materia_usuario SET puntos_confianza = " . $ptsProf . " WHERE clv_materia = '" . $clvMat . "' AND clv_plan = '" . $clvPlan . "' AND clv_usuario = '". $clvUsr . "'";

    $r = $this->trans->execTrans($sql);

    return ($r == 1) ? TRUE : FALSE;
  }
}

?>
