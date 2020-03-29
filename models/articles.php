<?php
require_once 'models/db.php';
// La variable data est une liste contenant l'ensemble des données. 1 élément = 1 donnée.
// A terme, les données seront récupérées depuis une db et injectées dans des objets php
function getAllFromArticles(){
    $reponse = getDB()->query('SELECT * FROM ARTICLE');
    $articles = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $articles;
}

// La fonction getArticles retourne l'ensemble des données.


function getArticle($nom) {
    $articles = getAllFromArticles();
    foreach($articles as $article) {
        if (strtolower($nom) == strtolower($article['nom'])) {
            return $article;
        }
    }
}

function getAllFromCategories(){
    $reponse = getDB()->query('SELECT * FROM CATEGORIE');
    $categories = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $categories;
}
function getCategorie($nom) {
    $categories = getAllFromCategories();
    foreach($categories as $categorie) {
        if (strtolower($nom) == strtolower($categorie['nom'])) {
            return $categorie;
        }
    }
}


?>
