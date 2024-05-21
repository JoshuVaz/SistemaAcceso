<?php 

require_once "../controladores/permisos.controlador.php";
require_once "../modelos/permisos.modelo.php";

require_once "../controladores/menu.controlador.php";
require_once "../modelos/menu.modelo.php";

require_once "../controladores/submenu.controlador.php";
require_once "../modelos/submenu.modelo.php";

require_once "../controladores/utils/limpiar.controlador.php";

class AjaxPermisos{

	/*=============================================
	TRAER PERMISOS
	=============================================*/	

	public $traer;
	public $idUsuario;

	public function ajaxTraerPermisos(){

		$idUsuario = $this->idUsuario;

		$respuesta = ControladorPermisos::ctrTraerPermisos($idUsuario);

		if ($respuesta == "error") {
			
			echo $respuesta;
			
		}else{

			echo $respuesta;
		}

	}
	/*=============================================
	GRABAR PERMISOS
	=============================================*/	
	public $arreglo;

	public function ajaxGrabarPermisos(){

		$arreglo = $this->arreglo;

		$respuesta = ControladorPermisos::ctrGrabarPermisos($arreglo);

		if ($respuesta == "error") {
			
			echo json_encode($respuesta);
			
		}else{

			echo json_encode($respuesta);
		}

	}
}

/*=============================================
TRAER PERMISOS
=============================================*/
if(isset($_POST["traer"])){

	$trae = new AjaxPermisos();
	$trae -> traer = $_POST["traer"];
	$trae -> idUsuario = $_POST["idUsuario"];
	$trae -> ajaxTraerPermisos();

}
/*=============================================
GRABAR PERMISOS
=============================================*/
if(isset($_POST["grabar"])){

	$graba = new AjaxPermisos();
	$graba -> arreglo = $_POST["arreglo"];
	$graba -> ajaxGrabarPermisos();

}