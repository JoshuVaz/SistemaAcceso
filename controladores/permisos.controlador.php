<?php 

class ControladorPermisos{

	/*=============================================
	TRAER PERMISOS
	=============================================*/

	static public function ctrTraerPermisos($idUsuario){

		$tabla = "permisos";

		$permisos = ModeloPermisos::mdlTraerPermisos($idUsuario, $tabla);

		if ($permisos == NULL) {
			
			$retorno = [];

			$item = null;

	        $valor = null;

	        $menus = ControladorMenus::ctrMostrarMenu($item, $valor);

	        // $q = 0;

	        foreach ($menus as $key => $value) {

	        	$boton = '<input class="btnEditarPermisos" estadoPermiso="1" value="1" type="checkbox" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="1" value="1" id='.$value["id"]."-0".' name='.$value["id"]."-0".' type="hidden">';

	        	$retorno[] = [

			        'menu' => ''.$value["nombre"].'',
			        'submenu' => 'N/A',
			        'boton' => ''.$boton.''

			    ];

	        	$item = "id_menu";

	        	$valor = $value["id"];

	        	$submenus = ControladorSubMenus::ctrMostrarSubMenuTodo($item, $valor);

				foreach ($submenus as $key2 => $value2) {

					// $menu = ControladorLimpiar::ctrLimpiarCadena($value2["menu"]);
					// $submenu = ControladorLimpiar::ctrLimpiarCadena($value2["submenu"]);

					$boton = '<input class="btnEditarPermisos" estadoPermiso="1" value="1" type="checkbox" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="1" value="1" id='.$value2["idmenu"]."-".$value2["idsubmenu"].' name='.$value2["idmenu"]."-".$value2["idsubmenu"].' type="hidden">';


					$retorno[] = [

			        'menu' => ''.$value2["menu"].'',
			        'submenu' => ''.$value2["submenu"].'',
			        'boton' => ''.$boton.''

			    	];


				}
	        	
	        }

	        return json_encode($retorno);

		}else{

			$retorno = [];

			$item = null;

	        $valor = null;

	        $menus = ControladorMenus::ctrMostrarMenu($item, $valor);

	        // $q = 0;

	        foreach ($menus as $key => $value) {

	        	$tabla = "permisos";

	        	$item1 = "id_menu";

		        $valor1 = $value["id"];

		        $item2 = "id_submenu";

		        $valor2 = 0;

		        $item3 = "id_user";

		        $valor3 = $idUsuario;

	        	$permisosmenu = ModeloPermisos::mdlMostrarPermisosFiltrado($item1, $valor1, $item2, $valor2, $item3, $valor3, $tabla);

	        	if ($permisosmenu == NULL) {
	        		
	        		$boton = '<input class="btnEditarPermisos" estadoPermiso="1" value="1" type="checkbox" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="1" value="1" id='.$value["id"]."-0".' name='.$value["id"]."-0".' type="hidden">';

	        	}else{

	        		switch ($permisosmenu["acceso"]) {

	        			case 0:

	        				$boton = '<input class="btnEditarPermisos" estadoPermiso="0" value="0" type="checkbox" checked="" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="0" value="0" id='.$value["id"]."-0".' name='.$value["id"]."-0".' type="hidden">';

	        				break;

	        			case 1:

	        				$boton = '<input class="btnEditarPermisos" estadoPermiso="1" value="1" type="checkbox" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="1" value="1" id='.$value["id"]."-0".' name='.$value["id"]."-0".' type="hidden">';
	        				
	        				break;

	        		}

	        	}

	        	$retorno[] = [

			        'menu' => ''.$value["nombre"].'',
			        'submenu' => 'N/A',
			        'boton' => ''.$boton.''

			    ];

	        	$item = "id_menu";

	        	$valor = $value["id"];

	        	$submenus = ControladorSubMenus::ctrMostrarSubMenuTodo($item, $valor);

				foreach ($submenus as $key2 => $value2) {

					// $menu = ControladorLimpiar::ctrLimpiarCadena($value2["menu"]);
					// $submenu = ControladorLimpiar::ctrLimpiarCadena($value2["submenu"]);

					$tabla = "permisos";

					$item1 = "id_menu";

			        $valor1 = $value2["idmenu"];

			        $item2 = "id_submenu";

			        $valor2 = $value2["idsubmenu"];

			        $item3 = "id_user";

			        $valor3 = $idUsuario;

		        	$permisossubmenu = ModeloPermisos::mdlMostrarPermisosFiltrado($item1, $valor1, $item2, $valor2, $item3, $valor3, $tabla);

		        	if ($permisossubmenu == NULL) {
		        		
		        		$boton = '<input class="btnEditarPermisos" estadoPermiso="1" value="1" type="checkbox" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="1" value="1" id='.$value2["idmenu"]."-".$value2["idsubmenu"].' name='.$value2["idmenu"]."-".$value2["idsubmenu"].' type="hidden">';

		        	}else{

		        		switch ($permisossubmenu["acceso"]) {

	        			case 0:

	        				$boton = '<input class="btnEditarPermisos" estadoPermiso="0" value="0" type="checkbox" checked="" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="0" value="0" id='.$value2["idmenu"]."-".$value2["idsubmenu"].' name='.$value2["idmenu"]."-".$value2["idsubmenu"].' type="hidden">';

	        				break;

	        			case 1:

	        				$boton = '<input class="btnEditarPermisos" estadoPermiso="1" value="1" type="checkbox" data-toggle="toggle" data-size="xs">'.'<input class="btnEditarPermisosOculto" estadoPermisoOculto="1" value="1" id='.$value2["idmenu"]."-".$value2["idsubmenu"].' name='.$value2["idmenu"]."-".$value2["idsubmenu"].' type="hidden">';
	        				
	        				break;

	        			}

		      
		        	}

					$retorno[] = [

			        'menu' => ''.$value2["menu"].'',
			        'submenu' => ''.$value2["submenu"].'',
			        'boton' => ''.$boton.''

			    	];


				}
	        	
	        }

	        return json_encode($retorno);

						
		} 

	}

