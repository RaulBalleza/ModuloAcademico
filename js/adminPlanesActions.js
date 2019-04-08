$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton
  closeModPlan();
  clickModPlan();
  clickCloseModal();
  clickSavePlan();
  clickAddPlan();
  getHTMLPlanes();
});

function closeModPlan()
{
  $("#btnModClose").click(function() {
    $("form[name='frmModPlan']").trigger("reset");
    $("#modificar").modal('hide');
  });
}

function clickCloseModal()
{
  $("#btnClose").click(function() {
    $("#agregar").modal('hide');
    $("form[name='frmAddPlan']").trigger("reset");
  });
}

function getHTMLPlanes()
{
  $.post("src/model/planes/getPlanesShow.php",
  function(data, status) {
    if (status == 'success')
    {
      $("#tablePlanes").html(data);
    }
    else {
      $("#msnAlert").html("Algo va mal");
    }
  });
}

function clickAddPlan()
{
  $("#btnAddPlan").click(function () {
    $("#agregar").modal({keyboard: true});
  });
}

function clickModPlan()
{
  $("#btnModCarr").click(function() {
    $("form[name='frmModPlan']").validate({
      rules: {
        txtModNomPlan: "required"
      },
      messages: {
        txtModNomPlan: "Por favor ingresa el nombre del plan de estudios"
      },
      submitHandler: function () {
        $.post("src/model/planes/updatePlan.php",
        {
          nomPlan: $("input[name='txtModNomPlan']").val(),
          clave: $("input[name='clvPlan']").val()
        },
        function(data, status) {
          if (status == 'success' && data == 'SUCCESS')
          {
            $('#modificar').modal('hide');
            $("form[name='frmModPlan']").trigger("reset");
            getHTMLPlanes();
          }
          else {
            $("#msnAlert").html(data);
          }
        });
      }
    });
  });
}

function clickSavePlan()
{
  $("#btnSavePlan").click(function() {
    $("form[name='frmAddPlan']").validate({
      rules: {
        txtClavePlan: "required",
        txtNomPlan: "required"
      },
      messages: {
        txtClavePlan: "Por favor ingresa la clave del plan de estudios",
        txtNomPlan: "Por favor ingresa el nombre del plan de estudios"
      },
      submitHandler: function() {
        $.post("src/model/planes/savePlan.php",
        {
          clave: $("input[name='txtClavePlan']").val(),
          nomPlan: $("input[name='txtNomPlan']").val(),
          carrera: $("select[name='lstCarreras']").val(),
          nivel : $("select[name='lstNivel']").val()
        },
      function(data, status){
        if (status == 'success' && data == 'SUCCESS')
        {
          $("#agregar").modal('hide');
          $("form[name='frmAddPlan']").trigger("reset");
          getHTMLPlanes();
        }
        else {
          $("#msnAlert").html(data);
        }
      });
      }
    });
  });
}

function agregaFormulario(idPlan,nombrePlan)
{
  $("input[name='clvPlan']").val(idPlan);
  $("input[name='txtModNomPlan']").val(nombrePlan);
  $("#modificar").modal({keyboard: true});
}
