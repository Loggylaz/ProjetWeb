<?php

require "models/articles.php";
require "models/stats.php";


$articles = AmountOfEachBoughtArticle();
$dataPoints = array();

foreach($articles as $article)
{
    $arrayTemp = array("name" => $article['nom'], "y" => $article["amount"]);
    array_push($dataPoints, $arrayTemp);
}

$chiffreClients = getPurchaseAmountForClients();
$dataPoints2 = array();

foreach($chiffreClients as $chiffreClient)
{
    $tempArray = array('name' => $chiffreClient['utilisateurPrenom'], 'y' => $chiffreClient['totalParUtilisateur']);
    array_push($dataPoints2, $tempArray);
}
include 'views/admin_stats.php';
?>