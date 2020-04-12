<?php

require_once 'models/db.php';

function getAllBooksByUserId($userId){
    $reponse = getDB()->prepare('SELECT * FROM COMMANDE WHERE utilisateurID = :id');
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

?>