<?php

require_once "../controladores/perfil.controlador.php";
require_once "../modelos/perfil.modelo.php";

class AjaxPerfil
{
    /*=============================================
	EDITAR USUARIO
	=============================================*/
    public $idusuario;

    public function ajaxEditarPerfil()
    {
        $tabla = "empleados";
        $item = "id";
        $valor = $this->idusuario;

        $respuesta = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	MOSTRAR AREA
	=============================================*/
    public $idArea;

    public function ajaxEditarArea()
    {
        $tabla = "area";
        $item = "id";
        $valor = $this->idArea;

        $respuesta = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	MOSTRAR ESTACION
	=============================================*/
    public $idEstacion;

    public function ajaxEditarEstacion()
    {
        $tabla = "estacion";
        $item = "id";
        $valor = $this->idEstacion;

        $respuesta = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	MOSTRAR SUCURSAL
	=============================================*/
    public $idSucursal;

    public function ajaxEditarSucursal()
    {
        $tabla = "sucursal";
        $item = "id";
        $valor = $this->idSucursal;

        $respuesta = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	MOSTRAR USUARIO
	=============================================*/
    public $id_usuario;

    public function ajaxEditarUsuario()
    {
        $tabla = "usuarios";
        $item = "id";
        $valor = $this->id_usuario;

        $respuesta = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);

        echo json_encode($respuesta);
    }

    /*==========================
    GENERAR CODIGO QR
    =========================== */
    public $qr;
    public function ajaxGenerarQr()
    {
        // $tabla = "empleados";
        $item = "id";
        $valor = $this->qr;
        $nombreUsuario = $this->nombreUsuario;

        $respuesta = ControladorPerfil::ctrGenerarQr($item, $valor, $nombreUsuario);

        echo json_encode($respuesta);
    }
}

/*=============================================
EDITAR USUARIO
=============================================*/
if (isset($_POST["idusuario"])) {

    $editar = new AjaxPerfil();
    $editar->idusuario = $_POST["idusuario"];
    $editar->ajaxEditarPerfil();
}
/*=============================================
MOSTRAR AREA
=============================================*/
if (isset($_POST["idArea"])) {
    $editar = new AjaxPerfil();
    $editar->idArea = $_POST["idArea"];
    $editar->ajaxEditarArea();
}
/*=============================================
MOSTRAR ESTACION
=============================================*/
if (isset($_POST["idEstacion"])) {
    $editar = new AjaxPerfil();
    $editar->idEstacion = $_POST["idEstacion"];
    $editar->ajaxEditarEstacion();
}
/*=============================================
MOSTRAR SUCURSAL
=============================================*/
if (isset($_POST["idSucursal"])) {
    $editar = new AjaxPerfil();
    $editar->idSucursal = $_POST["idSucursal"];
    $editar->ajaxEditarSucursal();
}
/*=============================================
MOSTRAR USUARIO
=============================================*/
if (isset($_POST["id_usuario"])) {
    $editar = new AjaxPerfil();
    $editar->id_usuario = $_POST["id_usuario"];
    $editar->ajaxEditarUsuario();
}

/*=============================================
MOSTRAR USUARIO
=============================================*/
// var_dump(isset($_POST["qr"]));
if (isset($_POST["qr"])) {
    // var_dump($_POST["id_usuario"]);
    $qr = new AjaxPerfil();
    $qr->qr = $_POST["qr"];
    $qr->nombreUsuario = $_POST["nombreUsuario"];
    $qr->ajaxGenerarQr();
}
