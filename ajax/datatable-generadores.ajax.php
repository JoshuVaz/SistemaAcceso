<?php
require_once "../controladores/generadores.controlador.php";
require_once "../modelos/generadores.modelo.php";

class tablaGeneradores
{
    public function mostrarTablaGeneradores()
    {
        $item = null;
        $valor = null;

        $informacioGenerador = ControladorGeneradores::ctrMostrarGeneradores($item, $valor);

        // var_dump($informacioGenerador);
        if (count($informacioGenerador) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';


        for ($i = 0; $i < count($informacioGenerador); $i++) {

            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $informacioGenerador[$i]["identificador"] . '",
                "' . $informacioGenerador[$i]["nombre"] . '",
                "' . $informacioGenerador[$i]["password"] . '",
                "' . $informacioGenerador[$i]["ubicacion"] . '"
            ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 

        }';

        echo $datosJson;
    }
}
/*===========================
ACTIVAR TABLA DE informacioGenerador
============================ */
$activarGeneradores = new tablaGeneradores();
$activarGeneradores->mostrarTablaGeneradores();
