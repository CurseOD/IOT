<?php
    require_once ('conectar.php');
    conectar();
    
    $serie = "777";
    $mes = "11";
    $dia = "20";
    $intervalo=0;
    temperatura_diaria("777", "0", "11", "20");
    temperatura_diaria("777", "0", "11", "20");

    function temperatura_diaria ($serie,$intervalo,$mes,$dia) {
        $ano=date("Y");
        $resultado=mysql_query("SELECT UNIX_TIMESTAMP(fecha), temperatura FROM datos WHERE year(`fecha`) = '$ano' AND month(`fecha`) = '$mes' AND day(`fecha`) = '$dia' AND `serie`= '$serie'");
echo($resultado);
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
?>

<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'line',
                zoomType: 'x'
            },
            colors: ['#337ab7', '#cc3c1a'],
            title: {
                text: 'Temperatura en el dÃ­a'
            },
            xAxis: {
                type: 'datetime',
            },
            yAxis: {
                title: {
                    text: 'Temperatura'
                }
            },
            series: [{
                name: 'Temp',
                data: [<?php temperatura_diaria("777", "0", "11", "20");?>]
            },],
        });
    });
</script>

<!DOCTYPE html>
<html lang="en">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <head>
        <meta charset="UTF-8">
        <title>Datos</title>
    </head>
    <body>
        <div id="container" style="width: 100%; height: 400px;"></div>
    </body>
</html>