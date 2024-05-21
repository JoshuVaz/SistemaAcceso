<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/tarjetas.controlador.php";

require_once "modelos/tarjetas.modelo.php";

$plantilla = new ControladorPlantilla();

$plantilla->ctrPlantilla();
