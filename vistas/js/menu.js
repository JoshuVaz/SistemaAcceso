/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarMenu", function(){

	var idMenu = $(this).attr("idMenu");
	
	var datos = new FormData();
	datos.append("idMenu", idMenu);

	$.ajax({

		url:"ajax/menus.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarId").val(respuesta["id"]);
			$("#editarIcono").val(respuesta["icono"]);
			$("#editarRuta").val(respuesta["ruta"]);

		}

	});

})


/*=============================================
ELIMINAR MENU
=============================================*/
$(".tablas").on("click", ".btnEliminarMenu", function(){

  var idMenu = $(this).attr("idMenu");

  Swal.fire({
    title: '¿Está seguro de borrar el menu?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar menu!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=crearmenu&idMenu="+idMenu;

    }

  })

})

