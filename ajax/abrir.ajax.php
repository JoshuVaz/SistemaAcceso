<?php

require_once "../controladores/historial-acceso.controlador.php";
require_once "../modelos/historial-acceso.modelo.php";

class AperturaChapa{

    static public function ajaxGuardarApertura($datos){

        //var_dump($datos);
        $valor1 = $datos["formaIngreso"];
        $valor2 = $datos["nombreIngreso"];
        $valor3 = $datos["chapaSeleccionada"];

        $item1 = "numero_tarjeta";
        $item2 = "nota";
        $item3 = "puerta";

        $respuesta = ControladorPuerta::ctrGuardarApertura($item1, $valor1, $item2, $valor2, $item3, $valor3);


        echo json_encode ($respuesta);

        
    }
}


/*=============================================
GUARDAR Y REALIZAR APERTURA PUERTA
=============================================*/

//var_dump(isset($_POST["realizarApertura"]));
if (isset($_POST["realizarApertura"])) {

    AperturaChapa::ajaxGuardarApertura($_POST);

}