<?php

require_once ('conectar.php');
$conexion = conectar();

$serie =  $_POST ['serie'] ;
$temperatura = $_POST ['temp'];

mysqli_query ( $conexion, "INSERT INTO `datos` (`id`, `fecha`, `serie`, `temperatura`) VALUES (NULL, CURRENT_TIMESTAMP, '$serie', '$temperatura');" );
mysqli_close($conexion);
echo "¡Datos Ingresados! <br><br> <button><a href=inicio.php>Volver</a></button>";

?>