<?php
namespace Horarios\Config;

class Config
{
  private static $instance;
  private $data;

  private function __construct(String $tipo="default") {

    $json = file_get_contents(__DIR__ . '/app.json');
    $dataTmp = json_decode($json, true);

    $this->data = ["DataBase" => $dataTmp["DataBase"]["Schema"], "Host" => $dataTmp["DataBase"]["Host"], "User" => $dataTmp["DataBase"]["TypeUser"][$tipo]["User"], "Pass" => $dataTmp["DataBase"]["TypeUser"][$tipo]["Pass"]];

    unset($dataTmp);
  }

  public static function getInstance(String $tipo="default")
  {
    if (self::$instance == null)
    {
      self::$instance = new Config($tipo);
    }

    return self::$instance;
  }

  public function get($key)
  {
    return $this->data[$key];
  }


}
?>
