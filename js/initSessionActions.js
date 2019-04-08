$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton

startSession();
  $("#btnInicia")
});

function startSession()
{
  $("input").keypress(function(e) {
    var key = e.which;
    if (key === 13)
    {
      enviaDatos();
    }
  });
}

function enviaDatos()
{
  $.post("src/handleSession/startSession.php",
  {
    usuario: $("input[name='usuario']").val(),
    clave: $("input[name='clave']").val()
  },
  function(data, status) {
    if (status =='success' && data != 'ERROR')
    {
      var url = "panel.php";
      window.location = url;
    }
    else {
      $("#msnAlert").html("Usuario y/o contraseña incorrecta");
    }
  });
}
