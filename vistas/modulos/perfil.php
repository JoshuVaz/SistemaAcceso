<?php
$idUsuario = $_SESSION["id"];
$ruta    = $_GET["ruta"];
?>
<div class="content-wrapper" style="min-height: 1113.69px">

    <div class="content-header">
        <!-- <section class="content-header"> -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Perfil
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <div class="row">

            <div class="col-md-3">
                <div class="card card-outline card-info">
                    <div class="card-body box-profile">
                        <div class="text-center perfil">
                            <img src="<?php echo $_SESSION["foto"]; ?>" class="profile-user-img img-fluid img-circle">

                        </div>
                        <h3 class="profile-username text-center">
                            <p><?php echo $_SESSION["nombre"]; ?></p>
                        </h3>
                        <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#cambiarFoto">
                            Cambiar Foto
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-bs-toggle="tab">Configuración</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body card-outline card-info">
                        <div class="tab-content">

                            <div class="tab-pane active" id="configuracion">
                                <form class="form-horizontal" method="post">
                                    <!-- Nombre de usuario -->
                                    <div class="form-group">
                                        <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                        <div class="col-md-12">
                                            <input name="nombre" required type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" value="<?php echo $_SESSION["name"]; ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- Apellido paterno -->
                                    <div class="form-group">
                                        <label for="apellidoPa" class="col-md-4 control-label">Apellido Paterno</label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control" id="apellidoPa" name="apellidoPa" placeholder="Ingrese su Apellido Paterno" value="<?php echo $_SESSION["apellido_paterno"]; ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- Apellido Materno -->
                                    <div class="form-group">
                                        <label for="apellidoMa" class="col-md-4 control-label">Apellido Materno</label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control" id="apellidoMa" name="apellidoMa" placeholder="Ingrese su Apellido Materno" value="<?php echo $_SESSION["apellido_materno"]; ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- Correo -->
                                    <div class="form-group">
                                        <label for="correo" class="col-md-4 control-label">Correo</label>
                                        <div class="col-md-12">
                                            <input required type="email" class="form-control" id="correo" name="correo" placeholder="Su correo" readonly value="<?php echo $_SESSION["correo"]; ?>">
                                        </div>
                                    </div>
                                    <!-- Area -->
                                    <div class="form-group">
                                        <label for="area" class="col-md-4 control-label">Area</label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control" id="area" name="area" placeholder="Puesto" readonly value="<?php echo $_SESSION["area"]; ?>">
                                        </div>
                                    </div>
                                    <!-- Contraseña -->
                                    <div class="form-group">
                                        <label for="contrasena" class="col-md-4 control-label">Contraseña</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su nueva contraseña">
                                            <input type="hidden" id="passwordActual" name="passwordActual" value="<?php echo $_SESSION["password"] ?>">
                                        </div>
                                    </div>
                                    <!-- Fecha de ingreso -->
                                    <div class="form-group">
                                        <label for="fechaIn" class="col-md-4 control-label">Fecha de Ingreso</label>
                                        <div class="col-md-12">
                                            <input required type="date" class="form-control" id="fechaIn" name="fechaIn" readonly value="<?php echo $_SESSION["fecha_ingreso"]; ?>">
                                        </div>
                                    </div>
                                    <!-- Antigüedad -->
                                    <div class="form-group">
                                        <label for="antigu" class="col-md-4 control-label">Antigüedad</label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control" id="antigu" name="antigu" placeholder="Años que lleva en la empresa" value="<?php echo $_SESSION["fecha_antiguedad"]; ?>" readonly>
                                        </div>
                                        <div class="col-md-4 perfil">
                                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                        </div>
                                    </div>
                                    <?php
                                    $editarUsuario = new ControladorPerfil();
                                    $editarUsuario->ctrEditarPassword();
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
</div>


<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="cambiarFoto" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Cambiar Foto</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="card-body">

                        <!-- ENTRADA PARA SUBIR FOTO -->


                        <div class="form-group">

                            <div class="panel">SUBIR FOTO</div>

                            <input required type="file" class="nuevaFoto" name="editarFoto">

                            <p class="help-block">Peso máximo de la foto 2MB</p>

                            <img src="<?php echo $_SESSION["foto"]; ?>" class="img-thumbnail previsualizarEditar" width="100px">

                            <input type="hidden" name="fotoActual" id="fotoActual">

                        </div>

                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Subir Foto</button>
                </div>

                <?php

                $editarUsuario = new ControladorPerfil();
                $editarUsuario->ctrEditarFoto();

                ?>

            </form>

        </div>

    </div>

</div>