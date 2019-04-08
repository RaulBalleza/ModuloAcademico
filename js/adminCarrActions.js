$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton
  clickUpdateCarr();
  clickCloseModModal();
  clickSaveCarr();
  clickCloseModal();
  clickAddCarr();
  getHTMLCarreras();
});

function clickUpdateCarr()
{
  $("form[name='frmModCarr']").validate({
    rules: {
      txtModCarr: "required",
    },
    messages: {
      txtModCarr: "Por favor ingresa el nombre de la carrera"
    },
    submitHandler: function() {
      $.post("src/model/carrera/updateCarr.php",
      {
        txtModCarr: $("input[name='txtModCarr']").val(),
        idcarrera: $("input[name='numCarr']").val()
      },
      function(data, status) {
        if (status =='success' && data == 'SUCCESS')
        {
          $("#modificar").modal('hide');
          $("form[name='frmModCarr']").trigger("reset");
          getHTMLCarreras();
        }
        else {
          $("#msnAlert").html(status + " " + data);
        }
      });
    }
  });
}

function clickCloseModModal()
{
  $("#btnModClose").click(function() {
    $("#modificar").modal('hide');
    $("form[name='frmAddCarr']").trigger("reset");
  });
}

function getHTMLCarreras()
{
  $.post("src/model/carrera/getCarrShow.php",
  function(data, status) {
    if (status == 'success')
    {
      $("#tableCarreras").html(data);
    }
    else {
      $("#msnAlert").html("Algo va mal");
    }
  });
}

function clickAddCarr()
{
  $("#btnAddCarr").click(function() {
    $("#agregar").modal({keyboard: true});
  });
}

function clickCloseModal()
{
  $("#btnClose").click(function() {
    $("#agregar").modal('hide');
    $("form[name='frmAddCarr']").trigger("reset");
  });
}

function clickSaveCarr()
{
  $("#btnSaveCarr").click( function() {
    $("form[name='frmAddCarr']").validate({
      rules: {
        txtNomCarr: "required"
      },
      messages: {
        txtNomCarr: "Por favor ingresa el nombre de la nueva carrera"
      },
      submitHandler: function() {
        $.post("src/model/carrera/saveCarr.php",
        {
          nomcarr: $("input[name='txtNomCarr']").val()
        },
        function(data,status) {
          if (status=='success' && data == 'SUCCESS')
          {
            $("#agregar").modal('hide');
            $("form[name='frmAddCarr']").trigger("reset");
            getHTMLCarreras();
          }
          else {
            $("#msnAlert").html("status=" + status + " data=" + data);
          }
        });
      }
    });
  });
}

function agregaFormulario(idcarrera,nombre_carrera)
{
  $("input[name='txtModCarr']").val(nombre_carrera);
  $("input[name='numCarr']").val(idcarrera);
  $("#modificar").modal({keyboard: true});
}