	/*=============================================
	GRABAR PERMISOS
	=============================================*/

	static public function ctrGrabarPermisos($arreglo){

		$data = json_decode($arreglo,true);

		$tabla = "permisos";

		$item  = "id_user";

		$valor = $data[0]["value"];

		ModeloPermisos::mdlLimpiaPermisos($item, $valor, $tabla);

		$tabla = "permisos";

		$idUsuario = $data[0]["value"];

		$z = 0;

		foreach ($data as $key => $value) {

			if ($z > 0) {
				
				$separador = "-";

				$separada = explode($separador, $value["name"]);
			
				$datos = array("id_user" => $idUsuario,
						       "id_menu" => $separada[0],
						       "id_submenu" => $separada[1],
						       "acceso" => $value["value"]);

				$respuesta = ModeloPermisos::mdlGrabarPermisos($tabla, $datos); 

				if ($respuesta == "error") {
				 	return $respuesta;
				 } 
			}

			$z++;		
			 
		}

		return "ok";

	}

	/*=============================================
	TRAER PERMISOS SESION MENU
	=============================================*/

	static public function ctrTraerPermisosSesionMenu($idUsuario){

		$tabla1 = "permisos";
		$tabla2 = "menu";

		$permisos = ModeloPermisos::mdlTraerPermisosSesionMenu($idUsuario, $tabla1, $tabla2);


		if ($permisos == NULL) {

			return $retorno;

		}else{

			foreach ($permisos as $key => $value) {
				
				$retorno[] = [

			        'nombre' => ''.$value["menu"].'',
			        'idmenu' => ''.$value["idmenu"].'',
			        'idsubmenu' => ''.$value["idsubmenu"].'',
			        'acceso' => ''.$value["acceso"].'',
			        'ruta' => ''.$value["ruta"].'',
			        'icono' => ''.$value["icono"].'',

			    	];

			}

		}

		return $retorno;
		
	}

	/*=============================================
	TRAER PERMISOS SESION SUBMENU
	=============================================*/

	static public function ctrTraerPermisosSesionSubMenu($idUsuario, $idMenu){

		$tabla1 = "permisos";
		$tabla2 = "submenu";

		$permisos = ModeloPermisos::mdlTraerPermisosSesionSubMenu($idUsuario, $idMenu, $tabla1, $tabla2);

		return $permisos;
		
	}

	/*=============================================
	VALIDAR PERMISOS DE SECCION MENU
	=============================================*/

	static public function ctrTraerPermisosModulosMenu($idUsuario, $ruta){

		$tabla1  = "permisos";
		$tabla2  = "menu";

		$permisos = ModeloPermisos::mdlTraerPermisosModulosMenu($idUsuario, $ruta, $tabla1, $tabla2);
		
		return $permisos;
		
	}
	
	/*=============================================
	VALIDAR PERMISOS DE SECCION SUBMENU
	=============================================*/

	static public function ctrTraerPermisosModulosSubMenu($idUsuario, $ruta){

		$tabla1  = "permisos";
		$tabla2  = "submenu";

		$permisos = ModeloPermisos::mdlTraerPermisosModulosSubMenu($idUsuario, $ruta, $tabla1, $tabla2);
		
		return $permisos;
		
	}		
}