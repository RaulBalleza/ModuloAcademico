$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton
  clickUpdateMat();
  clickCloseModModal();
  clickSaveMat();
  clickCloseModal();
  clickAddMat();
  lstPlanesChange();
  selectVal();
});

function lstPlanesChange()
{
  $("select[name='lstPlanes']").change(function() {
    var clv = $("select[name='lstPlanes']").val();

    if (clv != -1)
    {
      $.post("src/model/materias/getMatShow.php", {
        clvPlan : clv
      }, function (data, status) {
        if (status == 'success')
        {
          $("#tableMaterias").html(data);
        }
        else {
          $("#tableMaterias").html("!!! Algo Va mal !!!");
        }
      });
    }

  });
}
function selectVal() {
  $('#lstPlanes').val("-1");
  
  $('#lstPlanes').change(function () {
    selectVal = $('#lstPlanes').val();
   
    if (selectVal == -1) {
       $('#btnAddMat').prop("disabled", true);
    }
    else {
      $('#btnAddMat').prop("disabled", false);
    }
  })
  
}

function clickUpdateMat()
{
  $("#btnModMat").click(function() {
    validateModForm();
  });
}

function clickCloseModModal()
{
  $("#btnModClose").click(function() {
    $("#modificar").modal('hide');
    $("form[name='frmAddMat']").trigger("reset");
  });
}

function getHTMLMaterias()
{
  $.post("src/model/materias/getMatShow.php", {
    clvPlan : $("select[name='lstPlanes']").val()
  },
  function(data, status) {
    if (status == 'success')
    {
      $("#tableMaterias").html(data);
      doubleClic();
    }
    else {
      $("#msnAlert").html("Algo va mal");
    }
  });
}

function clickAddMat()
{
  $("#btnAddMat").click(function() {
    $("select[name='clavePlan']").val($("select[name='lstPlanes']").val());
    $("#agregar").modal({keyboard: true});
  });
}

function clickCloseModal()
{
  $("#btnClose").click(function() {
    $("#agregar").modal('hide');
    $("form[name='frmAddMat']").trigger("reset");
  });
}

function clickSaveMat()
{
  $("#btnSaveMat").click( function() {
    validateForm();
  });
}

function validateModForm()
{
  $("form[name='frmModMat']").validate({
    rules: {
      m_nombre: "required",
      m_creditos: "required",
      m_hora : "required"
    },
    messages: {
      m_nombre: "Por favor ingresa el nombre de la materia",
      m_creditos: "Por favor ingresa los creditos de la materia"
    },
    submitHandler: function() {
      $.post("src/model/materias/updateMat.php",
      {
        clave: $("input[name='m_clave']").val(),
        nombre: $("input[name='m_nombre']").val(),
        creditos: $("input[name='m_creditos']").val(),
        horas: $("input[name='m_horas']").val(),
        cuatrimestre: $("select[name='m_cuatri']").val(),
        posicion: $("select[name='m_posicion']").val(),
        clv_plan: $("select[name='m_plan']").val(),
        tipoMat: $("select[name='m_tipoMat']").val()
      },
      function(data, status) {
        if (status == 'success' && data=='SUCCESS')
        {
          $("#modificar").modal('hide');
          $("form[name='frmModMat']").trigger("reset");
          getHTMLMaterias();
        }
        else
        {
          $("#msnAlert").html("status=" + status + "\n data=" + data);
        }
      });
    }
  });
}

function validateForm()
{
  $("form[name='frmAddMat']").validate({
    rules: {
      nombre: "required",
      clave: "required",
      creditos: "required",
      horas: "required"
    },
    messages: {
      nombre: "Por favor ingresa el nombre de la materia",
      clave: "Por favor ingresa la clave de la materia",
      creditos: "Por favor ingresa los creditos",
      horas: "Por favor ingresa las horas/semana"
    },
    submitHandler: function() {
      $.post("src/model/materias/saveMat.php",
      {
        clave: $("input[name='clave']").val(),
        nombre: $("input[name='nombre']").val(),
        creditos: $("input[name='creditos']").val(),
        horas: $("input[name='horas']").val(),
        cuatrimestre: $("select[name='cuatri']").val(),
        posicion: $("select[name='posicion']").val(),
        clv_plan: $("select[name='clavePlan']").val(),
        tipoMat: $("select[name='tipoMat']").val()
      },
      function(data, status) {
        if (status =='success' && data == 'SUCCESS')
        {
          $("#agregar").modal('hide');
          $("form[name='frmAddMat']").trigger("reset");
          getHTMLMaterias();
        }
        else {
          $("#msnAlert").html("status=" + status + "\n data=" + data);
        }
      });
  }
});
}



function agregaFormulario(clave)
{
  var plan = $("select[name='lstPlanes']").val();
  getDataMateria(clave,plan);
}

function getDataMateria(clave, plan)
{
  $.post("src/model/materias/dataMatMod.php",
  {
    materia: clave,
    clvPlan: plan
  },
  function(data, status) {
    if (status == 'success')
    {
      $("input[name='m_clave']").val(clave);
      $("input[name='m_nombre']").val(data.nombre);
      $("input[name='m_creditos']").val(data.creditos);
      $("select[name='m_cuatri']").val(data.cuatrimestre);
      $("select[name='m_posicion']").val(data.posicion);
      $("select[name='m_plan']").val(data.clv_plan);
      $("select[name='m_tipoMat']").val(data.tipoMat);
      $("#modificar").modal({keyboard: true});
    }
    else {
      alert("Error");
    }
  });
}
