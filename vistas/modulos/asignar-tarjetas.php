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
                        Asignar Tarjetas
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="breadcrumb-item active"> Asignar Tarjetas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card credenciales">

            <div class="card-header with-border">
                <!-- ====================
                    EJECUTAR CREDECIALES
                ======================== -->

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAsignarTarjetas">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Asignar Tarjeta
                </button>
            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered dt-responsive nowrap tablaTarjetasAsignadas" width="100%">

                    <thead id="">

                        <tr>
                            <th style="width:10px">#</th>
                            <th>Usuario</th>
                            <th>Tarjeta</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                </table>

                <!--<input type="hidden" value="<?//php echo $_SESSION['perfil']; ?>" id="perfilOculto">-->

            </div>



        </div>


    </section>

</div>

<!-- ==============================
    MODAL ASIGNAR TARJETAS
=================================== -->
<div id="ModalAsignarTarjetas" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- <form method="post" enctype="multipart/form-data"> -->

            <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <h4 class="modal-title">Asignar Tarjeta</h4>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

            <div class="modal-body">

                <div class="card-body">

                    <!-- ENTRADA PARA SELECCIONAR EL USUARIO -->

                    <div class="row g-2 mb-3 align-items-center">

                        <div class="col-1">
                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        </div>

                        <div class="col-11">

                            <select class="form-control input-lg" name="asignarUsuario" id="asignarUsuario">

                                <option value="" >Seleccione un Usuario</option>
                                <?php
                                //echo '<option value="" >Seleccione un Usuario</option>';
                                ?>

                                <?php

                                $tabla = "registro_usuarios";

                                $item = null;

                                $valor = null;

                                $personas = ControladorAsignarTarjetas::ctrMostrarTarjetasNoAsignadas($tabla, $item, $valor);

                                foreach ($personas as $key => $value) {
                                    if ($value["idTarjeta"] == 0 ) {
                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"]. ' ' . $value["apellidoPaterno"] . '</option>';
                                    } else {
                                    }
                                }

                                ?>

                            </select>

                        </div>

                    </div>
                    <!-- ENTRADA PARA SELECCIONAR LA TARJETA -->

                    <div class="row g-2 mb-3 align-items-center">

                        <div class="col-1">
                            <span class="input-group-addon"><i class="fa-solid fa-id-card-clip"></i></span>
                        </div>

                        <div class="col-11">
                            <select class="form-control input-lg" name="asignarTarjeta" id="asignarTarjeta">

                                <option value="" >Seleccione una Tarjeta</option>

                                <?php
                                //echo '<option value="" >Seleccione una Tarjeta</option>';
                                ?>

                                <?php

                                $tabla = "tarjetas";

                                $item = null;

                                $valor = null;

                                $tarjetas = ControladorAsignarTarjetas::ctrMostrarTarjetasNoAsignadas($tabla, $item, $valor);

                                foreach ($tarjetas as $key => $value) {
                                    if ($value["asignado"] == 1) {
                                    } else {
                                        echo '<option value="' . $value["id"] . '">' . $value["numero_tarjeta"]  . '</option>';
                                    }
                                }

                                ?>

                            </select>

                        </div>

                    </div>

                </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

                <button type="submit" class="btn btn-primary btnAsignarTarjetas">Asignar Tarjetas</button>

            </div>

            <?php

            // $crearAsignacionTarjeta = new ControladorAsignarTarjetas();
            // $crearAsignacionTarjeta->ctrAsignarTarjeta();

            ?>

            <!-- </form> -->

        </div>

    </div>

</div>


<!-- ==============================
    MODAL CREDENCIALES
=================================== -->
<div id="modalCredenciales" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#ff6600; color:white">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Credenciales</h2>

            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            </div>
        </div>
    </div>
</div>