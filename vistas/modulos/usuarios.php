<?php

if ($_SESSION["perfil"] != "admin") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>
<div class="content-wrapper" style="min-height: 1113.69px">

  <div class="content-header">
    <!-- <section class="content-header"> -->
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Administrar usuarios
          </h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="breadcrumb-item active">Administrar usuarios</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">

    <div class="card">

      <div class="card-header with-border">

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">

          Agregar usuario

        </button>

      </div>

      <div class="card-body">

        <table class="table table-striped table-bordered dt-responsive nowrap tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {

              echo ' <tr>
                  <td>' . ($key + 1) . '</td>
                  <td>' . $value["nombre"] . '</td>
                  <td>' . $value["usuario"] . '</td>';

              if ($value["foto"] != "") {

                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="50px"></td>';
              } else {

                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="50px"></td>';
              }

              echo '<td>' . $value["perfil"] . '</td>';

              if ($value["estado"] != 0) {

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
              }

              echo '<td>' . $value["ultimo_login"] . '</td>
                  <td>

                    <div class="btn-group">

                      <button class="btn btn-secondary btn-sm btn-vk mr-2 btnEditarPermisos" idUsuario="' . $value["id"] . '" data-bs-toggle="modal" data-bs-target="#modalEditarPermisos"><i class="fa fa-key"></i></button>
                        
                      <button class="btn btn-secondary btn-sm btn-warning mr-2 btnEditarUsuario" idUsuario="' . $value["id"] . '" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-secondary btn-sm btn-danger mr-2 btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
            }


            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">


          <h4 class="modal-title">Agregar usuario</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>
              </div>

              <div class="col-11">

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              </div>

              <div class="col-11">

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>
              </div>

              <div class="col-11">

                <select class="form-control input-lg" name="nuevoPerfil">

                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

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

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>
              </div>

              <div class="col-11">

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              </div>

              <div class="col-11">

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>
              </div>

              <div class="col-11">

                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

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

        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PERMISOS
======================================-->

<div id="modalEditarPermisos" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form action="" id="formPermisos" name="formPermisos">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Editar permisos</h4>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="card-body">

            <input type="hidden" class="input-lg" id="permisosId" name="permisosId" value="" required>

            <div class="table-responsive">

              <table class="table tablaPermisos">

                <thead>

                  <tr>

                    <th>#</th>

                    <th>Menu</th>

                    <th>Sub menu</th>

                    <th>Ver</th>

                  </tr>

                </thead>

                <tbody id="tablaPermisos">

                </tbody>

              </table>

            </div>

          </div>

          <div id="example-console-form"></div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>



        </div>

      </form>

    </div>

  </div>

</div>

<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();

?>