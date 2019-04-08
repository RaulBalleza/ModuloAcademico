$(document).ready( function() { // listo la carga del DOM se asinga la función click al boton
  lstPlanesChange();
});

function lstPlanesChange()
{
  $("select[name='lstPlanes']").change(function() {
    var clv = $("select[name='lstPlanes']").val();

    if (clv != -1)
    {
      $.post("src/model/valorar/getMatShow.php", {
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

function putTdClvProf(clvProf)
{
  if (clvProf != -1)
  {
    $("#clvProf").html(clvProf);
    $("#lstPtsNewProf").prop("disabled",false);
  }
  else {
    $("#lstPtsNewProf").prop("disabled",true);
  }

}

function cambiaPtsTotal(PtsTotal)
{
  var cPlan = $("select[name='lstPlanes']").val();
  var cMat = $("#modalMatClv").text();
  var cProf = $("#clvProf").text();

  $.post("src/model/valorar/changeValMatUsr.php",{
    clvMat: cMat,
    clvPlan: cPlan,
    clvUser: cProf,
    ptsDire: PtsTotal
  }, function (data, status) {
    if (status != 'success' || data != 'SUCCESS')
    {
      $("#msnAlert").html(data);
    }
  });

  $("#PtsTotal").html(PtsTotal);
}

function savUpValDir(clvProf, puntos)
{
  var cPlan = $("select[name='lstPlanes']").val();
  var cMat = $("#modalMatClv").text();

  $.post("src/model/valorar/changeValMatUsr.php",{
    clvMat: cMat,
    clvPlan: cPlan,
    clvUser: clvProf,
    ptsDire: puntos
  }, function (data, status) {
    if (status != 'success' || data != 'SUCCESS')
    {
      $("#msnAlert").html(data);
    }
  });
}

function savUpVal(claveMat, puntos)
{
  var cPlan = $("select[name='lstPlanes']").val();

  $.post("src/model/valorar/changeValMatUsr.php",{
    clvMat: claveMat,
    clvPlan: cPlan,
    ptsProf: puntos
  }, function (data, status) {
    if (status != 'success' || data != 'SUCCESS')
    {
      $("#msnAlert").html(data);
    }
  });
}

function ponClaveMateriaDiv(materia)
{
  $("#modalMatClv").html(materia);
}

function showValuedProfs(materia)
{
  var cPlan = $("select[name='lstPlanes']").val();

ponClaveMateriaDiv(materia);

  $.post("src/model/valorar/getTableValProfs.php",{
    clvMat: materia,
    clvPlan: cPlan
  }, function (data, status) {
    if (status == 'success')
    {
      $("#valMatProf").html(data);
    }
    else {
      $("#valMatProf").html("Algo salio mal");
    }
  });

  $("#califDir").modal({keyboard: true});
}
