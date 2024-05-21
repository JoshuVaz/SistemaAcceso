<?php
require_once "../controladores/chapas.controlador.php";
require_once "../modelos/chapas.modelo.php";

class tablaChapas
{
    public function mostrarTablaChapas()
    {
        $item = null;
        $valor = null;
        $Chapas = ControladorChapas::ctrMostrarChapas($item, $valor);
        if (count($Chapas) == 0) {
            echo '{"data": []}';
            return;
        }
        //var_dump($Chapas);
        $datosJson = '{
            "data": [';
        for ($i = 0; $i < count($Chapas); $i++) {
            $datosJson .= '[
                "' . ($i + 1) . '",
                "' . $Chapas[$i]["identificador"] . '",
                "' . $Chapas[$i]["nombre"] . '",
                "' . $Chapas[$i]["password"] . '",
                "' . $Chapas[$i]["ubicacion"] . '",
                "' . $Chapas[$i]["topico"] . '"
            ],';
        }
        $datosJson = substr($datosJson, 0, -1);
        $datosJson .=   '] 
        }';
        echo $datosJson;
    }
}

/*===========================
ACTIVAR TABLA DE Chapas
============================ */
$activarChapas = new tablaChapas();
$activarChapas->mostrarTablaChapas();

