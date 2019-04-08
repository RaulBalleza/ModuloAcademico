<?php
include_once "DB.php";
$aula =$_POST['btnAddEquipoAula'];

foreach ($_POST["equipo"] as $idEquipo){
	//if($clave!="btnAddeEquipoAula" && $valor!=$aula){
		//if($valor!=""){
			$cant = 'cant'.$idEquipo;
			//if($cant!=$clave && $clave!=$valor){
				$Cantidad=$_POST[$cant];
				if($Cantidad!=""){
					$sql = "INSERT INTO aula_equipo (id_aula,id_equipo,cantidad) VALUES ('$aula','$idEquipo','$Cantidad')";
					
				}
			//}
		//}
	//}
}
	mysqli_close($conn);

?>