<?php

class Conexion
{

	static public function conectar()
	{

		$link = new PDO(
			"mysql:host=mysql;dbname=accesoexterno;charset=utf8mb4",
			"chapasexterna",
			"Un2346Hyh654yhg"
		);

		$link->exec("set names utf8mb4");

		return $link;
	}

	// static public function conectar(){

	// 	$link = new PDO("mysql:host=localhost;dbname=pvunitelectronics;charset=utf8mb4",
	// 		            "root",
	// 		            "");

	// 	$link->exec("set names utf8mb4");

	// 	return $link;

	// }

}
