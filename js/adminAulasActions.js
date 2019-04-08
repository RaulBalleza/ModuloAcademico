$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton
  clickUpdateAula();
  clickCloseModModal();
  clickCloseCatModal();
  clickCloseEquipoModal();
  clickSaveAula();
  clickSaveCategoria();
  clickSaveEquipo();
  clickCloseModal();
  clickAddAula();
  clickAddEquipo();
  clickAddCategoria();
  getHTMLAulas();
  guardarEquipo();
});

function guardarEquipo(){
  $("#btnAddEquipoAula").click(function(){
    $("form[name='frmAsignarEquipo']").validate({
      rules: {
        
      },
      messages: {

      },
      submitHandler: function() {
        $.post("src/model/aulas/saveAsignarEquipo.php",
        {
          aula: $("input[name='aula']").val(),
          cantidad: $("input[name='cantidad']").val(),
          equipo: $("checkbox[name='equipo']").val()
        },
        function(data, status) {
          if (status =='success' && data == 'SUCCESS')
          {
           // window.location.href="adminAulas.php";
          }
          else {
            $("#msnAlert").html(status + " " + data);
          }
        });
      }
    });
  });
}

function clickUpdateAula()
{
 $("#btnModGuardar").click( function() {
  $("form[name='frmAulaModificar']").validate({
    rules: {
        m_nombre: "required",
        m_capacidad: "required"
    },
    messages: {
      m_nombre: "Por favor ingresa el nombre del aula",
      m_capacidad: "Por favor ingresa la capacidad del aula"
    },
    submitHandler: function() {
      $.post("src/model/aulas/updateAula.php",
      {
        nombre: $("input[name='m_nombre']").val(),
        capacidad: $("input[name='m_capacidad']").val(),
        tipoa: $("select[name='m_tipoa']").val(),
        clave: $("input[name='m_clave']").val()
      },
      function(data, status) {
        if (status =='success' && data == 'SUCCESS')
        {
          $("#modificar").modal('hide');
          $("form[name='frmAulaModificar']").trigger("reset");
          getHTMLAulas();
        }
        else {
          $("#msnAlert").html(status + " " + data);
        }
      });
    }
  });
 });
}

function clickCloseModModal()
{
  $("#btnModCancel").click(function() {
    $("#modificar").modal('hide');
    $("form[name='frmAulaModificar']").trigger("reset");
  });
}

function clickCloseCatModal()
{
  $("#btnCloseCat").click(function() {
    $("#agregarCategoria").modal('hide');
    $("form[name='frmAddCategoria']").trigger("reset");
  });
}

function clickCloseEquipoModal()
{
  $("#btnCloseEquipo").click(function() {
    $("#agregarEquipo").modal('hide');
    $("form[name='frmAddEquipo']").trigger("reset");
  });
}

function getHTMLAulas()
{
  $.post("src/model/aulas/getAulasShow.php",
  function(data, status) {
    if (status == 'success')
    {
      $("#tableAulas").html(data);
    }
    else {
      $("#msnAlert").html("Algo va mal");
    }
  });
}


function clickAddAula()
{
  $("#btnAddAula").click(function() {
    $("#agregar").modal({keyboard: true});
  });
}

function clickAddEquipo()
{
  $("#btnAddEquipo").click(function() {
    $("#agregarEquipo").modal({keyboard: true});
  });
}

function clickAddCategoria()
{
  $("#btnAddCategoria").click(function() {
    $("#agregarCategoria").modal({keyboard: true});
  });
}

function clickCloseModal()
{
  $("#btnClose").click(function() {
    $("#agregar").modal('hide');
    $("form[name='frmAddAula']").trigger("reset");
  });
}

function clickSaveCategoria()
{
  $("#btnSaveCategoria").click( function() {
    $("form[name='frmAddCategoria']").validate({
      rules: {
        c_nombre: "required",
        c_descripcion: "required"
      },
      messages: {
        c_nombre: "Por favor ingresa el nombre de la categoria",
        c_descripcion: "Por favor ingresa la descripcion de la categoria"
      },
      submitHandler: function() {
        $.post("src/model/aulas/saveCategoria.php",
        {
          c_nombre: $("input[name='c_nombre']").val(),
          c_descripcion: $("textarea[name='c_descripcion']").val()
        },
        function(data,status) {
          if (status =='success' && data == 'SUCCESS')
          {
            $("#agregarCategoria").modal('hide');
            $("form[name='frmAddCategoria']").trigger("reset");
            getHTMLAulas();
          }
          else {
            $("#msnAlert").html("status=" + status + " data=" + data);
          }
        });
      }
    });
  });
}

function clickSaveEquipo()
{
  $("#btnSaveEquipo").click( function() {
    $("form[name='frmAddEquipo']").validate({
      rules: {
        e_nombre: "required",
        e_descripcion: "required"
      },
      messages: {
        e_nombre: "Por favor ingresa el nombre del equipo",
        e_descripcion: "Por favor ingresa la descripcion del equipo"
      },
      submitHandler: function() {
        $.post("src/model/aulas/saveEquipo.php",
        {
          e_nombre: $("input[name='e_nombre']").val(),
          e_descripcion: $("textarea[name='e_descripcion']").val(),
          e_categoria: $("select[name='e_categoria']").val()     
        },
        function(data,status) {
          if (status=='success' && data == 'SUCCESS')
          {
            $("#agregarEquipo").modal('hide');
            $("form[name='frmAddEquipo']").trigger("reset");
            getHTMLAulas();
          }
          else {
            $("#msnAlert").html("status=" + status + " data=" + data);
          }
        });
      }
    });
  });
}

function clickSaveAula()
{
  $("#btnSaveAula").click( function() {
    $("form[name='frmAddAula']").validate({
      rules: {
        clave: "required",
        nombre: "required",
        capacidad: "required",
      },
      messages: {
        clave: "Por favor ingresa la clave del aula",
        nombre: "Por favor ingresa el nombre del aula",
        capacidad: "Por favor ingresa la capacidad del aula",
      },
      submitHandler: function() {
        $.post("src/model/aulas/saveAula.php",
        {
          clave: $("input[name='clave']").val(),
          nombre: $("input[name='nombre']").val(),
          tipoa : $("select[name='tipoa']").val(),
          capacidad : $("input[name='capacidad']").val(),          
          prof : $("select[name='prof']").val(),
        },
        function(data,status) {
          if (status=='success' && data == 'SUCCESS')
          {
            $("#agregar").modal('hide');
            $("form[name='frmAddAula']").trigger("reset");
            getHTMLAulas();
          }
          else {
            $("#msnAlert").html("status=" + status + " data=" + data);
          }
        });
      }
    });
  });
}

function agregaFormulario(clave)
{
  getDataAula(clave);
}

function getDataAula(clave)
{
  $.post("src/model/aulas/dataAulaMod.php",
  {
    aula: clave
  },
  function(data, status) {
    if (status == 'success')
    {
      $("input[name='m_nombre']").val(data.nombre);
      $("input[name='m_clave']").val(clave);
      $("select[name='m_tipoa']").val(data.tipo);
      $("input[name='m_capacidad']").val(data.capacidad);
      $("#modificar").modal({keyboard: true});
    }
    else {
      alert("Error");
    }
  });
}

