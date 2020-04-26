<?php 
ob_start();
?>
<h3>Liste des Commandes</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Utilisateur</th>
      <th scope="col">Date de commande</th>
      <th scope="col">Prix total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($books as $book):?>
    <tr>
      <th scope="row"><?= $book['login'] ?></th>
      <td><?= $book['commandeDate'] ?></td>
      <td><?= $book['total'] ?> €</td>
      <td>
          <a href="<?=ROOT_PATH?>admin_books/<?= $book['commandeID'] ?>" class="btn btn-primary">Voir</a>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
<?php
$title = "Administration";
$content = ob_get_clean();
include('includes/template.php');
?>