<?php ob_start();?>
<form method="POST" id="signup">
    <div class="form-group">
        <label for="idlogin">Nom d'utilisateur</label>
        <input type="text" maxlength="12" placeholder="Pas de caractères spéciaux ni d'espace" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idmdp">Mot de passe</label>
        <input type="password" class="form-control" id="idmdp" name="mdp">
    </div>
    <div class="form-group">
        <label for="idconfirmmdp">Confiirmez votre mot de passe</label>
        <input type="password" class="form-control" id="idconfirmmdp" name="confirmmdp">
    </div>
    <div class="form-group">
        <label for="idemail">Adresse Email</label>
        <input type="email" class="form-control" id="idemail" name="email">
    </div>
    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom">
    </div>
    <div class="form-group">
        <label for="idprenom">Prenom</label>
        <input type="text" class="form-control" id="idprenom" name="prenom">
    </div>
    <button type="submit" class="btn btn-primary">S'enregistrer</button>
</form>
<?php
$title = "Créer un compte";
$content = ob_get_clean();
include 'includes/template.php';
?>
