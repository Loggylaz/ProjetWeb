<?php
require_once 'models/db.php';

function getAllFromArticles(){
    $reponse = getDB()->query('SELECT * FROM ARTICLE');
    $articles = $reponse->fetchAll();
    $reponse->closeCursor();
    return $articles;
}

// La fonction getArticles retourne l'ensemble des données.
// function getArticles() {
//     global $data; // portée globale afin de disposer de la liste. Sans le mot clé global, la variable data sera locale et donc null
//     return $data;
// }



function getArticle($nom) {
    $articles = getAllFromArticles();
    foreach($articles as $article) {
        if (strtolower($nom) == strtolower($article['nom'])) {
            return $article;
        }
    }
}

function getArticleByName($nom) {
    $reponse = getDB()->prepare('SELECT * FROM ARTICLE WHERE nom = :nom');
    $reponse->execute([':nom' => $nom]);
    $article = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $article;
}

function getArticleById($id){
    $reponse = getDB()->prepare('SELECT * FROM ARTICLE WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $article;
}

function setArticle($id, $nom, $prix, $stock = "", $poid = "", $marque = "", $categorieID = "", $image = "", $description = "")
{
    $reponse = getDB()->prepare('UPDATE ARTICLE SET nom = :nom, prix = :prix, stock = :stock, poid = :poid, marque = :marque, categorieID = :categorieID, image = :image, description = :description WHERE id = :id');
    $reponse->execute([':id' => $id, ':nom' => $nom, ':prix' => $prix, ':stock' => $stock, ':poid' => $poid, ':marque' => $marque, ':categorieID' => $categorieID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function createArticle($nom, $prix, $stock = "", $poid = "", $marque = "", $categorieID = "", $image = "", $description = "")
{
    $reponse = getDB()->prepare('INSERT INTO ARTICLE SET nom = :nom, prix = :prix, stock = :stock, poid = :poid, marque = :marque, categorieID = :categorieID, image = :image, description = :description');
    $reponse->execute([':nom' => $nom, ':prix' => $prix, ':stock' => $stock, ':poid' => $poid, ':marque' => $marque, ':categorieID' => $categorieID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function getAllFromCategories()
{
    $reponse = getDB()->query('SELECT * FROM CATEGORIE');
    $categories = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $categories;
}

function deleteArticle($id)
{
    $reponse = getDB()->prepare("DELETE FROM ARTICLE WHERE id = :id");
    $reponse->execute([':id' => $id]);
    $reponse->closeCursor();
}

function getCategorie($id)
{
    $categories = getAllFromCategories();
    foreach ($categories as $categorie) {
        if ($id == $categorie['id']) {
            return $categorie;
        }
    }
}

function checkArticleExists($nom)
{
    $article = getArticleByName($nom);
    if (!$article) {
        return true;
    }
}

?>
