<?php
require 'models/articles.php';
require 'models/users.php';
if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}
if(REQ_TYPE_ID){
    $article = getArticleByName(REQ_TYPE_ID);
}
else {
    header("Location: ".ROOT_PATH."admin_article");
    exit();
}
if(!$article){
    http_response_code(404);
    include 'views/404.php';
    exit();
}

if (!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['prix'])){
        setArticle($article['id'], $_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['poid'], $_POST['marque'], $_POST['categorieID'], $_POST['image'], $_POST['description']);
        $_SESSION['message'] = 'L\'article '.$article['nom'].' a bien été mis à jour';
        header("Location: ".ROOT_PATH."admin_article");
        exit();
}
else if(!empty($_POST['nom']) || !empty($_POST['prix'])){
    $_SESSION['error'] = "Le nom et le prix sont des champs obligatoire !";
}


include 'views/article_edit.php';
?>
