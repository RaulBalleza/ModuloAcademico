<?php
namespace Horarios\Data\DataBase;

//require_once("../../init.php");

use Horarios\Config\Config;

class DataBaseConn {
  private $ConfigInstance;
  protected $DBConn;

  public function __construct(String $tipoUser = "default")
  {
    $this->ConfigInstance = Config::getInstance($tipoUser);
    $this->connectToDB();
  }

  private function connectToDB()
  {
    $dns = "mysql:dbname=horarios;host=" . $this->ConfigInstance->get("Host");
    try {
      $this->DBConn = new \PDO($dns, $this->ConfigInstance->get("User"), $this->ConfigInstance->get("Pass"), array(\PDO::MYSQL_ATTR_FOUND_ROWS => true,\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
      $this->DBConn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    } catch (PDOExcpetion $e) {
      echo "Falló la conección " . $e->getMessage();
    }

  }

}
?>
