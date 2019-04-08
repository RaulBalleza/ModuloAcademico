function agregaform(datos){
	d = datos.split('||');
	$('#idGrupo').val(d[0]);
	$('#id_m1U').val(d[1]);
	$('#id_m2U').val(d[2]);
	$('#id_m3U').val(d[3]);
}

function agregaformMateria(datos){
	d = datos.split('||');
	$('#idMateria').val(d[0]);
	$('#nomU').val(d[1]);
	$('#desU').val(d[2]);
	$('#grupoU').val(d[3]);
}

function agregaformMaestro(datos){
	d = datos.split('||');
	$('#idMaestro').val(d[0]);
	$('#apePU').val(d[1]);
	$('#apeMU').val(d[2]);
	$('#nomU').val(d[3]);
	$('#fechaU').val(d[4]);
	$('#curpU').val(d[5]);
	$('#estadoU').val(d[6]);
	$('#emailU').val(d[7]);
	$('#telU').val(d[8]);
	$('#tipoU').val(d[9]);
}

function agregaformPadre(datos){
	d = datos.split('||');
	$('#idPadre').val(d[0]);
	$('#apePU').val(d[1]);
	$('#apeMU').val(d[2]);
	$('#nomU').val(d[3]);
	$('#fechaU').val(d[4]);
	$('#curpU').val(d[5]);
	$('#estadoU').val(d[6]);
	$('#parentescoU').val(d[7]);
	$('#emailU').val(d[8]);
	$('#telU').val(d[9]);
	$('#ocupacionU').val(d[10]);
	$('#nivelU').val(d[11]);
}

/*function agregaformCarrera(datos){
	d = datos.split('||');
	$('#idCarrera').val(d[0]);
	$('#nombre').val(d[1]);
}*/

/*function actualizaCarrera(){
	idCarrera=$('#idCarrera').val();
	idNombre=$('#nombre').val();
	
	cadena = "idCarrera="+idCarrera+
	         "&idNombre="+idNombre;

	$.ajax({
		type:"POST",
		url:"../registrarDatos/actualizarCarrera.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo en el servidor :(");
			}
		}
	});
}*/

