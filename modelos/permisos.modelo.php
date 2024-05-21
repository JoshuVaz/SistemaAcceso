<?php 
 
require_once "conexion.php";

class ModeloPermisos{


	/*=============================================
	TRAER PERMISOS
	=============================================*/

	static public function mdlTraerPermisos($idUsuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_user = :id_user");

		$stmt -> bindParam(":id_user", $idUsuario, PDO::PARAM_INT);

		$stmt -> execute();

	    return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarPermisosFiltrado($item1, $valor1, $item2, $valor2, $item3, $valor3, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 AND $item3 = :$item3 LIMIT 1");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		$stmt -> execute();

	    return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlLimpiaPermisos($item, $valor, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	GRABAR PERMISOS
	=============================================*/

	static public function mdlGrabarPermisos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_user, id_menu, id_submenu, acceso) VALUES (:id_user, :id_menu, :id_submenu, :acceso)");

		$stmt->bindParam(":id_user", $datos["id_user"], PDO::PARAM_INT);
		$stmt->bindParam(":id_menu", $datos["id_menu"], PDO::PARAM_INT);
		$stmt->bindParam(":id_submenu", $datos["id_submenu"], PDO::PARAM_INT);
		$stmt->bindParam(":acceso", $datos["acceso"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			print_r($stmt->errorInfo());
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	TRAER PERMISOS SESION MENU
	=============================================*/

	static public function mdlTraerPermisosSesionMenu($idUsuario, $tabla1, $tabla2){

		$stmt = Conexion::conectar()->prepare("SELECT b.ruta as ruta, b.icono as icono, b.nombre as menu, a.id_menu as idmenu, a.id_submenu as idsubmenu,  a.acceso as acceso FROM $tabla1 a JOIN $tabla2 b ON a.id_menu = b.id WHERE a.id_user =:id_user AND a.id_submenu=0");

		$stmt -> bindParam(":id_user", $idUsuario, PDO::PARAM_INT);

		$stmt -> execute();

	    return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TRAER PERMISOS SESION SUB MENU
	=============================================*/

	static public function mdlTraerPermisosSesionSubMenu($idUsuario, $idMenu, $tabla1, $tabla2){

		$stmt = Conexion::conectar()->prepare("SELECT b.ruta as ruta, b.icono as icono, b.nombre as submenu, a.id_menu as idmenu, a.id_submenu as idsubmenu,  a.acceso as acceso FROM $tabla1 a JOIN $tabla2 b ON a.id_submenu = b.id WHERE a.id_user =:id_user AND a.id_menu =:id_menu");

		$stmt -> bindParam(":id_user", $idUsuario, PDO::PARAM_INT);
		$stmt -> bindParam(":id_menu", $idMenu, PDO::PARAM_INT);

		$stmt -> execute();

	    return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	VALIDAR PERMISOS DE SECCION MENU
	=============================================*/

	static public function mdlTraerPermisosModulosMenu($idUsuario, $ruta, $tabla1, $tabla2){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 a JOIN $tabla2 b ON a.id_menu = b.id WHERE a.id_user=:id_user and a.id_submenu=0 and b.ruta = :ruta");

		$stmt -> bindParam(":id_user", $idUsuario, PDO::PARAM_INT);
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt -> execute();

	    return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	VALIDAR PERMISOS DE SECCION SUB MENU
	=============================================*/

	static public function mdlTraerPermisosModulosSubMenu($idUsuario, $ruta, $tabla1, $tabla2){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 a JOIN $tabla2 b ON a.id_submenu = b.id WHERE a.id_user=:id_user and b.ruta = :ruta");

		$stmt -> bindParam(":id_user", $idUsuario, PDO::PARAM_INT);
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt -> execute();

	    return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
}