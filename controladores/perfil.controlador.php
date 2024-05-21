<?php

require 'extras/phpqrcode/qrlib.php';

class ControladorPerfil
{

    /*================================
        CREAR NUEVO USUARIO
    ================================= */
    public static function ctrNuevoEmpelado()
    {
        // var_dump(isset($_POST["nuevoIdUsuario"]));
        if (isset($_POST["nuevoNombre"])) {

            $tabla = "empleados";

            $datos = array(
                "nombreEmpleado" => $_POST["nuevoNombre"],
                "apellido_paterno" => $_POST["nuevoApellidoPaterno"],
                "apellido_materno" => $_POST["nuevoApellidoMaterno"],
                "telefono" => $_POST["nuevotelefono"],
                "seguro" => $_POST["nuevoseguro"],
                "alergias" => $_POST["nuevasalergias"],
                "correo" => $_POST["nuevomail"],
                "idArea" => $_POST["nuevaArea"],
                "idEstacion" => $_POST["nuevaEstacion"],
                "idSucursal" => $_POST["nuevaSucursal"],
                "fecha_ingreso" => $_POST["nuevafechaIngreso"],
                "id_usuario" => $_POST["nuevoIdUsuario"]
            );

            $respuesta = ModeloPerfil::mdlInrgesarEmpleado($tabla, $datos);
            // echo $respuesta;
            if ($respuesta == "ok") {

                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Se a creado de manera correcta ",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {

                                window.location = "catalogos";

                            }
                        })
                    </script>';
            }
        }
    }


    /*==============================
        MOSTRAR UN SOLO PERFIL
    =============================== */
    public static function ctrMostrarPerfil($tabla, $item, $valor)
    {
        // $tabla = "empleados";

        $respuesta = ModeloPerfil::mdlMostrarPerfil($tabla, $item, $valor);

        return $respuesta;
    }

    /*==============================
        MOSTRAR VARIOS PERFILES
    ================================= */
    public static function ctrMostrarPerfiles($item, $valor)
    {
        $tabla = "usuarios";
        $tabla2 = "empleados";
        $tabla3 = "estacion";
        $tabla4 = "sucursal";
        $tabla5 = "area";

        $respuesta = ModeloPerfil::mdlMostrarPerfiles($tabla, $tabla2, $tabla3, $tabla4, $tabla5, $item, $valor);

        return $respuesta;
    }

    /*===================================
        EDITAR EMPLEADOS
    ==================================== */
    public static function ctrEditarEmpleado()
    {
        // var_dump($_POST["editarIdUsuarioSelect"]);
        if (isset($_POST["editarNombre"])) {
            $tabla = "empleados";

            $datos = array(
                "nombreEmpleado" => $_POST["editarNombre"],
                "id" => $_POST["editarId"],
                "apellido_paterno" => $_POST["editarApellidoPaterno"],
                "apellido_materno" => $_POST["editarApellidoMaterno"],
                "telefono" => $_POST["editartelefono"],
                "seguro" => $_POST["editarseguro"],
                "alergias" => $_POST["editaralergias"],
                "correo" => $_POST["mail"],
                "idArea" => $_POST["editarAreaSelect"],
                "idEstacion" => $_POST["editarEstacionSelect"],
                "idSucursal" => $_POST["editarSucursalSelect"],
                "fecha_ingreso" => $_POST["fechaIngreso"],
                "id_usuario" => $_POST["editarIdUsuarioSelect"],

            );

            $respuesta = ModeloPerfil::mdlEditarEmpleado($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                Swal.fire({
                      icon: "success",
                      title: "El usuario ha sido editado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "catalogos";

                                }
                            })

                </script>';
            }
        }
    }

    /*===================================
        EDITAR FOTO PERFIL 
    ==================================== */
    public static function ctrEditarFoto()
    {
        if (isset($_POST["fotoActual"])) {

            /*=============================================
				VALIDAR IMAGEN
				=============================================*/

            $ruta = $_POST["fotoActual"];
            if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

                $directorio = "vistas/img/usuarios/" . $_SESSION["usuario"];

                /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

                if (!empty($_POST["fotoActual"])) {

                    unlink($_POST["fotoActual"]);
                } else {

                    mkdir($directorio, 0755);
                }

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/usuarios/" . $_SESSION["usuario"] . "/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["editarFoto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/usuarios/" . $_SESSION["usuario"] . "/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }
            $tabla = "usuarios";

            $datos = array(
                "usuario" => $_SESSION["usuario"],
                "foto" => $ruta
            );

            $respuesta = ModeloPerfil::mdlEditarFoto($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>
    
                Swal.fire({
                      icon: "success",
                      title: "La foto se actualizado de manera correcta",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result) {
                                if (result.value) {
    
                                window.location = "perfil";
    
                                }
                            })
    
                </script>';
            } else {

                echo '<script>

					Swal.fire({
						  icon: "error",
						  title: "No se pudo subir la foto",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "perfil";

							}
						})

			  	</script>';
            }
        }
    }

    /*====================================
        EDITAR PASSWROD PERFIL
    ===================================== */
    public static function ctrEditarPassword()
    {
        if (isset($_POST["contrasena"])) {

            $tabla = "usuarios";

            if ($_POST["contrasena"] != "") {

                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["contrasena"])) {

                    $encriptar = crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                } else {

                    echo '<script>

                            Swal.fire({
                                  icon: "error",
                                  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result) {
                                    if (result.value) {

                                    window.location = "usuarios";

                                    }
                                })

                          </script>';

                    return;
                }
            } else {

                $encriptar = $_POST["passwordActual"];
            }

            $datos = array(
                "usuario" => $_SESSION["usuario"],
                "password" => $encriptar
            );

            $respuesta = ModeloPerfil::mdlEditarPassword($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                Swal.fire({
                      icon: "success",
                      title: "La contraseña se a modificado de manera correcta",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result) {
                                if (result.value) {

                                window.location = "perfil";

                                }
                            })

                </script>';
            }
        }
    }


    /*===================================
    GENERAR CODIGO QR
    ===================================== */

    public static function  ctrGenerarQr($item2, $valor2, $nombreUsuario)
    {
        $tabla = "empleados";

        $info = ModeloPerfil::mdlMostrarPerfil($tabla, $item2, $valor2);

        $item = "qr";

        $ubicacion = '../vistas/img/qr/' . $nombreUsuario . '.png';

        $cadena1 = "Nombre completo: " . $info["nombreEmpleado"] . " " . $info["apellido_paterno"] . " " . $info["apellido_materno"] . "\n" . "Telefono de emergencias: " . $info["telefono_emergencias"] . "\n" . "Numero de seguro social: " . $info["numero_seguro_social"] . "\n" . "Alergias: " . $info["alergias"];

        $tamanio = 3;

        $level = 'H';

        $frameSize = 1;

        $contenidoqr = $cadena1;

        QRcode::png($contenidoqr, $ubicacion, $level, $tamanio, $frameSize);

        $respuesta = ModeloPerfil::mdlActualizaQr($tabla, $item, $ubicacion, $item2, $valor2);
        // var_dump($respuesta);

        $retorno = [
            "qr" => '' . $info["qr"] . ''
        ];

        return $retorno;
    }
}
