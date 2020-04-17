<?php
ob_start()
?>
<form enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="idid">Identifiant</label>
        <input type="text" class="form-control" id="idid" name="id" value="<?= $article['id']?>" readonly>
    </div>
    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom" value="<?= $article['nom']?>">
    </div>
    <div class="form-group">
        <label for="idprix">Prix</label>
        <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="idprix" name="prix" value="<?= $article['prix']?>">
    </div>
    <div class="form-group">
        <label for="idstock">Stock</label>
        <input type="number" class="form-control" id="idstock" name="stock" value="<?= $article['stock']?>">
    </div>
    <div class="form-group">
        <label for="idpoid">Poid</label>
        <input type="text" class="form-control" id="idpoid" name="poid" value="<?= $article['poid']?>">
    </div>
    <div class="form-group">
        <label for="idmarque">Marque</label>
        <input type="text" class="form-control" id="idmarque" name="marque" value="<?= $article['marque']?>">
    </div>
    <div class="form-group">
        <label for="idcategorieID">Catégorie</label>
        <input type="number" class="form-control" id="idcategorieID" name="categorieID" value="<?= $article['categorieID']?>">
    </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name='image'>
  </div>
    <div class="form-group">
        <label for="iddescription">Description</label>
        <input type="text" class="form-control" id="iddescription" name="description" value="<?= $article['description']?>">
    </div>
    <button type="submit" value="submit" class="btn btn-primary">Editer</button>
</form>
<?php
$title = "Editer";
$content = ob_get_clean();
include 'includes/template.php';
?>
