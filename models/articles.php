<?php
require_once 'models/db.php';

function getAllFromArticles(){
    $reponse = getDB()->query('SELECT a.id AS id, a.nom AS nom, prix, categorieID, marque, stock, poid, image, description, c.nom AS categorieNom
    FROM article AS a
    JOIN categorie AS c
    ON a.categorieID = c.id WHERE actif = 1');
    $articles = $reponse->fetchAll();
    $reponse->closeCursor();
    return $articles;
}

// La fonction getArticles retourne l'ensemble des données.
// function getArticles() {
//     global $data; // portée globale afin de disposer de la liste. Sans le mot clé global, la variable data sera locale et donc null
//     return $data;
// }



function getArticle($id) {
    $articles = getAllFromArticles();
    foreach($articles as $article) {
        if ($id == $article['id']) {
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
    $reponse->execute([':id' => $id, ':nom' => str_replace(" ", "_", $nom), ':prix' => $prix, ':stock' => $stock, ':poid' => $poid, ':marque' => $marque, ':categorieID' => $categorieID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function createArticle($nom, $prix, $stock = "", $poid = "", $marque = "", $categorieID = "", $image = "", $description = "")
{
    $reponse = getDB()->prepare('INSERT INTO ARTICLE SET nom = :nom, prix = :prix, stock = :stock, poid = :poid, marque = :marque, categorieID = :categorieID, image = :image, description = :description');
    $reponse->execute([':nom' => str_replace(" ", "_", $nom), ':prix' => $prix, ':stock' => $stock, ':poid' => $poid, ':marque' => $marque, ':categorieID' => $categorieID, ':image' => $image, ':description' => $description]);
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
    $reponse = getDB()->prepare("UPDATE ARTICLE SET actif = 0 WHERE id = :id");
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

function getAllArticlesByCategorie($nom)
{
    $reponse = getDB()->prepare('SELECT a.id AS id, a.nom AS nom, prix, categorieID, marque, stock, poid, image, description, c.nom AS categorieNom
    FROM article AS a
    JOIN categorie AS c
    ON a.categorieID = c.id WHERE actif = 1 AND c.nom = :nom');;
    $reponse->execute([':nom' => $nom]);
    $article = $reponse->fetchAll();
    $reponse->closeCursor();
    return $article;
}

?>
