<?php
require_once "conexion.php";
class ModeloTarjetas{
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function MdlConsultaGenerador($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();	

		$stmt = null;
	}
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function MdlMostrarStatus($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();	

		$stmt = null;
	}
	/*=============================================
	CONSULTAR TARJETA
	=============================================*/
	static public function MdlMostrarTarjeta($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();	

		$stmt = null;
	}
	/*=============================================
	REGISTRO DE USUARIO ASISTENCIA
	=============================================*/

	static public function mdlRegistrarTarjeta($tabla, $item1, $valor1){
		// $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numero_tarjeta) VALUES (:numero_tarjeta)");
		// $stmt -> bindParam(":numero_tarjeta", $valor1, PDO::PARAM_STR);

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla($item1) VALUES (:$item1)");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";	
		}else{
			return "error";
		
		}

		$stmt = null;
	}
	/*=============================================
	SETEAR STATUS
	=============================================*/

	static public function MdlSetearStatus($tabla, $item, $valor, $set){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET modo = $set WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;

	}

}
