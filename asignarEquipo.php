<?php
session_start();

$aula =$_POST['id'];
$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged || ($_SESSION["tipo"] == "prof"))
{
	header("Location: logout.php");
	exit;
}

include_once ('init.php');

use Horarios\model\manageAdmin;
use Horarios\model\manageDire;

use Horarios\model\aulas\aulaDB;

switch($_SESSION["tipo"]) {
	case 'admi':
	$panel = new manageAdmin($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
	break;
	case 'dire':
	$panel = new manageDire($_SESSION["usuario"], $_SESSION["tipo"], $_SESSION["carrera"],$_SESSION["contrato"]);
	break;
	default:
	die ("Ha ocurrido un problema.");
	break;
}
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
</head>
<body>
	<?php
	$panel->writeHTMLPanelBar();
	$panel->writeHTMLNavBar();
	?>
	<div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-md-12 colarr">
			<h1>Asignar equipo</h1>
			<form method="POST" action="" name="frmAsignarEquipo">
				<button type="submit" class="btn btn-primary pull-right" style="margin-top: -50px;" id="btnAddEquipoAula">Guardar</button>
				<input type="text" name="aula" value="<?php echo $aula ?>">
				<hr>
				<br>
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<?php
					$cat = new aulaDB($_SESSION["tipo"]);
					$r = $cat->getAllCategorias();
					foreach($r as $cats):
						?>
						<div class="panel-heading main-color-bg"><?php echo $cats["nombre"] ?></div>
						<table class="table table-striped table-hover">
							<!-- Table -->
							<tr>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>Disponible</th>
							</tr>
							<?php
							$eq = new aulaDB($_SESSION["tipo"]);
							$rE = $eq->getAllEquipos($cats["id"]);
							foreach($rE as $eqs):
								?>
								<tr>
									<td><?php echo $eqs["nombre"] ?></td>
									<td><?php echo $eqs["descripcion"] ?></td>
									<?php echo '<td><input class="form-control input" type="" name="cantidad[]"></td>';?>
									<?php echo '<td><input class="pull-right" type="checkbox" name="equipo[]" value="'.$eqs['id'].'"></td>';
									?>
								</tr>
							<?php endforeach; ?>
						</div>
					</table>
				<?php endforeach; ?>
			</form>
		</div>
	</div>
	
	 <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/adminAulasActions.js"></script>

    <!-- <script src="style/alertify/alertify.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
