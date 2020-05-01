<?php

require "models/articles.php";
require "models/stats.php";
require "models/users.php";

if(empty($_SESSION['id']) || checkUserRole($_SESSION['id'] <= 2 )){
    header("Location: ".ROOT_PATH);
    exit();
}

$articles = AmountOfEachBoughtArticle();
$dataPoints = array();

foreach($articles as $article)
{
    $arrayTemp = array(str_replace("_"," ", $article['nom']), $article["quantite"]);
    array_push($dataPoints, $arrayTemp);
}


echo json_encode($dataPoints, JSON_NUMERIC_CHECK);


?>