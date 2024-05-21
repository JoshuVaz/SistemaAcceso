/*=============================================
CARGAR LA TABLA DINÁMICA DE CREDENCIALES
=============================================*/
var registrosMostrar = $('#registrosMostrar').val();

$(".tablaChapas").DataTable({
    "ajax": "ajax/datatable-chapas.ajax.php",
    eferRender: true,
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

/*$('.tablaChapas').on('length.dt', function (e, settings, len) {
    var idPreferencias = $('#idPreferencias').val();
    var id_almacen = $("#seleccionarAlmacen").val();
    var tipoMenu = $("#tipoMenu").val();
    var registrosMostrar = len;
    var idUsuario = $('#idUsuario').val();
    var idMenu = $('#idMenu').val();
    var datos = new FormData();
    datos.append("idPreferencias", idPreferencias);
    datos.append("idUsuario", idUsuario);
    datos.append("idMenu", idMenu);
    datos.append("id_almacen", id_almacen);
    datos.append("tipoMenu", tipoMenu);
    datos.append("registrosMostrar", registrosMostrar);
    datos.append("guardarPreferencia", "guardarPreferencia");
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json", // Especificamos que esperamos recibir JSON como respuesta
        success: function (resultados) {
        }
    })

});*/

$(".guardarChapa").on("click", function () {
    var chapas = "chapas";
    var nombreChapa = $("#nuevoNombreChapa").val();
    var ubicacionChapa = $("#nuevaUbicacionChapa").val();
    var topicoChapa = $("#nuevoTopicoChapa").val();
    var datos = new FormData();
    datos.append("chapas", chapas);
    datos.append("nombreChapa", nombreChapa);
    datos.append("ubicacionChapa", ubicacionChapa);
    datos.append("topicoChapa",topicoChapa);
    ajax_icon_handlingSeguimiento("load");
    if (nombreChapa !== "" & ubicacionChapa !== "" & topicoChapa !== "" ) {
      $.ajax({
        url: "ajax/chapas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta == "ok") {
            ajax_icon_handlingchapas("ok");
          } else {
            ajax_icon_handlingchapas("error");
          }
        },
      });
    } else {
        ajax_icon_handlingchapas("vacio");
    }
  });

function ajax_icon_handlingchapas(type) {
    switch (type) {
        case 'load':
            Swal.fire({
                title: "",
                html: '<div class="save_loading"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>En proceso...</h4></div>',
                showConfirmButton: false,
                allowOutsideClick: true
            });
        break;

        case "ok":
        setTimeout(function () {
          Swal.fire({
            icon: "success",
            title: "Se guardo correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
          }).then(function (result) {
            if (result.value) {
              window.location = "chapas";
            }
          });
        }, 1000);
  
        break;

        case "error":
            Swal.fire({
            icon: "error",
            title: "¡No se pudo guardar de manera correcta!",
            });
        break;

        case "vacio":
            Swal.fire({
            icon: "error",
            title: "¡Los campos no pueden ir vacios o con caracteres especiales!",
            });
        break;

    }
}

