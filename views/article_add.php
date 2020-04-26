<?php
ob_start()
?>
<form enctype="multipart/form-data" id="formArticle" method="POST">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Nom</span>
    </div>
    <input type="text" class="form-control" placeholder="Pas de caractères spéciaux" aria-label="name" aria-describedby="basic-addon1" name="nom">
  </div>
  <div class="input-group mb-3">
    <input type="text" min="0.00" max="10000.00" set="0.1" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="0,00" name="prix">
    <div class="input-group-prepend">
      <span class="input-group-text">€</span>
    </div>
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Stock</span>
    </div>
    <input type="number" class="form-control" placeholder="Stock" aria-label="stock" aria-describedby="basic-addon1" name="stock">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Poid</span>
    </div>
    <input type="text" class="form-control" placeholder="Poid" aria-label="poid" aria-describedby="basic-addon1" name="poid">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1">Marque</span>
    </div>
    <input type="text" class="form-control" placeholder="Marque/Variété" aria-label="marque" aria-describedby="basic-addon1" name="marque">
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
    </div>
    <select class="custom-select" id="inputGroupSelect01" name="categorieID">
      <?php foreach ($categories as $categorie) : ?>
        <option value=<?= $categorie['id'] ?>><?= $categorie['nom'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
  </div>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Description</span>
    </div>
    <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="description"></textarea>
  </div>
  <br>
  <button type="submit" value="submit" class="btn btn-primary">Ajouter un article</button>
</form>
<?php
$title = "Ajouter un article";
$content = ob_get_clean();
include 'includes/template.php';
?>