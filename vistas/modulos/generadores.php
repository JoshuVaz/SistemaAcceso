<?php
$idUsuario = $_SESSION["id"];
$ruta    = $_GET["ruta"];

$permisos = ControladorPermisos::ctrTraerPermisosModulosMenu($idUsuario, $ruta);

if ($permisos == NULL) {

    $permisossub = ControladorPermisos::ctrTraerPermisosModulosSubMenu($idUsuario, $ruta);

    if ($permisossub == NULL) {

        echo '<script> 

        window.location = "inicio";

      </script>';
    } else {

        if ($permisossub["acceso"] != 0) {

            echo '<script>

        window.location = "inicio";

      </script>';

            return;
        }
    }
} else {

    if ($permisos["acceso"] != 0) {

        echo '<script>

      window.location = "inicio";

    </script>';

        return;
    }
}

?>

<div class="content-wrapper" style="min-height: 1113.69px">

    <div class="content-header">
        <!-- <section class="content-header"> -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Generadores
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Generadores</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card">

            <div class="card-header with-border">
                <!-- ====================
                    EJECUTAR CREDECIALES
                ======================== -->

                <button class="btn btn-success btnGenerador">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Generador
                </button>
            </div>

            <div class="card-body">

                <table class="table table-striped table-bordered dt-responsive nowrap tablaGenerador " width="100%">

                    <thead>

                        <tr>
                            <th style="width:10px">#</th>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Contraseña</th>
                            <th>Ubicacion</th>
                        </tr>

                    </thead>

                </table>

                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

            </div>


        </div>


    </section>

</div>

<!-- ==============================
    MODAL INFORMACION
=================================== -->
<div id="modalGenerador" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header" style="background: #17A2B8; color:white">

                <h4 class="modal-title">Nuevo Generador</h4>

                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

                <div class="card-body">

                    <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-text"><i class="fa fa-user"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar el nombre del generador" required>

                        </div>

                    </div>

                    <!-- ENTRADA PARA LA UBICACION -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevaUbicacion" id="nuevaUbicacion" placeholder="Ingresar su ubicación" required>

                        </div>

                    </div>

                </div>

            </div>

            <!--=====================================
        PIE DEL MODAL
        ======================================-->

            <div class="modal-footer">

                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>

                <button id="guardarGenerador" class="btn btn-success">Guardar generador</button>

            </div>


            <!-- </form> -->

        </div>

    </div>

</div>