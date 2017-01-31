<?php

require_once ('conectar.php');
conectar();

/*
$resultado = mysql_query("SELECT serie, temperatura FROM datos"); 
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$fila = mysql_fetch_row($resultado);

echo $fila[0]; // 42
echo $fila[1]; // el valor de email

function temperatura_diaria () {
        $resultado=mysql_query("SELECT temperatura FROM datos ");

        while ($row=mysql_fetch_array($resultado)){
            echo "[";
            echo $row[0]*1000;
            echo ",";
            echo $row[1];
            echo "],";
            for ($x=0;$x<$intervalo;$x++){
                $row=mysql_fetch_array($resultado);
            }
        }
        mysql_close();
    }
*/
function tem(){
	$resultado = mysql_query("SELECT temperatura FROM datos");

	while ($row=mysql_fetch_array($resultado)){
        echo $row[0];
        $nuevo = $row;
    }
}
tem();
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
	            data: [2]
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
