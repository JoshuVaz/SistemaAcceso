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
                        Alta Tarjetas
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Alta Tarjetas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card credenciales">

            <div class="card-header with-border">
                <!-- ====================
                    EJECUTAR TARJETAS
                ======================== -->

                <button class="btn btn-primary btnAgregarTarjetas">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar
                </button>
            </div>

            <div class="card-body">

                <table class="table table-striped table-bordered dt-responsive nowrap tablaTarjetas" width="100%">

                    <thead id="">

                        <tr>
                            <!-- <th style="width:10px">#</th> -->
                            <th>Id</th>
                            <th>Numero de Tarjeta</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                </table>

                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

            </div>


        </div>


    </section>

</div>