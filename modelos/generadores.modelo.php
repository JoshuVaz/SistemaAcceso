<?php
require_once "conexion.php";

class ModeloGeneradores
{

    static public function mdlMostrarGeneradores($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }


    /*=================================
        AGREGAR NUEVA CHAPA
    ================================== */
    static public function mdlCreaGeneradores($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(identificador, password, nombre, ubicacion) VALUES (:identificador, :password, :nombre, :ubicacion)");

        $stmt->bindParam(":identificador", $datos["identificador"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombreGenerador"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());

            // return "error";

        }

        $stmt->close();

        $stmt = null;
    }
}
