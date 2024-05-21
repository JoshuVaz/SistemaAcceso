/**
 * =============================================
 * CARGAR LA TABLA DINÁMICA DE CREDENCIALES
 * =============================================
 *
 * @format
 */

$(".tablaGenerador").DataTable({
  ajax: "ajax/datatable-generadores.ajax.php",
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

// MOSTRAR DATOS EN EL MODAL AGREGAR NUEVO GENERADOR
$(".btnGenerador").on("click", function () {
  $("#modalGenerador").modal("show");
});

// GUARDAR NUEVO GENERADOR
$("#guardarGenerador").click(function () {
  var generador = "generador";
  var nuevoNombre = $("#nuevoNombre").val();
  var nuevaUbicacion = $("#nuevaUbicacion").val();
  var datos = new FormData();
  datos.append("generador", generador);
  datos.append("nuevoNombre", nuevoNombre);
  datos.append("nuevaUbicacion", nuevaUbicacion);

  if (nuevoNombre !== "" || nuevaUbicacion !== "") {
    Swal.fire({
      title: "¿Está agregar un nuevo generador?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, generar generador!",
    }).then(function (result) {
      if (result.value == true) {
        ajax_icon_handlinggenerador("load");

        $.ajax({
          url: "ajax/generadores.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "html",
          success: function (respuesta) {
            if (respuesta == "ok") {
              Swal.fire({
                title: "Se ha guardado de manera correcta",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Ok",
              }).then(function (result) {
                if (result.value) {
                  window.location = "generadores";
                }
              });
            } else {
              Swal.fire({
                title: "Se ha generado un error, contacte al administrador",
                icon: "error",
                confirmButtonColor: "#E91616",
                confirmButtonText: "Ok",
              }).then(function (result) {
                if (result.value) {
                  window.location = "generadores";
                }
              });
            }
          },
        });
      }
    });
  } else {
    Swal.fire({
      title: "No puede quedar vacio el campo de nombre o ubicación",
      icon: "error",
      confirmButtonColor: "#017004",
      confirmButtonText: "Ok",
    });
  }
});

function ajax_icon_handlinggenerador(type) {
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
