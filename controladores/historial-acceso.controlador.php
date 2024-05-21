<?php

require dirname(__DIR__) . '/phpMQTT.php';

class ControladorPuerta
{
    /*==============================
        MOSTRAR UN SOLO PERFIL
    =============================== */
    public static function ctrMostrarPuerta($tabla,$item,$valor){

        $respuesta = ModeloPuerta::mdlMostrarPuerta($tabla,$item,$valor);
        return $respuesta;

    }
    
    public static function ctrGuardarApertura($item1, $valor1, $item2, $valor2, $item3, $valor3){

        $tabla = "aperturas";
        $respuesta = ModeloPuerta::mdlGuardarApertura($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);
        $server = '192.168.15.5';     // change if necessary
        $port = 1883;                     // change if necessary
        $username = 'dos';                   // set your username
        $password = 'dos';                   // set your password
        $client_id = 'phpMQTT-subscriber'; // make sure this is unique for connecting to sever - you could use uniqid()
        $topic = $valor3;
        $mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
        if ($topic == "chapaexterna/externa") {
            if ($mqtt->connect(true, NULL, $username, $password)) {
                $mqtt->publish("comandoexterno/" . $topic, 'apertura');
                $mqtt->close();
            } else {
                echo "Time out!\n";
            }
        } else {
            if ($mqtt->connect(true, NULL, $username, $password)) {
                $mqtt->publish("comando/" . $topic, 'apertura ');
                $mqtt->close();
            } else {
                echo "Time out!\n";
            }
        }
        //var_dump($respuesta);
        return $respuesta;
    }
    /*=============================================
	MOSTRAR APERTURAS CHAPAS 
	=============================================*/
    static public function ctrMostrarAperturasFiltrado($fechaInicial, $fechaFinal)
    {
        $tabla = "aperturas";
        $respuesta = ModeloPuerta::mdlMostrarAperturaFiltrado($tabla, $fechaInicial, $fechaFinal);
        // var_dump($respuesta);
        return $respuesta;
    }

    /*=============================================
	MOSTRAR APERTURAS CHAPAS 
	=============================================*/
    static public function ctrMostrarHistorialAcceso()
    {
        $tabla = "aperturas";
        $respuesta = ModeloPuerta::mdlMostrarHistorialAcceso($tabla);
        //var_dump($respuesta);
        return $respuesta;
    }
    
    /*=============================================
	MOSTRAR APERTURAS CHAPAS TARJETAS

	=============================================*/
    static public function ctrMostrarAperturasFiltradoTarjeta($fechaInicial, $fechaFinal)
    {
        $tabla = "aperturas";
        $tabla2 = "tarjetas";
        $tabla3 = "empleados";
        $respuesta = ModeloPuerta::mdlMostrarAperturaFiltradoTarjetas($tabla, $tabla2, $tabla3, $fechaInicial, $fechaFinal);
        // var_dump($respuesta);
        return $respuesta;
    }
}

