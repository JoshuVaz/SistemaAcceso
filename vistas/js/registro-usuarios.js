/** @format */

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS INTERNOS
=============================================*/
$(".tablaUsuariosInternos").DataTable({
    ajax: "ajax/datatable-usuarios-internos.ajax.php",
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
CARGAR LA TABLA DINÁMICA DE USUARIOS EXTERNOS
=============================================*/
$(".tablaUsuariosExternos").DataTable({
  ajax: "ajax/datatable-usuarios-externos.ajax.php",
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
GUARDAR USUARIO INTERNO
=============================================*/
  $(".guardarUsuarioInterno").on("click", function () {
    var nuevaPersona = "nuevaPersona";
    var idTarjeta = "0";
    var statusAcceso = "0";
    var nombre = $("#nuevoNombre").val();
    var apellidoP = $("#nuevoApellidoP").val();
    var apellidoM = $("#nuevoApellidoM").val();
    var datos = new FormData();
    datos.append("nuevaPersona", nuevaPersona);
    datos.append("nombre", nombre);
    datos.append("apellidoP", apellidoP);
    datos.append("apellidoM", apellidoM);
    datos.append("idTarjeta",idTarjeta);
    datos.append("statusAcceso",statusAcceso);
    ajax_icon_handlingSeguimiento("load");
    if (nombre !== "" & apellidoP !== "" & apellidoM !== "" ) {
      $.ajax({
        url: "ajax/registro-usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta == "ok") {
            ajax_icon_handlingSeguimiento("usuarioInterno");
          } else if (respuesta == "existe") {
            ajax_icon_handlingSeguimiento("existe");
            $("#nuevoNombre").val("");
          } else {
            ajax_icon_handlingSeguimiento("error");
            $("#nuevoNombre").val("");
          }
        },
      });
    } else {
      ajax_icon_handlingSeguimiento("vacio");
    }
  });

/*=============================================
GUARDAR USUARIO Externo
=============================================*/
$(".guardarUsuarioExterno").on("click", function () {
  var nuevaPersona = "nuevaPersona";
  var idTarjeta = "0";
  var statusAcceso = "1";
  var nombre = $("#nuevoNombre").val();
  var apellidoP = $("#nuevoApellidoP").val();
  var apellidoM = $("#nuevoApellidoM").val();
  var datos = new FormData();
  datos.append("nuevaPersona", nuevaPersona);
  datos.append("nombre", nombre);
  datos.append("apellidoP", apellidoP);
  datos.append("apellidoM", apellidoM);
  datos.append("idTarjeta",idTarjeta);
  datos.append("statusAcceso",statusAcceso);
  ajax_icon_handlingSeguimiento("load");
  if (nombre !== "" & apellidoP !== "" & apellidoM !== "" ) {
    $.ajax({
      url: "ajax/registro-usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        if (respuesta == "ok") {
          ajax_icon_handlingSeguimiento("usuarioExterno");
        } else if (respuesta == "existe") {
          ajax_icon_handlingSeguimiento("existe");
          $("#nuevoNombre").val("");
        } else {
          ajax_icon_handlingSeguimiento("error");
          $("#nuevoNombre").val("");
        }
      },
    });
  } else {
    ajax_icon_handlingSeguimiento("vacio");
  }
});
  
/*=============================================
FUNCION LOADER 
=============================================*/
function ajax_icon_handlingSeguimiento(type) {
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

    case "existe":
      Swal.fire({
        icon: "error",
        title: "¡Ya existe la persona!",
      });
      break;

    case "error":
      Swal.fire({
        icon: "error",
        title: "¡No se pudo guardar de manera correcta!",
      });

      break;

    case "usuarioInterno":
      setTimeout(function () {
        Swal.fire({
          icon: "success",
          title: "Se guardo correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "usuarios-internos";
          }
        });
      }, 1000);

      break;

    case "usuarioExterno":
      setTimeout(function () {
        Swal.fire({
          icon: "success",
          title: "Se guardo correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then(function (result) {
          if (result.value) {
            window.location = "usuarios-externos";
          }
        });
      }, 1000);

      break;
  }
}
  