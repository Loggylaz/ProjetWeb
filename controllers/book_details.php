<?php
require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

$date = getdate();

if(REQ_TYPE_ID){
    $commandes = getAllBooks();
    $articles=array();

    foreach($commandes as $commande){
        $commande_articlesTemp = getAllBooksArticlesByCommandeID($commande['id']);
}
} 
else {
    header("Location: ".ROOT_PATH."login");
    exit();
}


include 'views/book_details.php';
?>