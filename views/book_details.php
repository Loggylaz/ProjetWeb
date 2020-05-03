<?php 
ob_start();
?>
<br>
<h4>Commande du <?= $bookDetails[0]["dateCommande"] ?> par <?= $bookDetails[0]["userLogin"] ?></h4> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix Total</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($bookDetails as $details):?>
      <tr>
        <th scope="row"><?= str_replace("_", " ",$details['articleNom']) ?></th>
        <td><?= $details['prix'] ?></td>
        <td><?= $details['quantite'] ?></td>
        <td><?= $details['totalParArticle'] ?></td>
        <td><img src="<?= ROOT_PATH.$details['image'] ?>"width="100px" height="120px"></td>
        <td>
          <a href="<?=ROOT_PATH?>article/<?= $details['articleNom']?>" class="btn btn-primary">Détails de l'article</a>
        </td>
      </tr>
    <?php endforeach ?>

    <td set='0.2'>Total : <?=$bookDetails[0]["total"]?> €</td>
  </tbody>
</table>

<?php
  $title = "Détails de la Commande ".REQ_TYPE_ID;
  $content = ob_get_clean();
  include('includes/template.php');
?>