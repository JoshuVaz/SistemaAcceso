<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/menu.controlador.php";
require_once "controladores/submenu.controlador.php";
require_once "controladores/permisos.controlador.php";
require_once "controladores/perfil.controlador.php";
require_once "controladores/asignar-tarjetas.controlador.php";
require_once "controladores/chapas.controlador.php";
require_once "controladores/historial-acceso.controlador.php";
require_once "controladores/utils/limpiar.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/menu.modelo.php";
require_once "modelos/submenu.modelo.php";
require_once "modelos/permisos.modelo.php";
require_once "modelos/perfil.modelo.php";
require_once "modelos/asignar-tarjetas.modelo.php";
require_once "modelos/chapas.modelo.php";
require_once "modelos/historial-acceso.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
