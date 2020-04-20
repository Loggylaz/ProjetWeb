<?php
ob_start();
?>
<h3>Panier</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Prix Total</th>
      <th scope="col">Quantité</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article) :  ?>
      <tr>
        <th scope="row"><?= $article['article']['id'] ?></th>
        <td><?= $article['article']['nom'] ?></td>
        <td><?= $article['article']['prix'] ?></td>
        <td><?= $article["totalArticle"]?></td>
        <td><?= $article['quantity'] ?></td>
        <td><img src="<?= ROOT_PATH . $article['article']['image'] ?>" width="100px" height="100px"></td>
        <td>
          <a href="<?= ROOT_PATH ?>article/<?= $article['article']['nom'] ?>" class="btn btn-primary">Voir</a>
          <a href="<?= ROOT_PATH ?>panier/<?= $article['article']['id'] ?>/delete" class="btn btn-danger">Supprimer</a>

        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <td>Total = <?= $total ?> €</td>
</table>
<?php if (!empty($_SESSION['panier'])) : ?>
  <a href="<?= ROOT_PATH ?>commande" class="btn btn-warning">Passer Commande</a>
<?php endif ?>
<?php
$title = "Panier";
$content = ob_get_clean();
include('includes/template.php');
?>