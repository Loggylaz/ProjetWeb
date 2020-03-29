<?php ob_start()?>
<form method="POST">
    <div class="form-group">
        <label for="idlogin">Utilisateur</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idmdp">Mot de passe</label>
        <input type="password" class="form-control" id="idmdp" name="mdp">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
    <a href="<?=ROOT_PATH?>signup" class="btn btn-primary">S'enregistrer</a>
</form>
<?php
$title = "Se connecter";
$content = ob_get_clean();
include 'includes/template.php';
?>
