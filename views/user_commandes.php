<?php
print_r($commande_articles);
ob_start();
?>
<h3>Mes Commandes</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
  <pre>
<?php
print_r ($commande);
?>
</pre>
<?php foreach($commandes as $commande): ?>
<?php foreach($articles as $article):  ?>
    <tr>
      <th scope="row"><?= $article['id'] ?></th>
      <td><?= $article['nom'] ?></td>
      <td><?= $article['prix'] ?></td>
      <td><img src="<?= ROOT_PATH.$article['image']?>" width="100px" height="100px"></td>
      <td>
            <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Voir</a>
            
      </td>

    </tr>

<?php endforeach ?>

      <th>Total = <?=$total?> €</th>
      <hr>
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