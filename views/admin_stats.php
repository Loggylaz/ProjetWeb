<?php 
ob_start();
?>
<h3>Statistique</h3>

<div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<br>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>


<?php
$title = "Statistique";
$content = ob_get_clean();
include('includes/template.php');
?>