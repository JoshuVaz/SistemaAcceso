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
            Administrar menus
          </h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="breadcrumb-item active">Administrar menus</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">

    <div class="card">

      <div class="card-header with-border">

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarMenu">

          Agregar menu

        </button>

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Icono</th>
              <th>Ruta</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $menus = ControladorMenus::ctrMostrarMenu($item, $valor);

            foreach ($menus as $key => $value) {

              echo ' <tr>

                  <td>' . ($key + 1) . '</td>

                  <td>' . $value["nombre"] . '</td>
                  <td>' . $value["icono"] . '</td>
                  <td>' . $value["ruta"] . '</td>
    
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarMenu mr-2" idMenu="' . $value["id"] . '" data-bs-toggle="modal" data-bs-target="#modalEditarMenu"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarMenu" idMenu="' . $value["id"] . '" ><i class="fa fa-times"></i></button>

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
MODAL AGREGAR MENU
======================================-->

<div id="modalAgregarMenu" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Agregar menu</h4>

          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

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
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresa el nombre del menu" required>
              </div>

            </div>

            <!-- ENTRADA PARA EL ICONO -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">
                <span class="input-group-addon"><i class="fa fa-fonticons"></i></span>
              </div>

              <div class="col-11">
                <input type="text" class="form-control input-lg" name="nuevoIcono" placeholder="Ingresa el icono para este menu" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RUTA -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">
                <span class="input-group-addon"><i class="fa fa-road"></i></span>
              </div>

              <div class="col-11">
                <input type="text" class="form-control input-lg" name="nuevoRuta" placeholder="Ingresa la ruta del menu" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar menu</button>

        </div>

        <?php

        $crearMenu = new ControladorMenus();
        $crearMenu->ctrCrearMenu();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MENU
======================================-->

<div id="modalEditarMenu" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Editar menu</h4>

          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

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

                <input type="hidden" class="form-control input-lg" id="editarId" name="editarId" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ICONO -->
            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">
                <span class="input-group-addon"><i class="fa fa-fonticons"></i></span>
              </div>

              <div class="col-11">
                <input type="text" class="form-control input-lg" id="editarIcono" name="editarIcono" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RUTA -->

            <div class="row g-2 mb-3 align-items-center">

              <div class="col-1">
                <span class="input-group-addon"><i class="fa fa-road"></i></span>
              </div>

              <div class="col-11">
                <input type="text" class="form-control input-lg" id="editarRuta" name="editarRuta" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar menu</button>

        </div>

        <?php

        $editarMenu = new ControladorMenus();
        $editarMenu->ctrEditarMenu();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarMenu = new ControladorMenus();
$borrarMenu->ctrBorrarMenu();

?>