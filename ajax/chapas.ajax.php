<?php
require_once "../controladores/chapas.controlador.php";
require_once "../modelos/chapas.modelo.php";
class AjaxChapas
{

    static public function ajaxMostrarChapas($datos)
    {
        $nombre = $datos["nombreChapa"];
        $ubicacion = $datos["ubicacionChapa"];
        $topico = $datos["topicoChapa"];

        $respuesta = ControladorChapas::ctrCrearChapa($nombre, $ubicacion, $topico);
        //var_dump($respuesta);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["chapas"])) {

    AjaxChapas::ajaxMostrarChapas($_POST);

}
