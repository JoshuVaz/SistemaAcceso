<?php
class ControladorLimpiar
{

	static public function ctrLimpiarCadena($string) //función para limpiar strings
	{
		$string = trim($string);

		$string = str_replace(
			array('"', '""'),
			'',
			$string
		);
		$string = str_replace(
			array("\r\n", "\n", "\r"),
			'',
			$string
		);

		//   ESPACIOS DE TAB
		// $string = str_replace(
		// 	array(
		// 		'/\s+/'
		// 	),
		// 	'',
		// 	$string

		// );

		// ELIMINAR ESPACIOS DE TAB
		$string = trim(preg_replace(
			'/\t+/',
			'',
			$string
		));


		//  $string = str_replace(
		//     array(' ', ''),'',
		//     $string
		// );

		// $string = str_replace(
		//     array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		//     array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		//     $string
		// );

		// $string = str_replace(
		//     array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
		//     array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
		//     $string
		// );

		// $string = str_replace(
		//     array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
		//     array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
		//     $string
		// );

		// $string = str_replace(
		//     array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
		//     array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
		//     $string
		// );

		// $string = str_replace(
		//     array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
		//     array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
		//     $string
		// );

		// $string = str_replace(
		//     array('ñ', 'Ñ', 'ç', 'Ç'),
		//     array('n', 'N', 'c', 'C',),
		//     $string
		// );

		// Esta parte se encarga de eliminar cualquier caracter extraño
		$string = str_replace(
			array(
				"|", "!", "",
				"·", "$", "%", "&", "/",
				"(", ")", "?", "'", "¡",
				"¿", "[", "^", "<code>", "]",
				"+", "}", "{", "¨", "´",
				">", "< ", ";", ",", ":", ""
			),
			'',
			$string
		);

		return $string;
	}
}
