<?php

ob_start();
?>
<pre>
<?php
print_r($lol);
?>
</pre>
<h3>Panier</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Quantité</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article) :  ?>
      <tr>
        <th scope="row"><?= $article['id'] ?></th>
        <td><?= $article['nom'] ?></td>
        <td><?= $article['prix'] ?></td>
        <td><?= $quantite ?></td>
        <td><img src="<?= ROOT_PATH . $article['image'] ?>" width="100px" height="100px"></td>
        <td>
          <a href="<?= ROOT_PATH ?>article/<?= $article['nom'] ?>" class="btn btn-primary">Voir</a>
          <a href="<?= ROOT_PATH ?>panier/<?= $article['id'] ?>/delete" class="btn btn-danger">Supprimer</a>

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