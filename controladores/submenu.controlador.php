<?php

class ControladorSubMenus{

	/*=============================================
	REGISTRO DE MENU
	=============================================*/

	static public function ctrCrearSubMenu(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["seleccionarMenu"]) || preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				$tabla = "submenu";

				$datos = array("id_menu" => $_POST["seleccionarMenu"],
							   "nombre" => $_POST["nuevoNombre"],
							   "icono" => $_POST["nuevoIcono"],
							   "ruta" => $_POST["nuevoRuta"]);

				$respuesta = ModeloSubMenus::mdlIngresarSubMenu($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						icon: "success",
						title: "¡El submenu ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crearsubmenu";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					Swal.fire({

						icon: "error",
						title: "¡El submenu no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crearsubmenu";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR MENU
	=============================================*/

	static public function ctrMostrarSubMenu($item, $valor){

		$tabla1 = "submenu";
		$tabla2 = "menu";

		$respuesta = ModeloSubMenus::mdlMostrarSubMenu($tabla1, $tabla2, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR MENU TODO
	=============================================*/

	static public function ctrMostrarSubMenuTodo($item, $valor){

		$tabla1 = "submenu";
		$tabla2 = "menu";

		$respuesta = ModeloSubMenus::mdlMostrarSubMenuTodo($tabla1, $tabla2, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	EDITAR MENU
	=============================================*/

	static public function ctrEditarSubMenu(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarseleccionarMenu"]) || preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) ){

				$tabla = "submenu";

				$datos = array("nombre" => $_POST["editarNombre"],
							   "id" => $_POST["editarId"],
							   "id_menu" => $_POST["editarseleccionarMenu"],
							   "icono" => $_POST["editarIcono"],
							   "ruta" => $_POST["editarRuta"]);

				$respuesta = ModeloSubMenus::mdlEditarSubMenu($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					Swal.fire({
						  icon: "success",
						  title: "El submenu ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "crearsubmenu";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					Swal.fire({
						  icon: "error",
						  title: "¡El submenu no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "crearsubmenu";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR MENU
	=============================================*/

	static public function ctrBorrarSubMenu(){

		if(isset($_GET["idSubMenu"])){

			$tabla ="submenu";
			$datos = $_GET["idSubMenu"];

			$respuesta = ModeloSubMenus::mdlBorrarSubMenu($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El submenu ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "crearsubmenu";

								}
							})

				</script>';

			}		

		}

	}


}
	


