<?php


// array_push($_SESSION['panier'], REQ_TYPE_ID);


// $_SESSION['message'] = "Votre article a bien été ajouté au panier";

// header("Location: ".ROOT_PATH."article");

//-------------------------------------------------------------
// Bon code pour quantity !

if(!empty($_POST['quantity'])){
//     $article = array("id" => REQ_TYPE_ID, "quantity" => 1);
// }
// else{
    $article = array("id" => REQ_TYPE_ID, "quantity" => $_POST["quantity"]);

array_push($_SESSION['panier'], $article);

$_SESSION['message'] = "Votre article a bien été ajouté au panier";
}
header("Location: ".ROOT_PATH."article#articleIn");

?>
