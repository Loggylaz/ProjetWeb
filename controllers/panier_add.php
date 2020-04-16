<?php


array_push($_SESSION['panier'], REQ_TYPE_ID);


$_SESSION['message'] = "Votre article a bien été ajouté au panier";

header("Location: ".ROOT_PATH."article");
?>
