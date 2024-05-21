<?php

class ControladorMenus{

	/*=============================================
	REGISTRO DE MENU
	=============================================*/

	static public function ctrCrearMenu(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				$tabla = "menu";

				$datos = array("nombre" => $_POST["nuevoNombre"],
							   "icono" => $_POST["nuevoIcono"],
							   "ruta" => $_POST["nuevoRuta"]);

				$respuesta = ModeloMenus::mdlIngresarMenu($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						icon: "success",
						title: "¡El menu ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "crearmenu";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					Swal.fire({

						icon: "error",
						title: "¡El menu no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR MENU
	=============================================*/

	static public function ctrMostrarMenu($item, $valor){

		$tabla = "menu";

		$respuesta = ModeloMenus::mdlMostrarMenu($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR MENU
	=============================================*/

	static public function ctrEditarMenu(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "menu";

				$datos = array("nombre" => $_POST["editarNombre"],
							   "id" => $_POST["editarId"],
							   "icono" => $_POST["editarIcono"],
							   "ruta" => $_POST["editarRuta"]);

				$respuesta = ModeloMenus::mdlEditarMenu($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					Swal.fire({
						  icon: "success",
						  title: "El menu ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "crearmenu";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					Swal.fire({
						  icon: "error",
						  title: "¡El menu no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "crearmenu";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR MENU
	=============================================*/

	static public function ctrBorrarMenu(){

		if(isset($_GET["idMenu"])){

			$tabla ="menu";
			$datos = $_GET["idMenu"];

			$respuesta = ModeloMenus::mdlBorrarMenu($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El menu ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "crearmenu";

								}
							})

				</script>';

			}		

		}

	}


}
	


