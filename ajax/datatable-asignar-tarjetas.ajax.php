<?php
require_once "../controladores/asignar-tarjetas.controlador.php";
require_once "../modelos/asignar-tarjetas.modelo.php";

class tablaAsignarTarjetas
{
    public function mostrarTablaAsginarTarjetas()
    {
        $item = null;
        $valor = null;

        $tarjetas = ControladorAsignarTarjetas::ctrMostrarAsignarTarjetas($item, $valor);

        // var_dump($tarjetas);

        if (count($tarjetas) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';


        for ($i = 0; $i < count($tarjetas); $i++) {

            // DESASIGNAR TARJETA
            $botones = "<div class='btn-group'><button class='btn btn-danger btnDesasignarTarjeta' idUsuario='" . $tarjetas[$i]["id"] . "' idTarjeta='" . $tarjetas[$i]["idTarjeta"] . "'><i class='fas fa-times'></i></button></div>";

            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $tarjetas[$i]["nombre"] .  '",
                "' . $tarjetas[$i]["numero_tarjeta"] . '",
                "' . $botones . '"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   '] 
  
           }';

        echo $datosJson;
    }
}
/*===========================
ACTIVAR TABLA DE CREDENCIALES
============================ */
$activarAsignarTarjetas = new tablaAsignarTarjetas();
$activarAsignarTarjetas->mostrarTablaAsginarTarjetas();
