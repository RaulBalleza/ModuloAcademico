<?php
namespace Horarios\model;

use Horarios\Data\DataBase\SQLTrans;

abstract class managePanel {

  protected $user;
  protected $tipo;
  protected $carrera;
  protected $contrato;

  protected $trans;

  public function __construct(String $user, String $tipo, String $carrera, String $contrato)
  {
    $this->user = $user;
    $this->tipo = $tipo;
    $this->carrera = $carrera;
    $this->contrato = $contrato;

    $this->trans = new SQLTrans($tipo);
  }

  public function strNameAdsc()
  {
    $sql = "SELECT nombre_usuario as nombre, nivel_ads as nivel FROM usuarios WHERE clv_usuario = '". $this->user ."'";
    $res = $this->trans->execNonTrans($sql);

    return $res[0]["nivel"] . " " . $res[0]["nombre"];
  }

  public function writeHTMLPanelBar()
  {
    ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="../index.html"><img src="img/logoP.png" style="width: 53.2px; height: 45.15px"></a>
          <a class="navbar-brand">Panel de administración</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a>Bienvenido, <?php echo $this->strNameAdsc(); ?></a></li>
            <!-- <input type="hidden" name="tipo" val="<?php echo $this->tipo; ?>"> -->
            <li><a href="logout.php">Cerrar sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
  }
  public function writeHTMLPanelBar2()
  {
    ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="../index.html"><img src="img/logoP.png" style="width: 53.2px; height: 45.15px"></a>
          <a class="navbar-brand">Panel de administración</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class=""><a>Bienvenido, <?php echo $this->strNameAdsc(); ?></a></li>
            <!-- <input type="hidden" name="tipo" val="<?php echo $this->tipo; ?>"> -->
            <li><a href="logout.php">Cerrar sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
  }

  abstract public function writeHTMLNavBar();
  abstract public function writeHTMLBoard();

}

?>
