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

<div class="content-wrapper" style="min-height: 1416px;">
    <section class="content-header">

        <!-- <section class="content-header"> -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Chapas
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Chapas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card chapas">

            <div class="card-header with-border">
                <!-- ====================
                    Crear Credenciales Nueva Chapa
                ======================== -->

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalchapa">

                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Chapa

                </button>

            </div>

            <div class="card-body">

                <table class="table table-striped table-bordered dt-responsive nowrap tablaChapas" width="100%">

                    <thead id="">

                        <tr>
                            <th style="width:10px">#</th>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Contraseña</th>
                            <th>Ubicacion</th>
                            <th>Topico</th>
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
<div id="modalchapa" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#f0920e; color:white">

                <h4 class="modal-title">Nueva Chapa</h4>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

                <div class="card-body">

                    <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="input-group mb-3">

                        <div class="input-group-append input-group-text">

                            <span class="fa fa-user"></span>

                        </div>
                        
                        <input type="text" class="form-control input-lg" name="nuevoNombreChapa" id="nuevoNombreChapa" placeholder="Ingresar el nombre de la chapa" required>
                        
                    </div>

                    <!-- ENTRADA PARA LA UBICACION -->

                    <div class="input-group mb-3">

                        <div class="input-group-append input-group-text">

                            <span class="fa fa-location-arrow"></span>

                        </div>
                        
                        <input type="text" class="form-control input-lg" name="nuevaUbicacionChapa" id="nuevaUbicacionChapa" placeholder="Ingresar su ubicación" required>

                    </div>

                    <!-- ENTRADA PARA LA UBICACION -->

                    <div class="input-group mb-3">

                        <div class="input-group-append input-group-text">

                            <span class="fa-solid fa-paper-plane"></span>

                        </div>
                        
                        <input type="text" class="form-control input-lg" name="nuevoTopicoChapa" id="nuevoTopicoChapa" placeholder="Ingresar topico" required>    

                    </div>

                </div>

            </div>

            <!--=====================================
        PIE DEL MODAL
        ======================================-->

            <div class="modal-footer">

                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Salir</button>

                <button class="btn btn-success guardarChapa" id="guardarChapa">Guardar chapa</button>

            </div>

            <?php

            // $crearChapas = new ControladorUsuarios();
            // $crearChapas->ctrCrearChapa();

            ?>

            <!-- </form> -->

        </div>

    </div>

</div>

