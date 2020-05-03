<?php

if(empty($_SESSION['id'])){
    header('Location: '.ROOT_PATH);
    exit();
}

if(!empty($_POST['quantity'])){

    $article = array("id" => REQ_TYPE_ID, "quantity" => $_POST["quantity"]);

array_push($_SESSION['panier'], $article);

$_SESSION['message'] = "Votre article a bien été ajouté au panier";
$_SESSION['articleQty'] += $article['quantity'];
}
header("Location: ".ROOT_PATH."article#".$article['id']);



?>
