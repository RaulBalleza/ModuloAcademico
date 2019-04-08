$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton
  openAddUserModal();
  clickSaveUser();
  clickModUser();
  clickCloseModal();
  clickCloseModModal()
  getHTMLUsers();
});



function getHTMLUsers()
{
  $.post("src/model/users/getUsersShow.php",
  function(data, status) {
    if (status =='success')
    {
      $("#tableProfs").html(data);
    }
    else {
      $("#tableProfs").html(data);
    }
  });
}

function clickCloseModal()
{
  $("#btnClose").click(function() {
    $("#agregar").modal('hide');
    $("form[name='registration']").trigger("reset");
  });
}

function clickCloseModModal()
{
  $("#btnModCancel").click(function() {
    $("#modificar").modal('hide');
    $("form[name='frmModificar']").trigger("reset");
  });
}

function openAddUserModal()
{
  $("#btnAddUser").click( function() {
    $("#agregar").modal({keyboard: true});
  });
}

function clickSaveUser()
{
  $("#btnSaveUser").click( function() {
    validateForm();
  });
}

function clickModUser()
{
  $("#btnModGuardar").click(function() {
    validateModForm();
  });
}

function validateModForm()
{
  $("form[name='frmModificar']").validate({
    rules: {
      m_nombre: "required",
    },
    messages: {
      m_nombre: "Por favor ingresa el nombre del usuario/profesor"
    },
    submitHandler: function() {
      $.post("src/model/users/updateUser.php",
      {
        clave: $("input[name='m_clave']").val(),
        nombre: $("input[name='m_nombre']").val(),
        tipou: $("select[name='m_tipou']").val(),
        carrera: $("select[name='m_carrera']").val(),
        nivelads: $("select[name='m_nivelads']").val(),
        contrato: $("select[name='m_contrato']").val()
      },
      function(data, status) {
        if (status == 'success' && data=='SUCCESS')
        {
          $("#modificar").modal('hide');
          $("form[name='frmModificar']").trigger("reset");
          getHTMLUsers();
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
  $("form[name='registration']").validate({
    rules: {
      nombre: "required",
      clave: {
        required: true,
        email: true
      }
    },
    messages: {
      clave: "Por favor ingresa el correo insitucional del usuario/profesor",
      nombre: "Por favor ingresa el nombre del usuario/ profesor",
    },
    submitHandler: function() {

      $.post("src/model/users/saveUsers.php",
      {
        clave: $("input[name='clave']").val(),
        nombre: $("input[name='nombre']").val(),
        tipou: $("select[name='tipou']").val(),
        carrera: $("select[name='carrera']").val(),
        nivelads: $("select[name='nivelads']").val(),
        contrato: $("select[name='contrato']").val()
      },
      function(data, status) {
        if (status =='success' && data == 'SUCCESS')
        {
          $("#agregar").modal('hide');
          $("form[name='registration']").trigger("reset");
          getHTMLUsers();
        }
        else {
          $("#msnAlert").html("status=" + status + "\n data=" + data);
        }
      });
  }
});
}

function agregaFormulario(nombre)
{
  getDataUser(nombre);
}

function getDataUser(nombre)
{
  $.post("src/model/users/dataUserMod.php",
  {
    usuario: nombre
  },
  function(data, status) {
    if (status == 'success')
    {
      $("input[name='m_nombre']").val(data.nombre);
      $("input[name='m_clave']").val(nombre);
      $("select[name='m_tipou']").val(data.tipo);
      $("select[name='m_carrera']").val(data.carrera);
      $("select[name='m_nivelads']").val(data.nivel);
      $("select[name='m_contrato']").val(data.contrato);
      $("#modificar").modal({keyboard: true});
    }
    else {
      alert("Error");
    }
  });
}
