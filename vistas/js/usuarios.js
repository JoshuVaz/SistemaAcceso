

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function () {

	var imagen = this.files[0];

	/*=============================================
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
		=============================================*/

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".nuevaFoto").val("");

		Swal.fire({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			icon: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function (event) {

			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);

		})

	}
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function () {

	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);
			$("#passwordActual").val(respuesta["password"]);

			if (respuesta["foto"] != "") {

				$(".previsualizarEditar").attr("src", respuesta["foto"]);

			} else {

				$(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");

			}

		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function () {

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
	datos.append("activarId", idUsuario);
	datos.append("activarUsuario", estadoUsuario);

	$.ajax({

		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			Swal.fire({
				title: "El usuario ha sido actualizado",
				icon: "success",
				confirmButtonText: "¡Cerrar!"
			}).then(function (result) {
				if (result.value) {

					window.location = "usuarios";

				}


			});

		}

	})

	if (estadoUsuario == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario', 1);

	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoUsuario', 0);

	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function () {

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			if (respuesta) {

				$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

				$("#nuevoUsuario").val("");
				$("#nuevoUsuario").focus();

			}

		}

	})

})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function () {

	var idUsuario = $(this).attr("idUsuario");
	var fotoUsuario = $(this).attr("fotoUsuario");
	var usuario = $(this).attr("usuario");

	Swal.fire({
		title: '¿Está seguro de borrar el usuario?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar usuario!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario + "&usuario=" + usuario + "&fotoUsuario=" + fotoUsuario;

		}

	})

})

/*=============================================
TRAER PERMISOS DE USUARIO
=============================================*/
$(".tablas").on("click", ".btnEditarPermisos", function () {

	var traer = "traer";
	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
	datos.append("traer", traer);
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url: "ajax/permisos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (data) {

			var html = '';

			var i;
			var q = 1;

			for (i = 0; i < data.length; i++) {
				html += '<tr>' +
					'<td>' + q + '</td>' +
					'<td>' + data[i].menu + '</td>' +
					'<td>' + data[i].submenu + '</td>' +
					'<td>' + data[i].boton + '</td>' +
					'</tr>';
				q++;

			}

			$("#permisosId").val(idUsuario);
			$('#tablaPermisos').html(html);

		}

	})

})

/*=============================================
OTORGANDO PERMISOS
=============================================*/
$(".tablaPermisos").on("click", ".btnEditarPermisos", function () {

	var estadoPermiso = $(this).attr("estadoPermiso");
	var valorPermiso = $(this).val();
	var estadoPermisoOcultoEtiqueta = $(this).parent().children(".btnEditarPermisosOculto");
	var valorPermisoOcultoEtiqueta = $(this).parent().children(".btnEditarPermisosOculto");
	// var estadoPermisoOculto         = $(this).parent().children(".btnEditarPermisosOculto").attr("estadoPermisoOculto");
	// var valorPermisoOculto          = $(this).parent().children(".btnEditarPermisosOculto").val();

	if (estadoPermiso == 0) {

		$(this).attr('estadoPermiso', 1);
		$(this).val(1);
		$(estadoPermisoOcultoEtiqueta).attr("estadoPermisoOculto", 1);
		$(valorPermisoOcultoEtiqueta).val(1);

	} else {

		$(this).attr('estadoPermiso', 0);
		$(this).val(0);
		$(estadoPermisoOcultoEtiqueta).attr("estadoPermisoOculto", 0);
		$(valorPermisoOcultoEtiqueta).val(0);

	}

})

/*=============================================
OTORGANDO PERMISOS
=============================================*/
$("#formPermisos").on("submit", function (event) {

	event.preventDefault();

	var forma = JSON.stringify($(this).serializeArray());

	var grabar = "grabar";
	var datos = new FormData();
	datos.append("grabar", grabar);
	datos.append("arreglo", forma);

	ajax_icon_handling('load');

	$.ajax({

		url: "ajax/permisos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false, dataType: "json",
		success: function (respuesta) {

			if (respuesta == "ok") {

				ajax_icon_handlingp(true);

			} else {

				ajax_icon_handlingp(false);

			}

		}

	})

})




/*=============================================
FUNCION LOADER 
=============================================*/
function ajax_icon_handlingp(type) {

	switch (type) {

		case 'load':
			Swal.fire({
				title: "",
				html: '<div class="save_loading"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>En proceso...</h4></div>',
				showConfirmButton: false,
				allowOutsideClick: true
			});

			break;

		case false:

			setTimeout(function () {

				Swal.fire({
					icon: "error",
					title: "Los permisos no han sido asignados",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {

						window.location = "usuarios";

					}
				})
			}, 1000);

			break;

		case true:

			setTimeout(function () {

				Swal.fire({
					icon: "success",
					title: "Permisos asignados correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {

						window.location = "usuarios";

					}
				})
			}, 1000);

			break;
	}
}

function ajax_icon_handling(type) {

	switch (type) {

		case 'load':
			Swal.fire({
				title: "",
				html: '<div class="save_loading"><svg viewcard="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div><div><h4>En proceso...</h4></div>',
				showConfirmButton: false,
				allowOutsideClick: true
			});

			break;

		case false:

			setTimeout(function () {

				Swal.fire({
					icon: "error",
					title: "Los produtos no han sido recuperados",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {

						window.location = "productos";

					}
				})
			}, 1000);

			break;

		case true:

			setTimeout(function () {

				Swal.fire({
					icon: "success",
					title: "Productos recuperados correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {

						window.location = "productos";

					}
				})
			}, 1000);

			break;
	}
}
