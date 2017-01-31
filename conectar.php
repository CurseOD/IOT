<?php
	function conectar () {
		$conexion = mysql_connect("localhost", "root", "");
		mysql_select_db("frigorifico", $conexion);
		mysql_query("SET NAMES 'utf8'");
	}
?>