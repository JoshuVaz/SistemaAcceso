<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <!-- test -->

  <meta charset="utf8mb4">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Chapas Unit</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="/vistas/img/plantilla/icono-negro.png">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.4.1 -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">

  <!-- AdminLTE Skins -->
  <!-- <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css"> -->

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.css" />

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <link rel="stylesheet" href="vistas/bower_components/easyzoom/css/easyzoom.css">

  <!-- Estilos -->
  <link rel="stylesheet" href="vistas/css/estilos.css">
  <link rel="stylesheet" href="vistas/css/prp.css">
  <link rel="stylesheet" href="vistas/css/productos.css">


  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/c2a848950c.js" crossorigin="anonymous"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.js"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.js"></script>

  <!-- SweetAlert 2 -->
  <!-- <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/chart.js/Chart.js"></script>

  <!-- MQTT -->
  <script src="https://unpkg.com/mqtt@4.2.6/dist/mqtt.min.js"></script>


</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition sidebar-mini sidebar-collapse">

  <!-- <div class="wrapper"> -->
  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
    echo '<div class="wrapper">';
    /*=============================================
      CABEZOTE
      =============================================*/
    include "modulos/cabezote.php";
    /*=============================================
      MENU
      =============================================*/
    include "modulos/menu.php";
    /*=============================================
      CONTENIDO
      =============================================*/
    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "crearmenu" ||
        $_GET["ruta"] == "crearsubmenu" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "perfil" ||
        $_GET["ruta"] == "generadores" ||
        $_GET["ruta"] == "personas-tarjetas" ||
        $_GET["ruta"] == "asignar-tarjetas" ||
        $_GET["ruta"] == "alta-tarjetas" ||
        $_GET["ruta"] == "camaras" ||
        $_GET["ruta"] == "historial-acceso" ||
        $_GET["ruta"] == "usuarios-internos" ||
        $_GET["ruta"] == "usuarios-externos" ||
        $_GET["ruta"] == "chapas" ||
        $_GET["ruta"] == "salir"
      ) {
        include "modulos/" . $_GET["ruta"] . ".php";
      } else {
        include "modulos/404.php";
      }
    } else {
      include "modulos/inicio.php";
    }
    /*=============================================
      FOOTER
      =============================================*/
    include "modulos/footer.php";
    echo '</div>';
  } else {
    include "modulos/login.php";
  }
  ?>
  <!-- </div> -->

  <script src="vistas/bower_components/easyzoom/dist/easyzoom.js"></script>
  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/menu.js"></script>
  <script src="vistas/js/submenu.js"></script>
  <script src="vistas/js/permisos.js"></script>
  <script src="vistas/js/generadores.js"></script>
  <script src="vistas/js/registro-usuarios.js"></script>
  <script src="vistas/js/asignar-tarjetas.js"></script>
  <script src="vistas/js/alta-tarjetas.js"></script>
  <script src="vistas/js/historial-acceso.js"></script>
  <script src="vistas/js/chapas.js"></script>
</body>

</html>