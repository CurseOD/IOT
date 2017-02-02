<?php

function conectar(){

	// Conectando y seleccionando la base de datos
	$conexion = mysqli_connect("localhost", "root", "") or die('No se pudo conectar: ' . mysql_error());
	mysqli_select_db($conexion, "frigorifico");
	return $conexion;
}
?>