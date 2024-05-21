<?php
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/estatus-envio.controlador.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/paqueteExpress.controlador.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/cronenvios.controlador.php";

require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/estatus-envio.modelo.php";
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/99min.modelo.php";

// Actualizar estatus de woocomerce a completo y mandar correo a cleintes 

$actualizacionStatus = new ControladorSincEstatusEnvio;
$actualizacionStatus->ctrSincEstatusEnvio();
