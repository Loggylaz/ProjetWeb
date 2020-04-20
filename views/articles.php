<?php
ob_start();
?>
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
</div>
<br>
<div class="card-deck">
  <div class="row">
    <?php foreach ($articles as $article) : ?>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card" style="width: 91%;">
          <img class="card-img-top" src="<?= ROOT_PATH . $article['image'] ?>" width="325" height="225" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title"><?= str_replace("_", " ", $article["nom"]) ?></h3>
            <h5 class="card-subtitle"><?= $article['categorieNom'] ?></h5>
            <br>
            <h5 class="card-subtitle"><?= $article['prix'] ?> €</h5>
            <a href="<?= ROOT_PATH ?>article/<?= $article['id'] ?>" class="btn btn-primary">Détails<a>
          </div>
          <div class="card-footer">
          <?php if ($_SESSION) : ?>
            <form id="articleIn" action="<?= ROOT_PATH ?>panier/<?= $article['id'] ?>/add" method="POST">
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
