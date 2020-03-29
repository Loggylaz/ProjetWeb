<?php
ob_start()
?>
<form method="POST">
    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom">
    </div>
    <div class="form-group">
        <label for="idprix">Prix</label>
        <input type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="idprix" name="prix">
    </div>
    <div class="form-group">
        <label for="idstock">Stock</label>
        <input type="number" class="form-control" id="idstock" name="stock">
    </div>
    <div class="form-group">
        <label for="idpoid">Poid</label>
        <input type="text" class="form-control" id="idpoid" name="poid">
    </div>
    <div class="form-group">
        <label for="idmarque">Marque</label>
        <input type="text" class="form-control" id="idmarque" name="marque">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="categorieID">
            <?php foreach($categories as $categorie):?>
            <option value=<?=$categorie['id']?>><?=$categorie['nom']?></option>
            <?php endforeach?>
        </select>
    </div>
    <div class="form-group">
        <label for="idimage">Image</label>
        <input type="text" class="form-control" id="idimage" name="image">
    </div>
    <div class="form-group">
        <label for="iddescription">Description</label>
        <input type="text" class="form-control" id="iddescription" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter un article</button>
</form>
<?php
$title = "Ajouter un article";
$content = ob_get_clean();
include 'includes/template.php';
?>