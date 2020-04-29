<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/flatly.min.css">
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="jumbotron">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Prix Total</th>
      <th scope="col">Quantité</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article) :  ?>
      <tr>
        <td><?= str_replace("_", " ", $article['article']['nom']) ?></td>
        <td><?= $article['article']['prix'] ?></td>
        <td><?= $article["totalArticle"]?></td>
        <td><?= $article['quantity'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <td><h4>Total : <?= $total ?> €</h4></td>
</table>
</body>
</html>
