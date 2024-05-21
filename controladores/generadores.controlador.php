<?php

class ControladorGeneradores
{

    static public function ctrMostrarGeneradores($item, $valor)
    {
        $tabla = 'generadores';

        $respuesta = ModeloGeneradores::mdlMostrarGeneradores($tabla, $item, $valor);


        return  $respuesta;
    }

    /*=============================================
	CREAR CHAPA
	=============================================*/

    static public function ctrCrearGeneradores($nombre, $ubicacion)
    {

        /* RANDOW DE 8 DIGITOS DEL PASSWORD */
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        /* RANDOW DE 4 DIGITOS DEL IDENTIFICADOR */
        $rango = 4;
        $nuemeros = '0123456789';
        $numerosLength = strlen($nuemeros);
        $randomInt = '';

        for ($i = 0; $i < $rango; $i++) {
            $randomInt .= $nuemeros[rand(0, $numerosLength - 1)];
        }

        $identificador = "ESP-" . $randomInt;

        $tabla = "generadores";

        $datos = array(
            "nombreGenerador" => $nombre,
            "ubicacion" => $ubicacion,
            "password" => $password,
            "identificador" => $identificador
        );

        $respuesta = ModeloGeneradores::mdlCreaGeneradores($tabla, $datos);

        return $respuesta;
    }
}
