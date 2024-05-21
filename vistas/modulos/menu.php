<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a class="brand-link">
		<img src="/vistas/img/plantilla/icono-negro.png" alt="logo unit" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
		<span class="brand-text font-weight-light">Unit Chapas</span>
	</a>

	<div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<?php
				$foto = $_SESSION["foto"];
				if ($foto !== "") {
					echo '<img src="' . $foto . '" class="img-circle elevation-3" alt="User" />';
				} else {
					echo '<img src="/vistas/img/plantilla/icono-negro.png" class="img-circle elevation-3" alt="User Image" />';
				}
				?>
			</div>
			<div class="info">
				<a href="perfil" class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
			</div>
		</div>

		<nav class="mt-2">

			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<?php
				echo '<li class="nav-item">
					<a href="inicio" class="nav-link">
						<i class="fa fa-home"></i>
						<p>Inicio</p>
					</a>
				</li>
				';
				if ($_SESSION["perfil"] == "admin") {
				?>
					<li class="nav-item">
						<a href="crearmenu" class="nav-link">
							<i class="fa fa-bars"></i>
							<p>Menu</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="crearsubmenu" class="nav-link">
							<i class="fa fa-minus-square"></i>
							<p>Sub Menu</p>
						</a>
					</li>

					<li class="nav-item">
						<a href="usuarios" class="nav-link">
							<i class="fa fa-user"></i>
							<p>Usuarios</p>
						</a>
					</li>

				<?php
				}
				?>
				<?php
				if ($_SESSION["perfil"] != "admin") {
					if ($_SESSION["menu"] !== NULL) {
						foreach ($_SESSION["menu"] as $key => $value) {
							$submenu = ControladorPermisos::ctrTraerPermisosSesionSubMenu($_SESSION["id"], $value["idmenu"]);
							if ($submenu == NULL) {
								if ($value["acceso"] == 0) {
									echo '
									<li class="nav-item">
										<a href="' . $value["ruta"] . '" class="nav-link">
											<i class="' . $value["icono"] . '"></i>
											<p>' . $value["nombre"] . '</p>
										</a>
									</li>
								';
								}
							} else {
								if ($value["acceso"] == 0) {
									echo '
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="' . $value["icono"] . '" ></i>
	
										<p>' . $value["nombre"] . '
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul  class="nav nav-treeview">';
									foreach ($submenu as $key2 => $value2) {
										if ($value2["acceso"] == 0) {
											echo '
											<li class="nav-item">
												<a href="' . $value2["ruta"] . '" class="nav-link">
	
												<i class="' . $value2["icono"] . '"></i>
													<p>
														' . $value2["submenu"] . '
														</p>
												</a>
											</li>
										';
										}
									}
									echo '</ul>';
									'
	
								</li>';
								}
							}
						}
					}
				}
				?>
			</ul>
		</nav>

	</div>

</aside>