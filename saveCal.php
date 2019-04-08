<?php
	include 'DB2.php';
	$cont=0;
	foreach ($_POST["alumnos"] as $data) {
		$alu=$_POST["alumnos"][$cont];
		$u1=$_POST["unidad1"][$cont];
		$u2=$_POST["unidad2"][$cont];
		$u3=$_POST["unidad3"][$cont];
		$aula=$_POST["aula"];
		$prom=($u1+$u2+$u3)/3;
		$sql="UPDATE calificaciones SET unidad1='$u3', unidad2='$u2',unidad3='$u3',promedio='$prom' WHERE idAlumno = '$alu' AND idAula='$aula'";
		if($mysqli->query($sql)){
		//echo "string";
			echo '<script>alert("CALIFICACIONES ACTUALIZADAS");
			window.location="profAulas.php";
			</script>';
		}else{
			echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$cont++;
	}
?>