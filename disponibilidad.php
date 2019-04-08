<?php
session_start();
include_once ('init.php');

$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged)
{
  header("Location: logout.php");
  exit;
}

use Horarios\model\manageAdmin;
use Horarios\model\manageProf;
use Horarios\model\manageDire;
use Horarios\model\managePanel;

switch($_SESSION["tipo"]) {
  case 'prof':
    $panel = new manageProf($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
  case 'admi':
    $panel = new manageAdmin($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
  case 'dire':
    $panel = new manageDire($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
    case 'alu':
    $panel = new manageDire($_SESSION["usuario"], "dire", $_SESSION["carrera"],$_SESSION["contrato"]);
    break;
  default:
    die ("Ha ocurrido un problema.");
    break;
}

use Horarios\model\users\userDB;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Panel de Administración</title>

    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="style/dashboard.css" rel="stylesheet">

    <style type="text/css">
		.botonHora{
			position: absolute;
    		width: 100px;
		    height: 30px;
		    margin-top: -5px;
    		display: inline-block;
    		background-color: rgba(0,0,0,0.0);
    		border: none;
    		outline: none;
		}

		.hora{
			text-align: right;
		}

		th {
			text-align: center;
			background-color: #ddd;
		}

		.receso{
			background-color: #ddd;
			color: #ddd;
		}
    </style>
  </head>

  <body>

    <?php
    if ($_SESSION["contrato"]=="Alu") {
    $panel->writeHTMLPanelBar2();
    $panel->writeHTMLNavBar2();
  }else{
    $panel->writeHTMLPanelBar();
    $panel->writeHTMLNavBar();
  }
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-top: 50px">

      <?php
      if ($_SESSION["tipo"] == "dire" || $_SESSION["tipo"] == "alu"):
        $udb = new userDB("dire",$_SESSION["carrera"]);
        ?>
    	<div class="row" style="margin: auto; width: 50%; padding-bottom: 50px">
    		<div class="col-md-9" name="info" data-info="1">
    			Profesor:
          <select id="lstProf" name="lstProf" class="form-control">
              <?php
                $r = $udb->getAllUsers();
                
                foreach ($r as $profesor): ?>
                <option value="<?php echo $profesor["clave"]; ?>"><?php echo $profesor["nombre"]; ?></option>
                <?php
              endforeach;
              ?>
              <option value="<?php echo $_SESSION["usuario"]; ?>"><?php echo $panel->strNameAdsc(); ?></option>
          </select>
    		</div>
    	</div>
    <?php else: ?>
      <div class="row" style="margin: auto; width: 50%; padding-bottom: 50px">
    		<div class="col-md-9" name="info" data-info="2">
    			<input type="hidden" name="lstProf" value="<?php echo $_SESSION["usuario"]; ?>">
    		</div>
    	</div>
    <?php endif; ?>

		<div class="col-md-9" name="tableDispo" id="tableDispo">
      
	   </div>
	</div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/disponibilidadActions.js"></script>
  </body>
</html>
