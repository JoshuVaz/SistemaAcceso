<?php

require_once "../controladores/menu.controlador.php";
require_once "../modelos/menu.modelo.php";

class AjaxMenus{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarMenu(){

		$item = "id";
		$valor = $this->idMenu;

		$respuesta = ControladorMenus::ctrMostrarMenu($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR MENU
=============================================*/
if(isset($_POST["idMenu"])){

	$editar = new AjaxMenus();
	$editar -> idMenu = $_POST["idMenu"];
	$editar -> ajaxEditarMenu();

}