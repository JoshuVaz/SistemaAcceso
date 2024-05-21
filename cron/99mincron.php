<?php
require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/99min.controlador.php";
// require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/controladores/envio-99min.controlador.php";

require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/99min.modelo.php";
// require_once "/var/www/vhosts/sys.unitelectronics.com.mx/html/modelos/envio-99min.modelo.php";


$tok = new  Controlador99Min;
$tok->generarToken99Min();

// $token = new  ControladorEnvio99Min;
// $token->generarToken99Min();
