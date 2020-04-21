<?php
require 'models/articles.php';

$categoriesTemp = getAllFromCategories();
$categoriesNoms = array();

foreach($categoriesTemp as $categorie){
    array_push($categoriesNoms, $categorie['nom']);
}

if (!REQ_TYPE_ID) {
    $articles = getAllFromArticles();
    $categories = array();
    foreach($categoriesTemp as $categorieTemp){
            array_push($categories, array('id' => $categorieTemp['id'], 'nom' => $categorieTemp['nom'], 'direction' => $categorieTemp['nom'], 'actif' => ''));
        }

    include 'views/articles.php';

} else if(in_array(REQ_TYPE_ID, $categoriesNoms)) {
    $articles = getAllArticlesByCategorie(REQ_TYPE_ID);
    $activeCategorie = REQ_TYPE_ID;

    $categories = array();
    foreach($categoriesTemp as $categorieTemp){
        if($categorieTemp['nom'] == REQ_TYPE_ID){
            array_push($categories, array('id' => $categorieTemp['id'], 'nom' => $categorieTemp['nom'], 'direction' => '', 'actif' => 'actif'));
        }else{
            array_push($categories, array('id' => $categorieTemp['id'], 'nom' => $categorieTemp['nom'], 'direction' => $categorieTemp['nom'], 'actif' => ''));
        }
    }
    include 'views/articles.php';
}

else {
    $article = getArticle(REQ_TYPE_ID);
    $article["nom"] = str_replace("_", " ", $article["nom"]);
    include 'views/article.php';
}
?>
