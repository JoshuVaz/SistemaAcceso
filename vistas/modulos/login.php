<div class="login-page">

  <div id="back"></div>

  <div class="login-box">

    <div class="card card-outline card-info">

      <div class="card-header text-center">

        <p class="h2">Ingresar</p>
      </div>

      <div class="card-body">
        <p class="login-box-msg">Inicie Sesión</p>

        <form method="post">

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div>
          </div>
          <?php
          $login = new ControladorUsuarios();
          $login->ctrIngresoUsuario();
          ?>
        </form>
      </div>

    </div>

  </div>
</div>