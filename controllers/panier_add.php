<?php
array_push($_SESSION['panier'], REQ_TYPE_ID);

header("Location: ".ROOT_PATH."article");
?>
