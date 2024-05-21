<?php

class ControladorTarjetas
{

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

    static public function ctrMostrarTarjetas($item, $valor)
    {

        $tabla = "tarjetas";

        $respuesta = ModeloTarjetas::mdlMostrarTarjetas($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    ALTA TARJETA DE EN SISTEMA
    =============================================*/

    static public function ctrRegistrarTarjeta($item1, $valor1, $item2, $valor2)
    {

        $tabla = "rfid_temp";

        $respuesta = ModeloTarjetas::mdlRegistrarTarjeta($tabla, $item1, $valor1, $item2, $valor2);

        return $respuesta;
    }

    /*=============================================
    CONSULTAR MODO DE RFID TEMP
    =============================================*/

    static public function ctrConsultarRFID($item, $valor)
    {

        $tabla = "rfid_temp";

        $respuesta = ModeloTarjetas::mdlConsultarRFID($tabla, $item, $valor);

        return $respuesta["modo"];
    }

    /*=============================================
    ELIMINAR TARJETA
    =============================================*/
    static public function ctrEliminarTarjeta($item, $valor)
    {
        $tabla = "tarjetas";

        $respuesta = ModeloTarjetas::mdlEliminarTarjeta($tabla, $item, $valor);

        return $respuesta;
    }
}
