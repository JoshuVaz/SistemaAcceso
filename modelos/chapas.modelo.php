<?php
require_once "conexion.php";
class ModeloChapas
{
    static public function mdlMostrarChapas($tabla, $item, $valor)
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

        $stmt = null;
    }
    /*=================================
        AGREGAR NUEVA CHAPA
    ================================== */
    static public function mdlCreaChapa($tabla, $datos)
    {
        //var_dump($datos);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(identificador, password, nombre, ubicacion, topico) VALUES (:identificador, :password, :nombre, :ubicacion,:topico)");
        $stmt->bindParam(":identificador", $datos["identificador"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombreChapa"], PDO::PARAM_STR);
        $stmt->bindParam(":topico", $datos["topico"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
            return "error";
        }

        $stmt = null;
    }
}

