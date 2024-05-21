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
                        Usuarios Internos
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios Internos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <div class="card">

            <div class="card-header">

                <div class="box-header with-border">

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuarioInterno">

                        <i class='fa fa-user text-uppercase'></i> Nuevo Usuario Interno

                    </button>

                </div>
            </div>

            <div class="card-body">


                <table class="table table-striped table-bordered dt-responsive nowrap tablaUsuariosInternos" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Apellido Materno</th>

                            <?php

                            // if ($_SESSION["perfil"] == "Administrador") {

                            //     echo '<th>Acciones</th>';
                            // }

                            ?>


                        </tr>

                    </thead>

                </table>

                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

            </div>

        </div>

    </section>
</div>

<!--=====================================
AGREGAR NUEVO Usuario Interno
======================================-->
<div id="modalAgregarUsuarioInterno" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

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

                    <!-- ENTRADA PARA EL NOMBRE -->

                    <div class="row g-2 mb-3 align-items-center">
                        <div class="col-1">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>

                        <div class="col-11">
                            <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" value="" placeholder="Ingrese Nombre(s)" required>
                        </div>

                    </div>

                    <div class="row g-2 mb-3 align-items-center">
                        <div class="col-1">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>

                        <div class="col-11">
                            <input type="text" class="form-control input-lg" id="nuevoApellidoP" name="nuevoApellidoP" value="" placeholder="Ingrese Apellido Paterno" required>
                        </div>

                    </div>

                    <div class="row g-2 mb-3 align-items-center">
                        <div class="col-1">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>

                        <div class="col-11">
                            <input type="text" class="form-control input-lg" id="nuevoApellidoM" name="nuevoApellidoM" value="" placeholder="Ingrese Apellido Materno" required>
                        </div>

                    </div>

                </div>

            </div>

            <!--=====================================
                PIE DEL MODAL
                ======================================-->

            <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

                <button class="btn btn-primary guardarUsuarioInterno">Guardar Usuario</button>

            </div>

            <?php

            // $editarUsuario = new ControladorPerfil();
            // $editarUsuario->ctrNuevoEmpelado();

            ?>

            <!-- </form> -->

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR EMPLEADO
======================================-->
<<div id="modalEditarUsuario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <h4 class="modal-title">Editar usuario</h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="card-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                                <input type="hidden" class="form-control input-lg" id="editarId" name="editarId" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL APELLIDO PATERNO -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="text" class="form-control input-lg" id="editarApellidoPaterno" name="editarApellidoPaterno" value="" placeholder="Apellido Paterno" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL APELLIDO PATERNO -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="text" class="form-control input-lg" id="editarApellidoMaterno" name="editarApellidoMaterno" value="" placeholder="Apellido Materno" required>
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL TELEFONO -->
                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="text" class="form-control input-lg" id="editartelefono" name="editartelefono" value="" placeholder="Telefono de emergencia">
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL SEGURO SOCIAL -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="text" class="form-control input-lg" id="editarseguro" name="editarseguro" value="" placeholder="Número de Seguro Social">
                            </div>

                        </div>

                        <!-- ENTRADA PARA ALERGIAS -->

                        <div class="row g-2 mb-3 align-items-center">
                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-exclamation-circle"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="text" class="form-control input-lg" id="editaralergias" name="editaralergias" value="" placeholder="Alergias">
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CORREO -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="mail" class="form-control input-lg" id="mail" name="mail" value="" placeholder="Correo">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL AREA -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            </div>

                            <div class="col-11">
                                <select class="form-control input-lg" name="editarAreaSelect" id="editarAreaSelect">

                                    <?php
                                    echo '<option value="" id="optionEditarArea">Seleccione una area</option>';
                                    ?>

                                    <?php

                                    $tabla = "area";

                                    $item = null;

                                    $valor = null;

                                    $area = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);


                                    foreach ($area as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombreArea"] . '</option>';
                                    }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL ESTACION -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            </div>

                            <div class="col-11">
                                <select class="form-control input-lg" name="editarEstacionSelect" id="editarEstacionSelect">

                                    <?php

                                    echo '<option value="" id="optionEditarEstacion">Seleccione una Estacion de trabajo</option>';

                                    ?>

                                    <?php

                                    $tabla = "estacion";

                                    $item = null;

                                    $valor = null;

                                    $area = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);


                                    foreach ($area as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["numeroEstacion"] . '</option>';
                                    }

                                    ?>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA SELECCIONAR EL SUCURSAL -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            </div>

                            <div class="col-11">
                                <select class="form-control input-lg" name="editarSucursalSelect" id="editarSucursalSelect">

                                    <?php

                                    echo '<option value="" id="optionEditarSucursal">Seleccione una sucursal</option>';

                                    ?>

                                    <?php

                                    $tabla = "sucursal";

                                    $item = null;

                                    $valor = null;

                                    $area = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);


                                    foreach ($area as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombreSucursal"] . '</option>';
                                    }

                                    ?>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL CORREO -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>

                            <div class="col-11">
                                <input type="date" class="form-control input-lg" id="fechaIngreso" name="fechaIngreso" value="" placeholder="Correo">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL ID -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            </div>

                            <div class="col-11">
                                <select class="form-control input-lg" name="editarIdUsuarioSelect" id="editarIdUsuarioSelect">

                                    <?php

                                    echo '<option value="" id="optionEditarIdUsuario">Seleccione el usuario</option>';

                                    ?>

                                    <?php

                                    $tabla = "usuarios";

                                    $item = null;

                                    $valor = null;

                                    $area = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);


                                    foreach ($area as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                    }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR MAQUINA DE MEDIDAS -->

                        <div class="row g-2 mb-3 align-items-center">

                            <div class="col-1">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            </div>

                            <div class="col-11">
                                <select class="form-control input-lg" name="editarMaquinaMedidasSelect" id="editarMaquinaMedidasSelect">

                                    <?php

                                    echo '<option value="" id="optionEditarMaquinaMedidas">Seleccione el la maquina de medidas</option>';

                                    ?>

                                    <?php

                                    $tabla = "maquinas_medidas";

                                    $item = null;

                                    $valor = null;

                                    $area = ControladorPerfil::ctrMostrarPerfil($tabla, $item, $valor);


                                    foreach ($area as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["id_identificador"] . '</option>';
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

                    <button type="submit" class="btn btn-primary">Modificar usuario</button>

                </div>

                <?php

                $editarUsuario = new ControladorPerfil();
                $editarUsuario->ctrEditarEmpleado();

                ?>

            </form>

        </div>

    </div>

</div>