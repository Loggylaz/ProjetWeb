<?php
ob_start();
?>
<h3>Mes Commandes</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($commandes as $commande): ?>

<?php foreach($articles as $article):  ?>
  <?php if($article['commandeID'] == $commande['id']): ?>
    <tr>
      <td><?= $article['articleNom'] ?></td>
      <td><?= $article['prix'] ?></td>
      <td><img src="<?= ROOT_PATH.$article['articleImage']?>" width="100px" height="100px"></td>
      <td>
            <a href="<?=ROOT_PATH?>article/<?= $article['articleNom']?>" class="btn btn-primary">Voir</a>
            
      </td>

    </tr>
  <?php endif ?>
  <?php endforeach ?>
  <th>Date de commande: <?= $commande['date']?></th>
      <th>Total = <?=$commande['total']?> €</th>

<?php endforeach ?>

  </tbody>
</table>
<?php if(!empty($_SESSION['panier'])):?>
        <a href="<?=ROOT_PATH?>commande" class="btn btn-warning">Passer Commande</a>
        <?php endif?>
<?php
$title = "Mes Commandes";
$content = ob_get_clean();
include('includes/template.php');
?>