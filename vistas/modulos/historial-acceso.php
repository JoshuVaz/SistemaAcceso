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

<div class="content-wrapper" style="min-height: 717px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historial Acceso y Apertura Manual</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Historial Acceso</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-info card-outline">
                        <div class="card-header ">
                            <button class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#modalAbrirPuerta">
                                Abrir
                            </button>

                            <!--<a role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-default " id="reportrangeAbrir">
                                
                                <span>

                                    <i class="fa fa-calendar"></i>

                                    <?php

                                    /*if (isset($_GET["fechaInicial"])) {

                                        echo $_GET["fechaInicial"] . " - " . $_GET["fechaFinal"];
                                    } else {

                                        echo 'Rango de fecha';
                                    }*/

                                    ?>
                                </span>

                                <i class="fa fa-caret-down"></i>

                            </a>-->

                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered dt-responsive nowrap tablaHistorialAcceso" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Numero de Tarjeta</th>
                                        <th>Fecha y Hora</th>
                                        <th>Nota</th>
                                        <th>Puerta</th>
                                    </tr>
                                </thead>
                            </table>
                            <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!--=====================================
        Modal Abrir Puerta
======================================-->

<div id="modalAbrirPuerta" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!--=====================================
                CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <h4 class="modal-title">Agregar Usuario Interno</h4>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <!--=====================================
                CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

                <div class="card-body">

                    <!-- input nombre -->

                    <div class="input-group mb-3">

                        <div class="input-group-append input-group-text">

                            <span class="fa fa-id-card"></span>

                        </div>

                        <input type="text" class="form-control" name="registroIngreso" id="registroIngreso" placeholder="Ingresa el nombre" value="Manual" readonly>

                    </div>

                        <!-- input usuario -->

                    <div class="input-group mb-3">

                        <div class="input-group-append input-group-text">

                            <span class="fa fa-file-text"></span>

                        </div>

                        <input type="text" class="form-control" name="notaIngreso" id="notaIngreso" placeholder="¿Quién ingreso?" required>

                    </div>

                    <!-- =======================
                        SELECCIONAR  CHAPA A ABRIR
                    ============================= -->

                    <div class="input-group mb-3">

                        <div class="input-group-append input-group-text">

                            <span class="fa fa-unlock"></span>

                        </div>


                        <select class="form-control input-lg" name="PuertaSelect" id="PuertaSelect">
                            
                            

                            <?php
                            echo '<option value="" id="optionpuerta">Seleccione la puerta que se va abrir</option>';
                            ?>

                            <?php

                                $tabla = "chapas";

                                $item = null;

                                $valor = null;

                                $chapas = ControladorPuerta::ctrMostrarPuerta($tabla,$item,$valor);

                                foreach ($chapas as $key => $value) {
                                    echo '<option value="' . $value["topico"] . '">' . $value["nombre"] . '</option>';
                                }
        


                            ?>


                        </select>

                    </div>

                </div>

            </div>

            <!--=====================================
                PIE DEL MODAL
            ======================================-->

            <div class="modal-footer d-flex justify-content-between">

                <div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary guardarApertura">Abrir </button>
                </div>

            </div>

        </div>

    </div>

</div>


<script src="vistas/js/abrir.js"></script>
