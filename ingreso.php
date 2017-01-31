<?php

require_once ('conectar.php');
conectar();

$serie =  $_POST ['serie'] ;
$temperatura = $_POST ['temp'];


mysql_query ( "INSERT INTO `datos` (`id`, `fecha`, `serie`, `temperatura`) VALUES (NULL, CURRENT_TIMESTAMP, '$serie', '$temperatura');" );

mysql_close();

echo "Datos ingresados correctamente!";




?>