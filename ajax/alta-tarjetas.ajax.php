<?php

require_once "../controladores/alta-tarjetas.controlador.php";
require_once "../modelos/alta-tarjetas.modelo.php";

class AjaxTarjetas
{

    /*=============================================
    ALTA TAREJTA EN SISTEMA
    =============================================*/
    public $status;

    public $estadoSync;

    public function ajaxRegistrarTarjeta()
    {

        $item1 = "modo";
        $valor1 = $this->status;

        $item2 = "id";
        $valor2 = 1;

        //$respuesta = ControladorTarjetas::ctrRegistrarTarjeta($item1, $valor1, $item2, $valor2, $item3, $valor3);
        $respuesta = ControladorTarjetas::ctrRegistrarTarjeta($item1, $valor1, $item2, $valor2);

        echo json_encode($respuesta);
    }

    /*=============================================
    CONSULTAR MODO DE RFID TEMP
    =============================================*/
    public $idUsuarioC;
    public $idModo;

    public function ajaxConsultarRFID()
    {

        $item = "id";
        $valor = $this->idModo;

        $respuesta = ControladorTarjetas::ctrConsultarRFID($item, $valor);

        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR TARJETA
    =============================================*/
    public $idTarjeta;
    public function ajaxEliminarTarjeta()
    {

        $item = "id";
        $valor = $this->idTarjeta;
        
        $respuesta = ControladorTarjetas::ctrEliminarTarjeta($item, $valor);

        echo json_encode($respuesta);
    }
}

/*=============================================
DAR DE ALTA TARJETA DE EN SISTEMA
=============================================*/
if (isset($_POST["status"])) {

    $registrar = new AjaxTarjetas();
    $registrar->status = $_POST["status"];
    $registrar->ajaxRegistrarTarjeta();
}

/*=============================================
CONSULTAR MODO DE RFID TEMP
=============================================*/
if (isset($_POST["idModo"])) {

    $consultar = new AjaxTarjetas();
    $consultar->idModo = $_POST["idModo"];
    $consultar->ajaxConsultarRFID();
}


/*=============================================
ELIMINAR TARJETA
=============================================*/
if (isset($_POST["eliminarTarjeta"])) {
    $eliminar = new AjaxTarjetas();
    $eliminar->idTarjeta = $_POST["idTarjeta"];
    $eliminar->ajaxEliminarTarjeta();
}
