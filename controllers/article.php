<?php
require 'models/articles.php';
if (!REQ_TYPE_ID) {
    $articles = getAllFromArticles();
    include 'views/articles.php';
} else {
    $article = getArticle(REQ_TYPE_ID);
    include 'views/article.php';
}
?>
