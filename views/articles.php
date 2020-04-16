<?php 
ob_start();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Identifiant</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($articles as $article):?>
    <tr>
      <th scope="row"><?= $article['id'] ?></th>
      <td><?= $article['nom'] ?></td>
      <td><?= $article['prix'] ?> €</td>
      <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="100px"></td>
      <td>
        <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Détails<a>
        <?php if($_SESSION):?>
        <a href="<?=ROOT_PATH?>panier/<?= $article['id']?>/add" class="btn btn-warning">Ajouter au panier</a>
        <?php endif?>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>

<h2>Card-deck :</h2>
            <div class="card-deck">
                <div class="card">
                    <div class="card-header"><?= $article['nom']." ".$article['prix'] ?> € </div>
                    <div class="card-body">
                        <h3 class="card-title"><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="100px"></h5>
                        <p class="card-text">Une ligne de texte dans notre première carte.</p>
                        <p class="card-text"><small class="text-muted"><a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Détails<a></p>
                    </div>
                    <div class="card-footer"><a href="<?=ROOT_PATH?>panier/<?= $article['id']?>/add" class="btn btn-warning">Ajouter au panier</a></div>
                </div>
                <div class="card">
                    <div class="card-header">En-tête de la seconde carte</div>
                    <div class="card-body">
                        <h3 class="card-title">Titre de la seconde carte</h5>
                        <p class="card-text">Une ligne de texte dans notre seconde carte.</p>
                    </div>
                    <div class="card-footer">Pied de la seconde carte</div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card">
                    <div class="card-header"><?= $article['nom']." ".$article['prix'] ?> € </div>
                    <div class="card-body">
                        <h3 class="card-title"><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="100px"></h5>
                        <p class="card-text">Une ligne de texte dans notre première carte.</p>
                        <p class="card-text"><small class="text-muted"><a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Détails<a></p>
                    </div>
                    <div class="card-footer"><a href="<?=ROOT_PATH?>panier/<?= $article['id']?>/add" class="btn btn-warning">Ajouter au panier</a></div>
                </div>
                <div class="card">
                    <div class="card-header">En-tête de la seconde carte</div>
                    <div class="card-body">
                        <h3 class="card-title">Titre de la seconde carte</h5>
                        <p class="card-text">Une ligne de texte dans notre seconde carte.</p>
                    </div>
                    <div class="card-footer">Pied de la seconde carte</div>
                </div>
            </div>
<?php
$title = "Articles";
$content = ob_get_clean();
include('includes/template.php');
?>

            
