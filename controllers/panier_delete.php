<?php

$key = array_search(REQ_TYPE_ID, $_SESSION['panier']);

unset($_SESSION['panier'][$key]);

$_SESSION['articleQty'] -= $article['quantity'];

header('location: '.ROOT_PATH.'panier')
?>