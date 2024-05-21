<div class="content-wrapper" style="min-height: 1113.69px">

  <div class="content-header">
    <!-- <section class="content-header"> -->
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Inicio
            <small>Panel de Inicio</small>
          </h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="breadcrumb-item active">Inicio</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- </section> -->
  <!-- <section class="content"> -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <?php
          echo '<div class="box box-success">
                     <div class="box-header">
                     <h1>Bienvenid@ ' . $_SESSION["nombre"] . '</h1>
                     </div>
                     </div>';
          ?>
        </div>
      </div>
    </div>

  </div>

  <!-- </section> -->

</div>