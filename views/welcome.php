<?php
ob_start();
?>

<img src="<?=ROOT_PATH?>/public/images/welcome.jpg" style="width: 100%; height: 600px;" >

<?php
$title="Bienvenue à la superette Super Chouette ! ";
$content=ob_get_clean();
include 'includes/template.php';
?>

