<?php

/*=============================================
CONTENIDO
=============================================*/

if(isset($_GET["ruta"])){

  switch ($_GET["ruta"]) {

    case "registro":

      include "modulos/".$_GET["ruta"].".php";
  
    break;
  
    // case "meli":
  
    //   include "modulos/".$_GET["ruta"].".php";
  
    // break;
    
  }


}

?>
