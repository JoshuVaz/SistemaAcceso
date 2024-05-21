/**
 * =============================================
 * CARGAR LA TABLA DINÁMICA DE CREDENCIALES
 * =============================================
 *
 * @format
 */

$(".tablaTarjetasAsignadas").DataTable({
  ajax: "ajax/datatable-asignar-tarjetas.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

/*=============================================
  GUARDAR INFORMACION AL ASIGNAR TARJETA
  =============================================*/
$(".btnAsignarTarjetas").on("click", function () {
  var asignar = "asignar";
  var usuario = $("#asignarUsuario").val();
  var tarjeta = $("#asignarTarjeta").val();
  var datos = new FormData();
  datos.append("asignar", asignar);
  datos.append("usuario", usuario);
  datos.append("tarjeta", tarjeta);

  if (usuario == "" || tarjeta == "") {
    Swal.fire({
      title: "Error al asignar tarjeta",
      text: "Debe seleccionar un usuario y una tarjeta",
      icon: "error",
      confirmButtonText: "Cerrar",
    });
  } else {
    Swal.fire({
      title: "¿Está seguro de asignar esta tarjeta?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, asignar!",
    }).then(function (result) {
      if (result.value == true) {
        ajax_icon_handlingasignartarjeta("load");

        $.ajax({
          url: "ajax/asignar-tarjetas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "html",
          success: function (respuesta) {
            if (respuesta == "ok") {
              Swal.fire({
                icon: "success",
                title: "Se ha asignado de manera correcta la tarjeta",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
              }).then(function (result) {
                if (result.value) {
                  window.location = "asignar-tarjetas";
                }
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "No se ha asignado de manera correcta la tarjeta",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
              }).then(function (result) {
                if (result.value) {
                  window.location = "asignar-tarjetas";
                }
              });
            }
          },
        });
      }
    });
  }
});

/*  =============================================
  DESASIGNAR TARJETA
  ============================================= */
$(".tablaTarjetasAsignadas tbody").on(
  "click",
  ".btnDesasignarTarjeta",
  function () {
    var desasignar = "desasignar";
    var idUsuario = $(this).attr("idUsuario");
    var idTarjeta = $(this).attr("idTarjeta");
    var datos = new FormData();
    datos.append("desasignar", desasignar);
    datos.append("idUsuario", idUsuario);
    datos.append("idTarjeta", idTarjeta);

    Swal.fire({
      title: "¿Está seguro de desasignar esta tarjeta?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, desasignar!",
    }).then(function (result) {
      if (result.value == true) {
        ajax_icon_handlingasignartarjeta("load");

        $.ajax({
          url: "ajax/asignar-tarjetas.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "html",
          success: function (respuesta) {
            if (respuesta == "ok") {
              Swal.fire({
                icon: "success",
                title: "Se ha desasignado de manera correcta la tarjeta",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
              }).then(function (result) {
                if (result.value) {
                  window.location = "asignar-tarjetas";
                }
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "No se pudo desasignar de manera correcta la tarjeta",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
              }).then(function (result) {
                if (result.value) {
                  window.location = "asignar-tarjetas";
                }
              });
            }
          },
        });
      }
    });
  }
);

function ajax_icon_handlingasignartarjeta(type) {
  switch (type) {
    case "load":
      Swal.fire({
        title: "",
        html: '<div class="save_loading"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>En proceso...</h4></div>',
        showConfirmButton: false,
        allowOutsideClick: true,
      });

      break;
  }
}
