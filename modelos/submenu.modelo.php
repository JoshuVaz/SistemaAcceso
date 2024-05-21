<?php

require_once "conexion.php";

class ModeloSubMenus{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarSubMenu($tabla1, $tabla2, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT a.id as idsubmenu , a.nombre as submenu, b.nombre as menu , b.id as idmenu, a.icono as icono, a.ruta as ruta  FROM $tabla1 a INNER JOIN $tabla2 b ON a.id_menu = b.id WHERE a.id = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT a.id as id , a.nombre as submenu, b.nombre as menu, a.ruta as ruta, a.icono as icono FROM $tabla1 a INNER JOIN $tabla2 b ON a.id_menu = b.id ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarSubMenuTodo($tabla1, $tabla2, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT a.id as idsubmenu , a.nombre as submenu, b.nombre as menu , b.id as idmenu  FROM $tabla1 a INNER JOIN $tabla2 b ON a.id_menu = b.id WHERE a.id_menu = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			
		}

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarSubMenu($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_menu, nombre, icono, ruta) VALUES (:id_menu, :nombre, :icono, :ruta)");

		$stmt->bindParam(":id_menu", $datos["id_menu"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":icono", $datos["icono"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR MENU
	=============================================*/

	static public function mdlEditarSubMenu($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_menu = :id_menu, icono = :icono, ruta = :ruta WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_menu", $datos["id_menu"], PDO::PARAM_INT);
		$stmt->bindParam(":icono", $datos["icono"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR SUBMENU
	=============================================*/

	static public function mdlBorrarSubMenu($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}