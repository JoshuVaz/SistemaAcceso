/*=============================================
EDITAR SUBMENU
=============================================*/
$(".tablas").on("click", ".btnEditarSubMenu", function(){

	var idSubMenu = $(this).attr("idSubMenu");
	
	var datos = new FormData();
	datos.append("idSubMenu", idSubMenu);

	$.ajax({

		url:"ajax/submenus.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarMenu").html(respuesta["menu"]);
			$("#editarMenu").val(respuesta["idmenu"]);
			$("#editarNombre").val(respuesta["submenu"]);
			$("#editarId").val(respuesta["idsubmenu"]);
			$("#editarIcono").val(respuesta["icono"]);
			$("#editarRuta").val(respuesta["ruta"]);

		}

	});

})


/*=============================================
ELIMINAR MENU
=============================================*/
$(".tablas").on("click", ".btnEliminarSubMenu", function(){

  var idSubMenu = $(this).attr("idSubMenu");

  Swal.fire({
    title: '¿Está seguro de borrar el submenu?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar submenu!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=crearsubmenu&idSubMenu="+idSubMenu;

    }

  })

})

