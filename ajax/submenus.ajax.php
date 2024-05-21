<?php

require_once "../controladores/submenu.controlador.php";
require_once "../modelos/submenu.modelo.php";

class AjaxSubMenus{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarSubMenu(){

		$item = "id";
		$valor = $this->idSubMenu;

		$respuesta = ControladorSubMenus::ctrMostrarSubMenu($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR MENU
=============================================*/
if(isset($_POST["idSubMenu"])){

	$editarsub = new AjaxSubMenus();
	$editarsub -> idSubMenu = $_POST["idSubMenu"];
	$editarsub -> ajaxEditarSubMenu();

}