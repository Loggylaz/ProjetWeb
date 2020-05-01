<?php 
ob_start();
//include("includes/stats_scripts.php");
?>
<script src="<?=ROOT_PATH?>public/js/stats.js"></script>
<h3>Statistique</h3>

<div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>



<?php
$title = "Statistique";
$content = ob_get_clean();
include('includes/template.php');
?>