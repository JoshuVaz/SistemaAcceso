<?php

use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

require_once "../controladores/historial-acceso.controlador.php";
require_once "../modelos/historial-acceso.modelo.php";

class historialAcceso
{
    /*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/
    public function mostrarTablaPuertas()
    {
        $fechaInicial = $_GET["fechaInicial"];
        $fechaFinal = $_GET["fechaFinal"];
        // var_dump($fechaInicial);
        $fecha = ControladorPuerta::ctrMostrarAperturasFiltrado($fechaInicial, $fechaFinal);
        // var_dump($fecha);
        if (count($fecha) == 0) {
            echo '{"data": []}';
            return;
        }
        $datosJson = '{
		  "data": [';
        $j = 1;
        for ($i = 0; $i < count($fecha); $i++) {
            if ($fecha[$i]["numero_tarjeta"] == "Manual") {
                $datosJson .= '[
                    "' . $j . '",
                      "' . $fecha[$i]["numero_tarjeta"] . '",
                      "' . $fecha[$i]["nota"] . '",
                      "' . $fecha[$i]["puerta"] . '"
                    ],';
                $j++;
            } else {
            }
        }
        $tarjeta = ControladorPuerta::ctrMostrarAperturasFiltradoTarjeta($fechaInicial, $fechaFinal);
        if (count($tarjeta) == 0) {
            echo '{"data": []}';
            return;
        }
        for ($x = 0; $x < count($tarjeta); $x++) {
            $datosJson .= '[
                "' . $j . '",
                  "' . $tarjeta[$x]["nombreEmpleado"] . '",
                  "' . $tarjeta[$x]["nota"] . '",
                  "' . $tarjeta[$x]["puerta"] . '"
                ],';
            $j++;
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 
		 }';
        echo $datosJson;
    }

    

}
/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductos = new historialAcceso();
$activarProductos->mostrarTablaPuertas();



