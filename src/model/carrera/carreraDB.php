<?php
namespace Horarios\model\carrera;

use Horarios\Data\DataBase\SQLTrans;

class carreraDB
{
  private $trans;

  public function __construct($tipo)
  {
    $this->trans = new SQLTrans($tipo);
  }

  public function getCarreraUser($usuario)
  {
    $sql = "SELECT carrera.nombre_carrera as nomCarr FROM carrera, usuarios WHERE usuarios.idcarrera = carrera.idcarrera AND usuarios.clv_usuario = '" . $usuario . "'";
    $res = $this->trans->execNonTrans($sql);

    return $res[0]["nomCarr"];
  }

  public function getAllCarr()
  {
    $sql = "SELECT * FROM carrera";

    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  public function getCarrera($numCar)
  {
    $sql = "SELECT * FROM carrera WHERE idcarrera =" . $numCar;
    $r = $this->trans->execNonTrans($sql);

    return $r;
  }

  private function countCarrByName($name)
  {
    $sql = "SELECT COUNT(*) as count from carrera where nombre_carrera = '" . $name . "'";

    $r = $this->trans->execNonTrans($sql);
    return $r[0]["count"];
  }

  public function saveNewCarr($nomNewCarr)
  {
    $ban = 0;

    if($this->countCarrByName($nomNewCarr) < 1)
    {
      $sql = "INSERT INTO carrera(idcarrera,nombre_carrera) VALUES (NULL,'" . $nomNewCarr . "')";
      $r = $this->trans->execTrans($sql);

      if ($r != 1)
      {
        $ban = -2;
      }
      else {
        $ban = 1;
      }
    }
    else {
      $ban = -1;
    }
    return $ban;
  }

  public function updateCarr($nombre, $id)
  {
    $ban = 0;

    $sql = "UPDATE carrera SET nombre_carrera = '" . $nombre . "' where idcarrera = " . $id;
    $r = $this->trans->execTrans($sql);

    if ($r == 1)
    {
      $ban = 1;
    }
    else {
      $ba = -1;
    }

    return $ban;
  }
}
?>
