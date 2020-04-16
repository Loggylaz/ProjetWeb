<?php 
ob_start();

?>
<h3>Statistique</h3>
<script> 
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        theme: "light1",
        animationEnabled: true,
        title:{
            text: "Nombre de vente par article"
        },
        legend:{
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}</strong>",
            indexLabel: "{name} - {y}",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?> 
                    
                }] 
                });
    chart.render();
    }
    
    function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();
    
    }
    </script>

<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<?php
$title = "Statistique";
$content = ob_get_clean();
include('includes/template.php');
?>