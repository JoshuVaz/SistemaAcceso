<?php

require_once "conexion.php";


class ModeloPerfil
{
    /*=================================
        AGREGAR EMPLEADO NUEVO
    ================================== */
    static public function mdlInrgesarEmpleado($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreEmpleado, apellido_paterno, apellido_materno, telefono_emergencias, numero_seguro_social, alergias, correo, idArea, idEstacion, idSucursal, fecha_ingreso, id_usuario) VALUES (:nombreEmpleado, :apellido_paterno, :apellido_materno, :telefono_emergencias, :numero_seguro_social, :alergias, :correo, :idArea, :idEstacion, :idSucursal, :fecha_ingreso, :id_usuario)");

        $stmt->bindParam(":nombreEmpleado", $datos["nombreEmpleado"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_emergencias", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":numero_seguro_social", $datos["seguro"], PDO::PARAM_STR);
        $stmt->bindParam(":alergias", $datos["alergias"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":idArea", $datos["idArea"], PDO::PARAM_INT);
        $stmt->bindParam(":idEstacion", $datos["idEstacion"], PDO::PARAM_INT);
        $stmt->bindParam(":idSucursal", $datos["idSucursal"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);


        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());

            // return "error";

        }

        $stmt->close();

        $stmt = null;
    }



    /*=============================         
        MOSTRAR UN SOLO PERFIL
    ============================= */
    public static function mdlMostrarPerfil($tabla, $item, $valor)
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

    /*===================================
        MOSTRAR VARIOS PERFILES
    =================================== */
    public static function mdlMostrarPerfiles($tabla, $tabla2, $tabla3, $tabla4, $tabla5, $item, $valor)
    {
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla a INNER JOIN $tabla2 b ON a.id = b.id_usuario  JOIN $tabla3 c ON b.idEstacion = c.id  JOIN $tabla4 d ON b.idSucursal = d.id  JOIN $tabla5 e ON b.idArea = e.id WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla a INNER JOIN $tabla2 b ON a.id = b.id_usuario  JOIN $tabla3 c ON b.idEstacion = c.id  JOIN $tabla4 d ON b.idSucursal = d.id  JOIN $tabla5 e ON b.idArea = e.id");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    /*====================================
        EDITAR EMPLEADO
    ===================================== */
    static public function mdlEditarEmpleado($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreEmpleado = :nombreEmpleado, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, telefono_emergencias = :telefono_emergencias, numero_seguro_social = :numero_seguro_social, alergias = :alergias, correo = :correo, idArea = :idArea, idEstacion = :idEstacion, idSucursal = :idSucursal, fecha_ingreso = :fecha_ingreso, id_usuario = :id_usuario WHERE id = :id");

        $stmt->bindParam(":nombreEmpleado", $datos["nombreEmpleado"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_emergencias", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":numero_seguro_social", $datos["seguro"], PDO::PARAM_STR);
        $stmt->bindParam(":alergias", $datos["alergias"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":idArea", $datos["idArea"], PDO::PARAM_INT);
        $stmt->bindParam(":idEstacion", $datos["idEstacion"], PDO::PARAM_INT);
        $stmt->bindParam(":idSucursal", $datos["idSucursal"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=======================================
        EDITAR FOTO PERFIL 
    ======================================== */
    static public function mdlEditarFoto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET foto = :foto WHERE usuario = :usuario");


        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*==========================================
        EDITAR PASSWORD PERFIL
    =========================================== */
    static public function mdlEditarPassword($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password WHERE usuario = :usuario");

        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	ACTUALIZAR NUMERO DE GUIA
	=============================================*/

    static public function mdlActualizaQr($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1  WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
