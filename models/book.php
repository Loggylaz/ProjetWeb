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

function createCommande($id)
{
    $reponse = getDB()->prepare('INSERT INTO COMMANDE SET utilisateurID = :utilisateurID, statutID = :statutID');
    $reponse->execute([':utilisateurID' => $id, 'statutID' => 1]);
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

function createCommandeArticle($commandeID, $articleID, $prix){
    $reponse = getDB()->prepare('INSERT INTO COMMANDE_ARTICLE SET commandeID = :commandeID, articleID = :articleID, prix = :prix');
    $reponse->execute([':commandeID' => $commandeID, ':articleID' => $articleID, ':prix' => $prix]);
    $reponse->closeCursor();
}

?>