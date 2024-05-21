<?php
class ControladorTarjetas{
	/*=============================================
	ASIGNAR TARJETA RFID A USUARIO
	=============================================*/
	static public function ctrRegistroTarjetas($identificador, $token, $serial){

		//Validacion de token
		$item = "identificador";
		$valor = $identificador;
		$tabla = "generadores";
		$generador = ModeloTarjetas::MdlConsultaGenerador($tabla, $item, $valor);
		if ($token == $generador["password"]) {

			$item = "id";
			$valor = 1;
			$tabla = "rfid_temp";
			$consulta = ModeloTarjetas::MdlMostrarStatus($tabla, $item, $valor);
			
			//validacion de no duplicidad tarjeta
			if ($consulta["modo"] == 1) {
				$tabla = "tarjetas";
				$item1 = "numero_tarjeta";
				$valor1 = $serial;
				$tarjeta = ModeloTarjetas::MdlMostrarTarjeta($tabla, $item1, $valor1);

				if (isset ($tarjeta["numero_tarjeta"])) {
				
					//D3-28-55-94
					echo "tarjeta registrada";
				
					$item = "id";
					$valor = 1;
					$tabla = "rfid_temp";
					$set = 2;
					$setea = ModeloTarjetas::MdlSetearStatus($tabla, $item, $valor, $set);
			
				}else{

					$tabla = "tarjetas";
					$item1 = "numero_tarjeta";
					$valor1 = $serial;
					$respuesta = ModeloTarjetas::mdlRegistrarTarjeta($tabla, $item1, $valor1);
					if ($respuesta == "ok") {
						
						$item = "id";
						$valor = 1;
						$tabla = "rfid_temp";
						$set = 0;
						$setea = ModeloTarjetas::MdlSetearStatus($tabla, $item, $valor, $set);
						echo "La tarjeta con serial ".$serial." ha sido dada de alta.";

					} else if ($respuesta == "error"){

						echo "No guardo la tarjeta";

					}
				}

			} else {

				echo "El sistema no esta en modo emparejamiento.";
				
			}

		} else {

			echo"Usuario o contrasena de generador invalidos.";
		}
		
	}
}
	

