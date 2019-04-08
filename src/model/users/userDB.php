<?php
namespace Horarios\model\users;

use Horarios\Data\DataBase\SQLTrans;

class userDB
{
  private $trans;
  private $tipo;
  private $carrera;

  public function __construct($tipo, $carrera=0)
  {
    $this->tipo = $tipo;
    $this->carrera = $carrera;

    $this->trans = new SQLTrans($tipo);
  }

  public function isUserRegistered(String $user, String $pass=NULL)
  {
    $sql = "";

    if (is_null($pass))
    {
      $sql = "SELECT count(*) as count FROM usuarios WHERE clv_usuario = '$user'";
    }
    else {
      $sql = "SELECT count(*) as count FROM usuarios WHERE clv_usuario = '$user' AND pass_usuario = password('$pass')";
    }

    $r = $this->trans->execNonTrans($sql);

    return ($r[0]["count"] < 1) ? FALSE : TRUE;
  }

  public function getUserData($user, $flag=NULL)
  {
    $sql = "";

    if ($flag == "CARR_NAME")
    {
      $sql = "select usuarios.clv_usuario as clave, usuarios.tipo_usuario as tipo, carrera.nombre_carrera as carrera, usuarios.contrato as contrato, usuarios.nombre_usuario as nombre, usuarios.nivel_ads as nivel FROM usuarios, carrera where carrera.idcarrera = usuarios.idcarrera and usuarios.clv_usuario = '$user'";
    }
    else {
      $sql = "SELECT clv_usuario as clave, tipo_usuario as tipo, idcarrera as carrera, contrato, nombre_usuario as nombre, nivel_ads as nivel FROM usuarios WHERE clv_usuario = '" . $user . "'";
    }

    $res = $this->trans->execNonTrans($sql);

    return $res;
  }

  public function getAllUsers($carName=NULL)
  {
    if ($carName == "CARR_NAME")
    {
      if ($this->tipo == "admi") //esta parte se puede mejorar, esta mal parchada
      {
        $sql = "SELECT usuarios.clv_usuario as clave, usuarios.tipo_usuario as tipo, carrera.nombre_carrera as carrera, usuarios.contrato as contrato, usuarios.nivel_ads as nivel, usuarios.nombre_usuario as nombre FROM usuarios, carrera WHERE carrera.idcarrera = usuarios.idcarrera AND usuarios.tipo_usuario <> 'ADMI' AND usuarios.tipo_usuario <> 'ALU'";
      }
      else {
        $sql = "SELECT usuarios.clv_usuario as clave, usuarios.tipo_usuario as tipo, carrera.nombre_carrera as carrera, usuarios.contrato as contrato, usuarios.nivel_ads as nivel, usuarios.nombre_usuario as nombre FROM usuarios, carrera WHERE carrera.idcarrera = usuarios.idcarrera AND usuarios.tipo_usuario <> 'ADMI' AND usuarios.tipo_usuario <> 'DIRE' AND carrera.idcarrera = " . $this->carrera;
      }
    }
    else {
      if ($this->tipo == "admi")
      {
        $sql = "SELECT clv_usuario as clave, tipo_usuario as tipo, idcarrera as carrera, nivel_ads as nivelads, contrato, nombre_usuario as nombre FROM usuarios WHERE tipo_usuario <> 'ALU'";
      }
      else {
        $sql = "SELECT clv_usuario as clave, tipo_usuario as tipo, idcarrera as carrera, nivel_ads as nivelads, contrato, nombre_usuario as nombre FROM usuarios WHERE tipo_usuario <> 'DIRE'  AND usuarios.tipo_usuario <> 'ALU' AND tipo_usuario <> 'ADMI' AND idcarrera = " . $this->carrera;
      }
    }

    $res = $this->trans->execNonTrans($sql);

    return $res;

  }

  public function saveNewUser($data)
  {

    $fields = ["clave", "nombre", "tipou", "carrera", "nivelads", "contrato"];
    $ban = 0; //0 es un punto neutral, es el estado inicial.


    if ($this->checkFields($fields, $data))
    {
      if (!$this->isUserRegistered($data["clave"]))
      {
        $clv = explode('@',$data["clave"]);
        $pass = $clv[0];
        $ok = TRUE;

        if(!$this->puedePTC($data["contrato"], $data["nivelads"])) $ok = TRUE;

        if($data["tipou"] == "DIRE")
        {
          if(!$this->puedeDire($data["tipou"], $data["contrato"], $data["nivelads"], $data["carrera"])) $ok = TRUE;
        }

        if($ok)
        {
          $sql = "INSERT INTO usuarios(clv_usuario, pass_usuario,tipo_usuario, idcarrera, nombre_usuario,nivel_ads,contrato) VALUES ('" . $data["clave"] . "',password('" . $pass . "'), '" . $data["tipou"] . "'," . $data["carrera"] . ", '" . $data["nombre"] . "','" . $data["nivelads"] . "','" . $data["contrato"] . "')";
          $count = $this->trans->execTrans($sql);

          if ($count > 0)
          {
            $ban = 1;
          }
          else {
            $ban = -3;
          }
        }
      }
      else {
        $ban = -2;
      }
    }
    else {
      $ban = -1; // -1 significa que no se enviaron los campos necesarios y/o campos correctos, debe de verificarlos.
    }
    /*
    if (!$this->isUserRegistered($user))
    {
      echo "si se puede registrar";
    }
*/
    return $ban;
  }

  public function updateUser($data)
  {
    $ban = 0;
    if ($this->isUserRegistered($data["clave"]))
    {
      $fields = ["clave", "nombre", "tipou", "carrera", "nivelads", "contrato"];
      if ($this->checkFields($fields, $data))
      {
        $sql = "UPDATE usuarios SET nombre_usuario ='" . $data["nombre"] . "', tipo_usuario='" . $data["tipou"] . "', idcarrera=" . $data["carrera"] . ", nivel_ads = '" . $data["nivelads"] . "', contrato = '" . $data["contrato"] . "' WHERE clv_usuario = '" . $data["clave"] . "'";
        //echo $sql;
        $count = $this->trans->execTrans($sql);

        if ($count != 1)
        {
          $ban = -2;
        }
        else {
          $ban = 1;
        }
      }
      else $ban = -1;
    }
    else $ban = -1;

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

  private function puedePTC($contrato, $nivelAds)
  {
    if(!(($contrato=="PTC") && ($nivelAds=="Lic." || $nivelAds=="Ing.")))
    {
      return TRUE;
    }
    return FALSE;
  }

  private function puedeDire($tipo, $contrato, $nivelAds, $carrera)
  {
    if($tipo=="DIRE" && ($nivelAds!="Ing." && $nivelAds!="Lic"))
    {
      if(($tipo=="DIRE" && $contrato=="PA") && !$this->hayDire($carrera))
      {
        return TRUE;
      }
    }
    return FALSE;
  }

  private function hayDire($carrera)
  {
    $sql = "SELECT * FROM usuarios WHERE idcarrera='".$carrera."' AND tipo_usuario='DIRE'";
    $res = $this->trans->execNonTrans($sql);

    return $res;
  }

}
?>
