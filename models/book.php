<?php

require_once 'models/db.php';

function getAllBooksByUserId($userId){
    $reponse = getDB()->prepare('SELECT * FROM COMMANDE WHERE utilisateurID = :id ORDER BY id ASC');
    $reponse->execute([':id' => $userId]);
    $books = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $books; 
}

function getAllBooksArticlesByCommandeID($bookId){
    $reponse = getDB()->prepare('SELECT * FROM COMMANDE_ARTICLE WHERE commandeID = :bookId');
    $reponse->execute([':bookId' => $bookId]);
    $booksArticles = $reponse->fetchAll();
    $reponse->closeCursor();
    return $booksArticles;
}

function createCommande($id, $total)
{
    $date = date("Y-m-d H:i:s");
    $reponse = getDB()->prepare('INSERT INTO COMMANDE SET utilisateurID = :utilisateurID, statutID = :statutID, total = :total, date = :date');
    $reponse->execute([':utilisateurID' => $id, 'statutID' => 1, ':total' => $total, ':date' => $date]);
    $reponse->closeCursor();
}

function getLastIdInserted($id)
{
    $reponse = getDB()->prepare('SELECT MAX(id) as commandeID FROM COMMANDE WHERE utilisateurID = :id');
    $reponse->execute([':id' => $id]);
    $lastInsertID = $reponse->fetch();
    $reponse->closeCursor();
    return $lastInsertID['commandeID'];
}

function createCommandeArticle($commandeID, $articleID, $prix, $quantite){
    $reponse = getDB()->prepare('INSERT INTO COMMANDE_ARTICLE SET commandeID = :commandeID, articleID = :articleID, prix = :prix, quantite = :quantite');
    $reponse->execute([':commandeID' => $commandeID, ':articleID' => $articleID, ':prix' => $prix, ':quantite' => $quantite]);
    $reponse->closeCursor();
}

function getEverythingBookedByUserId($userID, $caID, $articleID){
    $reponse = getDB()-> prepare('SELECT a.id AS articleID, a.nom AS articleNom, a.image AS articleImage, a.description AS articleDescription, ca.id AS commandeArticleID, ca.commandeID AS commandeID, ca.prix AS prix, c.utilisateurID AS userID, c.statutID AS statut, c.total AS total
        FROM article AS a
        JOIN commande_article AS ca
        ON a.id = ca.articleID
        JOIN commande AS c
        ON ca.commandeID = c.id
        WHERE c.utilisateurID = :userID AND ca.id = :caID AND a.id = :articleID');
    $reponse->execute([':userID' => $userID, ':caID' => $caID, ':articleID' => $articleID]);
    $articleEverything = $reponse->fetch();
    $reponse->closeCursor();
    return $articleEverything;
}

function getAllBooks(){
    $reponse = getDB()->query('SELECT u.id AS userID, u.nom AS login, ca.id AS commandeArticleID, ca.commandeID AS commandeID, ca.prix AS prix, c.date AS commandeDate, c.utilisateurID AS userID, c.statutID AS statut, c.total AS total
    FROM utilisateur AS u
    JOIN commande AS c
    ON u.id = c.utilisateurID
    JOIN commande_article AS ca
    ON ca.commandeID = c.id
    GROUP BY commandeID');
    $allBooks = $reponse->fetchAll();
    $reponse->closeCursor();
    return $allBooks;
}

// SELECT a.id AS articleID, a.nom AS articleNom, a.image AS articleImage, a.description AS articleDescription, ca.commandeID AS commandeID, ca.prix AS prix, c.utilisateurID AS userID, c.statutID AS statut, c.total AS total
// FROM article AS a
// JOIN commande_article AS ca
// ON a.id = ca.articleID
// JOIN commande AS c
// ON ca.commandeID = c.id
// WHERE c.utilisateurID = 2

?>