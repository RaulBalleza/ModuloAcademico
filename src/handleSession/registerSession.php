<?php
namespace Horarios\handleSession;
use Horarios\model\users\userDB;


class registerSession {

  private $dbu;

  public function __construct()
  {
    $this->dbu = new userDB("default");
  }

  public function sessionStart(String $user, String $pass)
  {
    $ban = FALSE;

    if ($this->dbu->isUserRegistered($user, $pass))
    {
      session_start();

      $data = $this->dbu->getUserData($user);

      $_SESSION["usuario"] = $data[0]["clave"];
      $_SESSION["tipo"] = strtolower($data[0]["tipo"]);
      $_SESSION["carrera"] = $data[0]["carrera"];
      $_SESSION["contrato"] = $data[0]["contrato"];
      $_SESSION["islogged"] = TRUE;

      $ban = TRUE;
    }

    return $ban;
  }
}
?>
