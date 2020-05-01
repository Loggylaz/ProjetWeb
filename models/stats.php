<?php 

require_once "models/db.php";

function totalRevenue(){
    $reponse = getDB()->query('SELECT SUM(total) FROM commande');
    $total = $reponse->fetch();
    $reponse->closeCursor();
    return $total;
}

function AmountOfEachBoughtArticle(){
    $reponse = getDB()->query('SELECT a.nom AS nom, SUM(ca.quantite) AS quantite
    FROM article AS a
    JOIN commande_article AS ca
    ON a.id = ca.articleID
    GROUP BY a.id');
    $article = $reponse->fetchAll();
    $reponse->closeCursor();
    return $article;
}

function mostBoughtArticle(){
    $reponse = getDB()->query('SELECT articleID, COUNT(articleID) FROM commande_article GROUP BY articleID');
    $article = $reponse->fetchAll();
    $reponse->closeCursor();
    return $article;
}

function amountOfCustomers(){
    $reponse = getDB()->query('SELECT COUNT(*) FROM utilisateur WHERE roleID = 3');
    $users = $reponse->fetch();
    $reponse->closeCursor();
    return $users;
}

function amountOfBooks(){
    $reponse = getDB()->query('SELECT COUNT(*) FROM commande');
    $books = $reponse->fetch();
    $reponse->closeCursor();
    return $books;
}

function getPurchaseAmountForClients()
{
    $reponse = getDB()->query('SELECT SUM(c.total) as total, u.login as login
    FROM commande AS c
    JOIN utilisateur AS u
    ON c.utilisateurID = u.ID
    GROUP BY utilisateurID');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

?>