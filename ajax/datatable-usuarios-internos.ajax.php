<?php
require_once "../controladores/registro-usuarios.controlador.php";
require_once "../modelos/registro-usuarios.modelo.php";

class tablaUsuariosInternos
{
    public function mostrarTablaUsuariosInternos()
    {
        $item = "statusAcceso";
        $valor = "0";

        $informacioUsuario = ControladorRegistroUsuarios::ctrTraerInformacionUsuarios($item, $valor);

        // var_dump($informacioGenerador);
        if (count($informacioUsuario) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = array(
            "data" => array()
        );

        foreach ($informacioUsuario as $key => $value) {

            $nombre = $value["nombre"];
            $apellidoP = $value['apellidoPaterno'];
            $apellidoM = $value["apellidoMaterno"];

            $datosJson['data'][] = [
                $key + 1,
                $nombre,
                $apellidoP,
                $apellidoM
            ];
        }
        // Finalmente, fuera del bucle, generamos la respuesta JSON
        echo json_encode($datosJson, JSON_UNESCAPED_UNICODE);

    }
}
/*===========================
ACTIVAR TABLA DE USUARIOS INTERNOS
============================ */
$activarTablaUsuariosInternos = new tablaUsuariosInternos();
$activarTablaUsuariosInternos->mostrarTablaUsuariosInternos();
