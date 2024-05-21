<?php

require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/ventas-reporte-republica.controlador.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/estados.controlador.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/facturas.controlador.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/ventas.controlador.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/clientes.controlador.php";

require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/ventas-reporte-republica.modelo.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/estados.modelo.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/cp.modelo.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/ventas.modelo.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/clientes.modelo.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/credenciales-facturacion.modelo.php";


$serializa = "dfgdfg";

$act = new ControladorVentasReportesRepublica();
$act->ctrActualizaStatusVentas($serializa);

$des = new ControladorVentasReportesRepublica($serializa);
$des->ctrRecuperaVentas($serializa);

$obt = new ControladorVentasReportesRepublica();
$obt->ctrObtenerEstadoVentas($serializa);

$cont = new ControladorVentasReportesRepublica();
$cont->ctrConteoEstadoVentas($serializa);

$not = new ControladorFacturas();
$not->ctrGenerarNotaDeCreditoSta5($serializa);

