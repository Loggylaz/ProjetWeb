<?php

require "models/articles.php";
require "models/stats.php";


$chiffreClients = getPurchaseAmountForClients();
$dataPoints = array();

foreach($chiffreClients as $chiffreClient)
{
    $tempArray = array($chiffreClient['utilisateurLogin'], $chiffreClient['totalParUtilisateur']);
    array_push($dataPoints, $tempArray);
}


echo json_encode($dataPoints, JSON_NUMERIC_CHECK);


?>