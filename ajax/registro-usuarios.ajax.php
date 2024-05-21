<?php

require_once "../controladores/registro-usuarios.controlador.php";
require_once "../modelos/registro-usuarios.modelo.php";

class AjaxRegistroUsuarios {

    static public function ajaxGuardarUsuario($datos) {

        //var_dump($datos);

        $nombre = $datos["nombre"];
        $apellidoP = $datos["apellidoP"];
        $apellidoM = $datos["apellidoM"];
        $idTarjeta = $datos["idTarjeta"];
        $statusAcceso = $datos["statusAcceso"];

        $arrayDatos = array(
            "nombre" => $nombre,
            "apellidoP" => $apellidoP,
            "apellidoM" => $apellidoM,
            "idTarjeta" => $idTarjeta,
            "statusAcceso" => $statusAcceso
        );
        
        //var_dump($arrayDatos);
        $respuesta = ControladorRegistroUsuarios::ctrGuardarUsuario($arrayDatos);

        echo json_encode($respuesta);
    }
}


if (isset($_POST["nuevaPersona"])) {
    AjaxRegistroUsuarios::ajaxGuardarUsuario($_POST);
}
