<?php

include_once "../controladores/asignar-tarjetas.controlador.php";
include_once "../modelos/asignar-tarjetas.modelo.php";


class AjaxAsignarTarejtas
{
    public $guardar;
    public $asignarUsuario;
    public $asignarTarjeta;

    public function ajaxAsignacionDeTarjeta()
    {

        $asignarTarjeta = $this->asignarTarjeta;
        $asignarUsuario = $this->asignarUsuario;

        $respuesta = ControladorAsignarTarjetas::ctrAsignarTarjeta($asignarUsuario, $asignarTarjeta);

        echo $respuesta;
    }

    public $desasignar;
    public $idUsuario;
    public $idTarjeta;
    public function ajaxDesasignacionDeTarjeta()
    {

        $idUsuario = $this->idUsuario;
        $idTarjeta = $this->idTarjeta;
        // var_dump($idUsuario);
        // var_dump($idTarjeta);
        $respuesta = ControladorAsignarTarjetas::ctrDesasignarTarjeta($idUsuario, $idTarjeta);

        echo $respuesta;
    }
}

/*===========================
ASIGNAR TARJETA
============================ */
if (isset($_POST["asignar"])) {
    $guardar = new AjaxAsignarTarejtas();
    $guardar->asignarUsuario = $_POST["usuario"];
    $guardar->asignarTarjeta = $_POST["tarjeta"];
    $guardar->ajaxAsignacionDeTarjeta();
}

/*===========================
DESASIGNAR TARJETA
============================ */
if (isset($_POST["desasignar"])) {
    $desasignar = new AjaxAsignarTarejtas();
    $desasignar->idUsuario = $_POST["idUsuario"];
    $desasignar->idTarjeta = $_POST["idTarjeta"];
    $desasignar->ajaxDesasignacionDeTarjeta();
}
