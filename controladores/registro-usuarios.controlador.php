<?php

class ControladorRegistroUsuarios
{

    /*=============================================
    GUARDAR PERSONA
    =============================================*/
    public static function ctrGuardarUsuario($datos)
    {
        $tabla = "registro_usuarios";
        $item = "nombre";

            $respuesta = ModeloRegistroUsuarios::mdlGuardarUsuario($tabla, $datos);

        return $respuesta;
    }

    /*=============================================
    TRAER INFORMACION PERSONA
    =============================================*/
    public static function ctrTraerInformacionUsuarios($item, $valor)
    {
        $tabla = "registro_usuarios";
        $respuesta = ModeloRegistroUsuarios::mdlTraerInformacionUsuarios($tabla, $item, $valor);
        return $respuesta;
    }
}
