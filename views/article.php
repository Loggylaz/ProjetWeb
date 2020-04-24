<?php ob_start(); ?>
<img src="<?= ROOT_PATH . $article['image'] ?>" width="325" height="250">

<div  style="float:right; margin-top:40px">
<dl class="row">
    <dt class="col-sm-2"><h4>Prix</h4></dt> 
    <dd class="col-sm-10"><?= $article['prix']?> €</dd>
    <dt class="col-sm-2"><h4>Poid</h4></dt> 
    <dd class="col-sm-10"><?= $article['poid']?></dd>
    <dt class="col-sm-2"><h4>Marque</h4></dt> 
    <dd class="col-sm-10"><?= $article['marque']?></dd>
    <dt class="col-sm-2"><h4>Stock</h4></dt> 
    <dd class="col-sm-10"><?= $article['stock']?></dd>
    
</dl>
</div>
<br>
<br>
<dl>
    <dt class="col-sm-2"><h4>Description</h4></dt> 
    <dd class="col-sm-10"><?= $article['description']?></dd>
</dl>
<br>
<a href="<?= ROOT_PATH ?>article#<?= $article['id'] ?>" class="btn btn-primary">Revenir aux articles</a>
<?php
$title=$article['nom'];
$content = ob_get_clean();
include 'includes/template.php';
?>
