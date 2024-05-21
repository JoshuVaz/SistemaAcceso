<?php
require_once "../controladores/historial-acceso.controlador.php";
require_once "../modelos/historial-acceso.modelo.php";

class tablaHistorialAcceso
{
    public function mostrarTablaHistorialAcceso()
    {
        $item = "aperturas";
        $valor = "0";

        $informacioUsuario = ControladorPuerta::ctrMostrarHistorialAcceso();

        // var_dump($informacioUsuario);
        if (count($informacioUsuario) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = array(
            "data" => array()
        );

        foreach ($informacioUsuario as $key => $value) {

            $numeroTarjeta = $value["numero_tarjeta"];
            $fecha = $value['fecha_hora'];
            $nota = $value["nota"];
            $puerta = $value["puerta"];

            $datosJson['data'][] = [
                $key + 1,
                $numeroTarjeta,
                $fecha,
                $nota,
                $puerta
            ];
        }
        // Finalmente, fuera del bucle, generamos la respuesta JSON
        echo json_encode($datosJson, JSON_UNESCAPED_UNICODE);

    }
}
/*===========================
ACTIVAR TABLA DE USUARIOS INTERNOS
============================ */
$activarTablaHistorialAcceso = new tablaHistorialAcceso();
$activarTablaHistorialAcceso->mostrarTablaHistorialAcceso();
