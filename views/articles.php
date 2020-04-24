<?php
ob_start();
?>

  <?php foreach ($categories as $categorie) : ?>
    <a href="<?= ROOT_PATH ?>article/<?= $categorie['direction'] ?>" style=" width:24%; margin-top: 10px; margin-left:5px; margin-right:3px;" class="btn btn-primary <?= $categorie['active'] ?>" type="radio"><?= $categorie['nom'] ?></a>
  <?php endforeach ?>

<br>
<br>
<div class="card-deck">
  <div class="row">
    <?php foreach ($articles as $article) : ?>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card" id="<?=$article['id']?>" style="width: 91%;">
          <img class="card-img-top" src="<?= ROOT_PATH . $article['image'] ?>" width="325" height="225" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title"><?= str_replace("_", " ", $article["nom"]) ?></h3>
            <h5 class="card-subtitle"><?= $article['categorieNom'] ?></h5>
            <br>
            <h5 class="card-subtitle"><?= $article['prix'] ?> €</h5>
            <a href="<?= ROOT_PATH ?>article/<?= $article['nom'] ?>" class="btn btn-primary">Détails</a>
          </div>
          <div class="card-footer">
          <?php if ($_SESSION) : ?>
            <form action="<?= ROOT_PATH ?>panier/<?= $article['id'] ?>/add" method="POST">
              <label for="quantity">Quantité:</label>
              <input type="number" id="quantity" name="quantity" value="0" min="0" max="100">
              <button type="submit" value="submit" class="btn btn-warning">Ajouter au panier</button>
            </form>
            <?php endif ?>
          </div>
        </div>
        <br>
      </div>
    <?php endforeach ?>
  </div>
  <br>
</div>
<?php
$title = "Articles";
$content = ob_get_clean();
include('includes/template.php');
?>
