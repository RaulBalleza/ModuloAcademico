<?php
namespace Horarios\Data\DataBase;

use Horarios\Data\DataBase\DataBaseConn;

class SQLTrans extends DataBaseConn {

  public function __construct(String $tipoUser = "defalut")
  {
    parent::__construct($tipoUser);
  }

  public function execNonTrans(String $s)
  {
    $data = $this->DBConn->query($s);

    $res = array();
    foreach($data as $row)
    {
      $res[] = $row;
    }

    return $res;
  }

  public function execTrans(String $s)
  {
    return $this->DBConn->exec($s);
  }
}



 ?>
