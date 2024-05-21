<?php
// require "extras/vendor/autoload.php";
// require "utils/limpiar.controlador.php";

// use Automattic\WooCommerce\Client;

class ControladorAsignarTarjetas
{

    /*=============================================
	MOSTRAR TARJETAS
	=============================================*/

    static public function ctrMostrarAsignarTarjetas($item, $valor)
    {

        $tabla = "registro_usuarios";
        $tabla2 = "tarjetas";

        $respuesta = ModeloAsignarTarjetas::mdlMostrarAsinarTarjetas($tabla, $tabla2, $item, $valor);

        return $respuesta;
    }

    /*==============================
        MOSTRAR TARJETAS
    =============================== */
    public static function ctrMostrarTarjetasNoAsignadas($tabla, $item, $valor)
    {

        $respuesta = ModeloAsignarTarjetas::mdlMostrarTarjetasNoAsignadas($tabla, $item, $valor);

        return $respuesta;
    }

    /*==============================
        ASIGNAR TARJETAS
    =============================== */
    public static function ctrAsignarTarjeta($usuario, $tarjeta)
    {

        $tabla = "registro_usuarios";
        $tabla2 = "tarjetas";

        $datos = array(
            "usuario" => $usuario,
            "id_tarjeta" => $tarjeta
        );

        $datos2 = array(
            "id" => $tarjeta,
            "asignado" => 1
        );

        ModeloAsignarTarjetas::mdlAsignarTarjetasEmpleado($tabla, $datos);
        $respuesta = ModeloAsignarTarjetas::mdlAsignarTarjetas($tabla2, $datos2);

        return $respuesta;
    }

    /*==============================
        DESASIGNAR TARJETAS
    =============================== */
    public static function ctrDesasignarTarjeta($usuario, $tarjeta)
    {

        $tabla = "registro_usuarios";
        $tabla2 = "tarjetas";

        $datos = array(
            "usuario" => $usuario,
            "id_tarjeta" => 0
        );

        $datos2 = array(
            "id" => $tarjeta,
            "asignado" => 0
        );

        ModeloAsignarTarjetas::mdlAsignarTarjetasEmpleado($tabla, $datos);
        $respuesta = ModeloAsignarTarjetas::mdlAsignarTarjetas($tabla2, $datos2);

        return $respuesta;
    }
}
