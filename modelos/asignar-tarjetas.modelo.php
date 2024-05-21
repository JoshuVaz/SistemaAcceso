<?php

require_once "conexion.php";

class ModeloAsignarTarjetas
{

    /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

    static public function mdlMostrarAsinarTarjetas($tabla, $tabla2, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT a.id, a.nombre, a.idTarjeta, b.numero_tarjeta FROM $tabla a, $tabla2 b WHERE a.idTarjeta = b.id");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }



    /*=============================         
        MOSTRAR UN SOLO PERFIL
    ============================= */
    public static function mdlMostrarTarjetasNoAsignadas($tabla, $item, $valor)
    {
        if ($item != NULL) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    static public function mdlAsignarTarjetasEmpleado($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idTarjeta = :idTarjeta WHERE id = :id");

        $stmt->bindParam(":idTarjeta", $datos["id_tarjeta"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["usuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
        }

        $stmt = null;
    }

    static public function mdlAsignarTarjetas($tabla1, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla1 SET asignado = :asignado WHERE id = :id");

        $stmt->bindParam(":asignado", $datos["asignado"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
        }

        $stmt = null;
    }
}
