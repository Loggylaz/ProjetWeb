<?php

require "models/articles.php";
require "models/stats.php";

$articles = AmountOfEachBoughtArticle();
$dataPoints = array();

foreach($articles as $article)
{
    $arrayTemp = array(str_replace("_"," ", $article['nom']), $article["amount"]);
    array_push($dataPoints, $arrayTemp);
}


echo json_encode($dataPoints, JSON_NUMERIC_CHECK);


?>