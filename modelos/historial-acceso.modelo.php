<?php
require_once "conexion.php";
class ModeloPuerta
{
    /*=============================         
        MOSTRAR UN SOLO PERFIL
    ============================= */
    public static function mdlMostrarPuerta($tabla, $item, $valor)
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
    public static function mdlGuardarApertura($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3)
    {
        // var_dump($datos);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla($item1, $item2, $item3) VALUES (:$item1, :$item2, :$item3)");
        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            //print_r($stmt->errorInfo());
            return "error";
        }
    
        $stmt = null;
    }
    /*=============================================
	MOSTRAR PEDIDOS CTE CON RANGO FECHAS
	=============================================*/
    static public function mdlMostrarAperturaFiltrado($tabla, $fechaInicial, $fechaFinal)
    {
        if ($fechaInicial == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();


            return $stmt->fetchAll();
        } else if ($fechaInicial == $fechaFinal) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_hora like '$fechaFinal%'");

            // $stmt->bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $fechaActual = new DateTime();
            $fechaActual->add(new DateInterval("P1D"));
            $fechaActualMasUno = $fechaActual->format("Y-m-d");

            $fechaFinal2 = new DateTime($fechaFinal);
            $fechaFinal2->add(new DateInterval("P1D"));
            $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

            if ($fechaFinalMasUno == $fechaActualMasUno) {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_hora BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");
            } else {


                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_hora BETWEEN '$fechaInicial' AND '$fechaFinal'");
            }

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    static public function mdlMostrarHistorialAcceso($tabla)
    {
       
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();


            return $stmt->fetchAll();
        
    }


    /*============================================================
	MOSTRAR PEDIDOS CTE CON RANGO FECHAS NOMBRE DE USUARIOS
	============================================================*/

    static public function mdlMostrarAperturaFiltradoTarjetas($tabla, $tabla2, $tabla3, $fechaInicial, $fechaFinal)
    {
        if ($fechaInicial == null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        } else if ($fechaInicial == $fechaFinal) {

            $stmt = Conexion::conectar()->prepare("SELECT a.nota, a.puerta, c.nombreEmpleado FROM $tabla a INNER JOIN $tabla2 b ON a.numero_tarjeta = b.numero_tarjeta JOIN $tabla3 c ON b.id = c.id_tarjeta WHERE fecha_hora like '%$fechaFinal%'");

            // $stmt->bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $fechaActual = new DateTime();
            $fechaActual->add(new DateInterval("P1D"));
            $fechaActualMasUno = $fechaActual->format("Y-m-d");

            $fechaFinal2 = new DateTime($fechaFinal);
            $fechaFinal2->add(new DateInterval("P1D"));
            $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

            if ($fechaFinalMasUno == $fechaActualMasUno) {

                $stmt = Conexion::conectar()->prepare("SELECT a.nota, a.puerta, c.nombreEmpleado FROM $tabla a INNER JOIN $tabla2 b ON a.numero_tarjeta = b.numero_tarjeta JOIN $tabla3 c ON b.id = c.id_tarjeta WHERE fecha_hora BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");
            } else {


                $stmt = Conexion::conectar()->prepare("SELECT a.nota, a.puerta, c.nombreEmpleado FROM $tabla a INNER JOIN $tabla2 b ON a.numero_tarjeta = b.numero_tarjeta JOIN $tabla3 c ON b.id = c.id_tarjeta WHERE fecha_hora BETWEEN '$fechaInicial' AND '$fechaFinal'");
            }

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
}

