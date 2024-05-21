<?php
require_once "conexion.php";

class ModeloRegistroUsuarios
{
    /*=============================================
    GUARDAR PERSONA
    =============================================*/
    public static function mdlGuardarUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellidoPaterno, apellidoMaterno,idTarjeta, statusAcceso) VALUES(:nombre, :apellidoPaterno, :apellidoMaterno, :idTarjeta, :statusAcceso)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoPaterno", $datos["apellidoP"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoMaterno", $datos["apellidoM"], PDO::PARAM_STR);
        $stmt->bindParam(":idTarjeta", $datos["idTarjeta"], PDO::PARAM_STR);
        $stmt->bindParam(":statusAcceso", $datos["statusAcceso"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    /*=============================================
TRAER INFORMACION PERSONA
=============================================*/
    public static function mdlTraerInformacionUsuarios($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
}
