<?php
require_once "../controladores/alta-tarjetas.controlador.php";
require_once "../modelos/alta-tarjetas.modelo.php";

class tablaTarjetas
{
    public function mostrarTablaTarjetas()
    {
        $item = null;
        $valor = null;

        $tarjetas = ControladorTarjetas::ctrMostrarTarjetas($item, $valor);

        if (count($tarjetas) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{
            "data": [';


        for ($i = 0; $i < count($tarjetas); $i++) {
            // var_dump($tarjetas["detalle"][$i]["nombre"]);

            $botones = "<div class='btn-group'><button class='btn btn-danger btnEliminarTarjeta' idTarjeta='" . $tarjetas[$i]["id"] . "'><i class='fa fa-times'></i></button></div>";
            if ($tarjetas[$i]["asignado"] == 0) {

                $datosJson .= '[
                    "' . $tarjetas[$i]["id"] . '",
                    "' . $tarjetas[$i]["numero_tarjeta"] . '",
                    "' . $botones . '"
                ],';
            }
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
$activarTarjetas = new tablaTarjetas();
$activarTarjetas->mostrarTablaTarjetas();
