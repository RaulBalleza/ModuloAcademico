<?php
namespace Horarios\model\disponibilidad;

use Horarios\Data\DataBase\SQLTrans;

class disponibilidadDB
{
  private $trans;

  public function __construct($tipo)
  {
    $this->trans = new SQLTrans($tipo);
  }

  private function isAvailable($dia, $timeSlot,$clvProf) //TODO cambiar a privada
  {
    $sql = "SELECT COUNT(*) as count FROM disponibilidad WHERE clv_usuario = '" . $clvProf . "' AND dia = " . $dia . " AND espacio_tiempo = " . $timeSlot;

    $r = $this->trans->execNonTrans($sql);

    return ($r[0]["count"] == 0) ? TRUE : FALSE;
  }

  public function divideTimeSlot($ts) //TODO cambiar a privada
  {
    $div = explode("_", $ts);

    return $div;
  }

  private function getNumDay($strD)
  {
    $num = 0;
    switch ($strD)
    {
      case "Lu":
        $num = 1;
        break;
      case "Ma":
        $num = 2;
        break;
      case "Mi":
        $num = 3;
        break;
      case "Ju":
        $num = 4;
        break;
      case "Vi":
        $num = 5;
        break;
      case "Sa":
        $num = 6;
        break;
      default:
        $num = 0;
        break;
    }

    return $num;
  }

  private function checkHour($h)
  {
    return ($h >= 1 && $h <= 14) ? TRUE : FALSE;    // Sugerencia: los intervalos deberían de ser configurables
  }

  private function checkDay($d)
  {
    $ban = true;
    $dias = ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa"];

    return in_array($d, $dias);
  }

  public function checkTimeSlot($ts)
  {
    $div = $this->divideTimeSlot($ts);
    $ban = FALSE;

    if (count($div) == 2)
    {
      if ($this->checkHour($div[0]) && $this->checkDay($div[1]))
      {
        $ban = TRUE;
      }
    }

    return $ban;
  }

  public function saveTimeSlot($user, $ts)
  {
    $ban = 0;
    if ($this->checkTimeSlot($ts))
    {
      $div = $this->divideTimeSlot($ts);

      if ($this->isAvailable($this->getNumDay($div[1]), $div[0], $user))
      {
        $sql = "INSERT INTO disponibilidad(dia, espacio_tiempo, clv_usuario) VALUES (" . $this->getNumDay($div[1]) . ", " . $div[0] . ", '" . $user . "')";

        $ban = $this->trans->execTrans($sql);
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

  public function deleteTimeSlot($user, $ts)
  {
    $ban = 0;
    if ($this->checkTimeSlot($ts))
    {
      $div = $this->divideTimeSlot($ts);

      if (!$this->isAvailable($this->getNumDay($div[1]), $div[0], $user))
      {
        $sql = "DELETE FROM disponibilidad WHERE dia = " . $this->getNumDay($div[1]) . " and espacio_tiempo= " . $div[0] . " and clv_usuario = '" . $user . "'";
        $ban = $this->trans->execTrans($sql);
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

  private function getUserDisponibilidad($user)
  {
    $sql = "SELECT dia, espacio_tiempo as timeSlot FROM disponibilidad WHERE clv_usuario = '" . $user . "'";

    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  public function getUserDisponibilidadFormat($user)
  {
    $r = $this->getUserDisponibilidad($user);
    $dias = ["Lu","Ma","Mi","Ju","Vi","Sa"];

    $data = array();


    foreach ($r as $row)
    {
      $data[] = $row["timeSlot"] . "_" . $dias[$row["dia"]-1];
    }

    return $data;
  }
}
?>
