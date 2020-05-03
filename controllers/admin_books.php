<?php
require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id']) || checkUserRole($_SESSION['id'] >= 3 )){
    header("Location: ".ROOT_PATH);
    exit();
}

if (!REQ_TYPE_ID)
{
    $books = getAllBooks();
    include 'views/admin_books.php';

}else{
    $bookDetails = getBookDetailsByCommandeID(REQ_TYPE_ID);
    include 'views/book_details.php';
}

?>