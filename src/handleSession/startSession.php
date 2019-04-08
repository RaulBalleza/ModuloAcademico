<?php
include_once ('../../init.php');

use Horarios\handleSession\registerSession;

if (isset($_POST["usuario"]) && isset($_POST["clave"]))
{
  if (!empty($_POST["usuario"]) && !empty($_POST["clave"]))
  {
    $r = new registerSession();

    if ($r->sessionStart($_POST["usuario"], $_POST["clave"]))
    {
      echo "SUCCESS";
    }
    else {
      echo "ERROR";
    }
  }
  else {
    echo "ERROR";
  }
}
else {
  echo "ERROR";
}

?>
