<?php
require_once "../controladores/generadores.controlador.php";
require_once "../modelos/generadores.modelo.php";

class AjaxGeneradores
{

    public $generadores;
    public $nombre;
    public $ubicacion;

    public function ajaxMostrarGeneradores()
    {
        $nombre = $this->nombre;
        $ubicacion = $this->ubicacion;
        $respuesta = ControladorGeneradores::ctrCrearGeneradores($nombre, $ubicacion);

        // var_dump($respuesta);
        echo $respuesta;
    }
}

if (isset($_POST["generador"])) {
    $generadores =  new AjaxGeneradores();
    $generadores->nombre = $_POST["nuevoNombre"];
    $generadores->ubicacion = $_POST["nuevaUbicacion"];
    $generadores->ajaxMostrarGeneradores();
}
