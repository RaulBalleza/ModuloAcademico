<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>

	<?php
	include 'DB2.php';
	$cont=0;
	foreach ($_POST["alumnos"] as $data) {
		$asis=$_POST["asistencia"][$cont];
		$nombre=$_POST["alumnos"][$cont];
		$sql="INSERT INTO alumnosais(idAulumnos, asistencia) VALUES('$data','$asis') ON DUPLICATE KEY UPDATE asistencia = '$asis';";
		if($mysqli->query($sql)){
		//echo "string";
			echo '<script>alert("ASISTENCIA GUARDADA");
			window.location="profAulas.php";
			</script>';
		}else{
			echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$cont++;
	}

	?>

</body>	
</html>