/**
 * =============================================
 * CARGAR LA TABLA DINÁMICA DE CREDENCIALES
 * =============================================
 *
 * @format
 */

$(".tablaTarjetas").DataTable({
  ajax: "ajax/datatable-alta-tarjetas.ajax.php",
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
ELIMINAR TARJETA
=============================================*/
$(".tablaTarjetas").on("click", ".btnEliminarTarjeta", function () {
  var eliminarTarjeta = "eliminarTarjeta";
  var idTarjeta = $(this).attr("idTarjeta");
  var datos = new FormData();
  datos.append("eliminarTarjeta", eliminarTarjeta);
  datos.append("idTarjeta", idTarjeta);

  Swal.fire({
    title: "¿Está seguro de borrar la tarjeta?",
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.value == true) {
      ajax_icon_handlingdhlco("load");
      $.ajax({
        url: "ajax/alta-tarjetas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta == "ok") {
            ajax_icon_handlingdhlco("eliminada");
          }
        },
      });
    }
  });
});

/*=============================================
SINCRONIZAR PRODUCTOS DE PAGINA
=============================================*/
$(".card").on("click", ".btnAgregarTarjetas", function () {
  ajax_icon_handlingdhlco("load");

  var status = 1;

  var datos = new FormData();
  datos.append("status", status);

  $.ajax({
    url: "ajax/alta-tarjetas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      if (data == "ok") {
        ajax_icon_handlingdhlco(true);

        setTimeout(function () {
          ajax_icon_handlingdhlco("load");
        }, 3000);

        setTimeout(function () {
          chequeo();
        }, 3000);
      }
    },
  });
});

function chequeo() {
  var idModo = 1;

  var datos = new FormData();
  datos.append("idModo", idModo);

  $.ajax({
    url: "ajax/alta-tarjetas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (data) {
      switch (data) {
        case "0":
          ajax_icon_handlingdhlco("registrada");
          break;

        case "1":
          setTimeout(function () {
            chequeo();
          }, 3000);

          break;

        case "2":
          ajax_icon_handlingdhlco("duplicada");
          break;
      }
    },
  });
}

/*=============================================
FUNCION LOADER 
=============================================*/
function ajax_icon_handlingdhlco(type) {
  switch (type) {
    case "load":
      Swal.fire({
        title: "",
        html: '<div class="save_loading"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>En proceso...</h4></div>',
        showConfirmButton: false,
        allowOutsideClick: true,
      });

      break;

    case "duplicada":
      setTimeout(function () {
        Swal.fire({
          icon: "error",
          title: "La tarjeta ya se encuentra en el sistema",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "alta-tarjetas";
          }
        });
      }, 1000);

      break;

    case "eliminada":
      setTimeout(function () {
        Swal.fire({
          icon: "success",
          title: "La tarjeta se ha eliminado correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "alta-tarjetas";
          }
        });
      }, 1000);

      break;

    case true:
      setTimeout(function () {
        Swal.fire({
          icon: "success",
          title: "Puedes escanear la tarjeta",
          showConfirmButton: false,
        });
      }, 1000);

      break;

    case "registrada":
      setTimeout(function () {
        Swal.fire({
          icon: "success",
          title: "Tarjeta asignada",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "alta-tarjetas";
          }
        });
      }, 1000);

      break;
  }
}