function actualizaGrupo(){
	idGrupo=$('#idGrupo').val();
	id_m1U=$('#id_m1U').val();
	id_m2U=$('#id_m2U').val();
	id_m3U=$('#id_m3U').val();
	
	cadena = "idGrupo="+idGrupo+
	         "&id_m1U="+id_m1U+
			 "&id_m2U="+id_m2U+
			 "&id_m3U="+id_m3U;

	$.ajax({
		type:"POST",
		url:"actualizarGrupo.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function actualizaMateria(){
	id=$('#idMateria').val();
	nomU=$('#nomU').val();
	desU=$('#desU').val();
	grupoU=$('#grupoU').val();
	
	cadena = "id="+id+
	         "&nomU="+nomU+
			 "&desU="+desU+
			 "&grupoU="+grupoU;

	$.ajax({
		type:"POST",
		url:"actualizarMateria.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function actualizaMaestro(){
	id=$('#idMaestro').val();
	apePU=$('#apePU').val();
	apeMU=$('#apeMU').val();
	nomU=$('#nomU').val();
	fechaU=$('#fechaU').val();
	curpU=$('#curpU').val();
	estadoU=$('#estadoU').val();
	emailU=$('#emailU').val();
	telU=$('#telU').val();
	tipoU=$('#tipoU').val();
	
	cadena = "id="+id+
	         "&apePU="+apePU+
			 "&apeMU="+apeMU+
			 "&nomU="+nomU+
			 "&fechaU="+fechaU+
			 "&curpU="+curpU+
			 "&estadoU="+estadoU+
			 "&emailU="+emailU+
			 "&telU="+telU+
			 "&tipoU="+tipoU;

	$.ajax({
		type:"POST",
		url:"actualizarMaestro.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function actualizaPadre(){
	id=$('#idPadre').val();
	apePU=$('#apePU').val();
	apeMU=$('#apeMU').val();
	nomU=$('#nomU').val();
	fechaU=$('#fechaU').val();
	curpU=$('#curpU').val();
	estadoU=$('#estadoU').val();
	parentescoU=$('#parentescoU').val();
	emailU=$('#emailU').val();
	telU=$('#telU').val();
	ocupacionU=$('#ocupacionU').val();
	nivelU=$('#nivelU').val();
	
	cadena = "id="+id+
	         "&apePU="+apePU+
			 "&apeMU="+apeMU+
			 "&nomU="+nomU+
			 "&fechaU="+fechaU+
			 "&curpU="+curpU+
			 "&estadoU="+estadoU+
			 "&parentescoU="+parentescoU+
			 "&emailU="+emailU+
			 "&telU="+telU+
			 "&ocupacionU="+ocupacionU+
			 "&nivelU="+nivelU;

	$.ajax({
		type:"POST",
		url:"actualizarPadre.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function actualizaAlumno(){
	id=$('#idAlumno').val();
	apePU=$('#apePU').val();
	apeMU=$('#apeMU').val();
	nomU=$('#nomU').val();
	fechaU=$('#fechaU').val();
	curpU=$('#curpU').val();
	calleU=$('#calleU').val();
	numIU=$('#numIU').val();
	numEU=$('#numEU').val();
	colU=$('#colU').val();
	codU=$('#codU').val();
	telU=$('#telU').val();
	munU=$('#munU').val();
	locU=$('#locU').val();
	tipoU=$('#tipoU').val();
	pesoU=$('#pesoU').val();
	estU=$('#estU').val();
	grupoU=$('#grupoU').val();
	
	cadena = "id="+id+
	         "&apePU="+apePU+
			 "&apeMU="+apeMU+
			 "&nomU="+nomU+
			 "&fechaU="+fechaU+
			 "&curpU="+curpU+
			 "&calleU="+calleU+
			 "&numIU="+numIU+
			 "&numEU="+numEU+
			 "&colU="+colU+
			 "&codU="+codU+
			 "&telU="+telU+
			 "&munU="+munU+
			 "&locU="+locU+
			 "&tipoU="+tipoU+
			 "&pesoU="+pesoU+
			 "&estU="+estU+
			 "&grupoU="+grupoU;

	$.ajax({
		type:"POST",
		url:"actualizarAlumno.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNoGrupo(id){
	alertify.confirm('Eliminar datos', '¿Esta seguro de eliminar este registro?', 
				function(){ eliminarGrupo(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarGrupo(id){
	cadena = "id="+id;
	$.ajax({
		type: "POST",
		url:"eliminarGrupo.php",
		data: cadena,
		success:function(r){
			if(r==1){
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNoMateria(id){
	alertify.confirm('Eliminar datos', '¿Esta seguro de eliminar este registro?', 
				function(){ eliminarMateria(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarMateria(id){
	cadena = "id="+id;
	$.ajax({
		type: "POST",
		url:"eliminarMateria.php",
		data: cadena,
		success:function(r){
			if(r==1){
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNoMaestro(id){
	alertify.confirm('Eliminar datos', '¿Esta seguro de eliminar este registro?', 
				function(){ eliminarMaestro(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarMaestro(id){
	cadena = "id="+id;
	$.ajax({
		type: "POST",
		url:"eliminarMaestro.php",
		data: cadena,
		success:function(r){
			if(r==1){
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNoPadre(id){
	alertify.confirm('Eliminar datos', '¿Esta seguro de eliminar este registro?', 
				function(){ eliminarPadre(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarPadre(id){
	cadena = "id="+id;
	$.ajax({
		type: "POST",
		url:"eliminarPadre.php",
		data: cadena,
		success:function(r){
			if(r==1){
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNoAlumno(id){
	alertify.confirm('Eliminar datos', '¿Esta seguro de eliminar este registro?', 
				function(){ eliminarAlumno(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarAlumno(id){
	cadena = "id="+id;
	$.ajax({
		type: "POST",
		url:"eliminarAlumno.php",
		data: cadena,
		success:function(r){
			if(r==1){
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function aceptarAlumno(info){
	d = info.split('||');
	id=d[0];
	grupo=d[1];
	cadena = "id="+id+
	         "&grupo="+grupo;
	$.ajax({
		type: "POST",
		url:"aceptarAlumno.php",
		data: cadena,
		success:function(r){
			if(r==1){
				alertify.success("Proceso realizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function verAlumno(datos){
	d = datos.split('||');
	$('#idAlumno').val(d[0]);
	$('#apePU').val(d[1]);
	$('#apeMU').val(d[2]);
	$('#nomU').val(d[3]);
	$('#curpU').val(d[4]);
	$('#calleU').val(d[5]);
	$('#numIU').val(d[6]);
	$('#numEU').val(d[7]);
	$('#colU').val(d[8]);
	$('#codU').val(d[9]);
	$('#tipoU').val(d[10]);
	$('#pesoU').val(d[11]);
	$('#estU').val(d[12]);
}

function agregaformCali(datos){
	alert(datos);
	d = datos.split("||");
	$('#bim1').val(d[1]);
}
