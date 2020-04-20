<?php ob_start(); ?>
<pre><?=print_r($article)?></pre>
<img src="<?= ROOT_PATH . $article['image'] ?>" width="325" height="250">
<dl class="row">
    <dt class="col-sm-2">Nom</dt> 
    <dd class="col-sm-10"><?= $article['nom']?></dd>
    <dt class="col-sm-2">Description</dt> 
    <dd class="col-sm-10"><?= $article['description']?></dd>
    <dt class="col-sm-2">Prix</dt> 
    <dd class="col-sm-10"><?= $article['prix']?> €</dd>
</dl>
<?php
$title=$article['nom'];
$content = ob_get_clean();
include 'includes/template.php';
?>
