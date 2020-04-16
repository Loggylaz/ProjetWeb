<?php 
ob_start();
?>
<h3>Merci !!</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($articles as $article):  ?>
    <tr>
      <th scope="row"><?= $article['id'] ?></th>
      <td><?php date('Y-m-d')?></td>
      <td><?= $article['nom'] ?></td>
      <td><?= $article['prix'] ?></td>
      <td><img src="<?= ROOT_PATH.$article['image']?>" width="100px" height="100px"></td>
      <td>
            <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Voir</a>
            
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
  <td>Total = <?=$total?> €</td>
</table>
<?php
$title = "Commande effectuée !";
$content = ob_get_clean();
include('includes/template.php');
?>