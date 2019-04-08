$(document).ready(function() {
  getHTMLTableDispo();
  getProfFromLst();
});

function getProfFromLst()
{
  $("select[name='lstProf']").change(function() {
    getHTMLTableDispo();
  });
}

function getHTMLTableDispo()
{
  var info = $("div[name='info']").attr('data-info');
  var prof;

  if (info == 1)
  {
    prof = $("select[name='lstProf']").val();
  }
  else {
    prof = $("input[name='lstProf']").val();
  }

  $.post("src/model/disponibilidad/showDispon.php", {
    user: prof
  }, function (data, status) {
    if (status == 'success')
    {
      $("#tableDispo").html(data);
      changeStatusTimeSlot();
    }
    else {
      $("#tableDispo").html("Algo va mal");
    }
  });
}

function changeStatusTimeSlot()
{

  var buttonPressed;
  var parentColor;

  $(".botonHora").click(function() {

    buttonPressed = $(this).attr('id');
    parentColor = $("#"+buttonPressed).closest('td').css("background-color");
    var info = $("div[name='info']").attr('data-info');
    var prof;

    if (info == 1)
    {
      prof = $("select[name='lstProf']").val();
    }
    else {
      prof = $("input[name='lstProf']").val();
    }

    if (parentColor == "rgb(55, 182, 82)")
    {
      $.post("src/model/disponibilidad/deleteDisp.php",{
        timeSlot: buttonPressed,
        user: prof
      }, function(data, status) {
        if (status=='success' && data == 'SUCCESS')
        {
          $("#"+buttonPressed).closest('td').css("backgroundColor","#FFF");
        }
        else {
          alert(data);
        }
      });
    }
    else { //Esta es la parte para guardar el espacio de espacio_tiempo
      $.post("src/model/disponibilidad/saveDisp.php",{
        timeSlot: buttonPressed,
        user: prof
      }, function(data, status) {
        if (status == 'success' && data == 'SUCCESS')
        {
          $("#"+buttonPressed).closest('td').css("backgroundColor","#37B652");
        }
        else {
          alert(data);
        }
      });
    }
  });
}
