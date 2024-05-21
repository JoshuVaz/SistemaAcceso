/*=============================================
RANGO DE FECHAS
=============================================*/
var start = moment().subtract(29, "days");
var end = moment();
function cb(start, end) {
  $("#reportrangeAbrir span").html(
    start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
  );
  var fechaInicial = start.format("YYYY-MM-DD");
  var fechaFinal = end.format("YYYY-MM-DD");
  var capturarRango = $("#reportrangeAbrir span").html();
  localStorage.setItem("capturarRango", capturarRango);
  window.location =
    "index.php?pagina=mostrar-aperturas&fechaInicial=" +
    fechaInicial +
    "&fechaFinal=" +
    fechaFinal;

  // alert("hola").delay(10000);
}

$("#reportrangeAbrir").daterangepicker(
  {
    startDate: start,
    endDate: end,
    ranges: {
      Hoy: [moment(), moment()],
      Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
      "Últimos 7 días": [moment().subtract(6, "days"), moment()],
      "Este mes": [moment().startOf("month"), moment().endOf("month")],
      "Último mes": [
        moment().subtract(1, "month").startOf("month"),
        moment().subtract(1, "month").endOf("month"),
      ],
    },
  },
  cb
);


$(".guardarApertura").on("click", function () {
  var realizarApertura = "realizarApertura";
  var formaIngreso = $("#registroIngreso").val();
  var nombreIngreso = $("#notaIngreso").val();
  var chapaSeleccionada = $("#PuertaSelect").val();
  var datos = new FormData();
  datos.append("realizarApertura",realizarApertura);
  datos.append("formaIngreso",formaIngreso);
  datos.append("nombreIngreso",nombreIngreso);
  datos.append("chapaSeleccionada",chapaSeleccionada);
  if (nombreIngreso != "" && chapaSeleccionada != "") {
    $.ajax({
      url: "ajax/abrir.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta){
        if (respuesta == "ok") {
          ajax_icon_handlingAbrirChapa("ok");
        } else {
          ajax_icon_handlingAbrirChapa("error");
        }
      }
    });
  } else {
    ajax_icon_handlingAbrirChapa("vacio");
  }
  
});

/*=============================================
  FUNCION LOADER 
  =============================================*/
  function ajax_icon_handlingAbrirChapa(type) {
    switch (type) {
      case "load":
        Swal.fire({
          title: "",
          html: '<div class="save_loading"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>En proceso...</h4></div>',
          showConfirmButton: false,
          allowOutsideClick: true,
        });
  
        break;
  
      case "vacio":
        Swal.fire({
          icon: "error",
          title: "¡Las casillas no pueden ir vacias o llevar caracteres especiales!",
        });
  
        break;
  
      case "error":
        Swal.fire({
          icon: "error",
          title: "¡No se pudo guardar de manera correcta!",
        });
  
        break;

      case "ok":
        Swal.fire({
          icon: "success",
          title: "¡CORRECTO!",
          text: "La puerta se abrio de manera correcta",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "historial-acceso";
          }
        });
  
        break;
    }
  }

