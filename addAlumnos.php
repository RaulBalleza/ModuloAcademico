<?php
include 'DB2.php';
$cont=0;
foreach ($_POST["check"] as $data) {
	$alu=$_POST["check"][$cont];
	$aula=$_POST["aula"];
	$sql="INSERT INTO alumnosaulas  VALUES('$aula','$alu')";
	$sql2="INSERT INTO calificaciones VALUES('$alu','$aula',60,60,60,60)";
	if($mysqli->query($sql)&&$mysqli->query($sql2)){
		//echo "string";
			echo '<script>alert("ALUMNOS AGREGADOS");
			window.location="profAulas.php";
			</script>';
		}else{
			echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
		}
}
?>