<?php 

require_once "models/db.php";

function totalRevenue(){
    $reponse = getDB()->query('SELECT SUM(total) FROM commande');
    $total = $reponse->fetch();
    $reponse->closeCursor();
    return $total;
}

function AmountOfEachBoughtArticle(){
    $reponse = getDB()->query('SELECT a.nom AS nom, ca.articleID AS articleID, COUNT(ca.articleID) AS amount
    FROM commande_article AS ca
    JOIN article AS a
    ON a.id = ca.articleID
    GROUP BY articleID
    ORDER BY amount DESC');
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
    $reponse = getDB()->query('SELECT u.id AS utilisateurID, u.login AS utilisateurLogin, u.prenom AS utilisateurPrenom, u.nom AS utilisateurNom, 
    COUNT(DISTINCT(c.id)) AS countCommande, 
    COUNT(ca.id) AS countArticle, 
    SUM(c.total) AS totalParUtilisateur 
    FROM utilisateur AS u 
    JOIN commande AS c 
    ON u.id = c.utilisateurID 
    JOIN commande_article AS ca 
    ON ca.commandeID = c.id
    GROUP BY u.id');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

?>