<?php

require 'models/users.php';
require 'models/articles.php';

if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3){
    header('location: '.ROOT_PATH);
    exit();
}
$articles = getAllFromArticles();

include 'views/admin_article.php';
?>