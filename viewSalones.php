 <?php
 session_start();

 $isLogged = $_SESSION["islogged"] ?? FALSE;

 if (!$isLogged)
 {
 	header("Location: logout.php");
 	exit;
 }

 include_once ('init.php');

 use Horarios\model\manageAdmin;
 use Horarios\model\manageDire;
 use Horarios\model\manageProf;

 switch($_SESSION["tipo"]) {
 	case 'alu':
 	$panel = new manageDire($_SESSION["usuario"], "dire", $_SESSION["carrera"],$_SESSION["contrato"]);
 	break;
 	default:
 	die ("Ha ocurrido un problema.");
 	break;
 }

 use Horarios\model\aulas\aulaDB;
 include 'DB.php';
 $user=$_SESSION["usuario"];
 $sql="SELECT c.idAula, c.unidad1, c.unidad2, c.unidad3, c.promedio, a.nombre, a.id FROM aulas a, calificaciones c, usuarios u where u.clv_usuario='$user' AND c.idAula=a.id";
 $result = $conn->query($sql);
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
 	if ($_SESSION["contrato"]=="Alu") {
 		$panel->writeHTMLPanelBar2();
 		$panel->writeHTMLNavBar2();
 	}

 	?>
 	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 		<div class="col-md-12 colarr">
 			<div class="panel panel-default">
 				<div class="panel-heading main-color-bg">
 					<h3 class="panel-title">Calificaciones</h3>
 				</div>
 				<div class="panel-body">
 					<div class="row">
 						<br>
 						<div id="tableAulas">
 							<table class="table table-striped table-hover">
 								<tr>
 									<th>Clave</th>
 									<th>Nombre</th>
 									<th>Unidad1</th>
 									<th>Unidad2</th>
 									<th>Unidad3</th>
 									<th>Promedio</th>
 								</tr>
 								<tr>
 									<?php foreach($result as $au): ?>
 										<td><?php echo $au["id"]; ?></td>
 										<td><?php echo $au["nombre"]; ?></td>
 										<td><input disabled type="number" value="<?php echo $au["unidad1"]?>" class="form-control"></td>
 										<td><input disabled type="text" value="<?php echo $au["unidad1"]?>" class="form-control"></td>
 										<td><input disabled type="text" value="<?php echo $au["unidad1"]?>" class="form-control"></td>
 										<td><input disabled type="text" value="<?php echo $au["promedio"]?>" class="form-control"></td>
 									</tr>
 								<?php endforeach; ?>
 							</table>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    </body>
    </html>
