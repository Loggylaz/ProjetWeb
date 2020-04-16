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
include 'views/admin_stats.php';
?>