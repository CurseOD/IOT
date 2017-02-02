<?php

function tem () {

	require_once ('conectar.php');
	$conexion = conectar();
    $result=mysqli_query($conexion, "SELECT temperatura FROM datos");

	//echo "<table>\n";
	while ($line = mysqli_fetch_array($result, MYSQLI_NUM)) {
	    //echo "\t<tr>\n";
	    
	    foreach ($line as $col_value) {

	        //echo "\t\t<td>$col_value</td>\n";
	        echo $col_value;
	        echo ",";
	    }
	    
	    //echo "\t</tr>\n";
	}
	//echo "</table>\n";
    // Liberar resultados
	mysqli_free_result($result);

	// Cerrar la conexión
	mysqli_close($conexion);
}

?>

<!DOCTYPE html>
<html lang="es">
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(function () {
	    Highcharts.chart('container', {
	        chart: {
	            type: 'line'
	        },
	        title: {
	            text: 'Mediciones mensuales'
	        },
	        subtitle: {
	            text: 'Indicador: Tempe.cl'
	        },
	        xAxis: {
	            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
	        },
	        yAxis: {
	            title: {
	                text: 'Temperatura (Celcius)'
	            }
	        },
	        plotOptions: {
	            line: {
	                dataLabels: {
	                    enabled: true
	                },
	                enableMouseTracking: false
	            }
	        },
	        series: [{
	            name: 'China',
	            data: [<?php tem();?>]
	        }, {
	            name: 'Korea',
	            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
	        }]
	    });
	});
	</script>
<head>
	<meta charset="UTF-8">
	<title>Pruebas</title>
</head>
	<body>
			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
