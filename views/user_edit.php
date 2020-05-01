<?php
ob_start();
?>
<form method="POST">
    <div class="form-group">
        <label for="idid">Identifiant</label>
        <input type="text" class="form-control" id="idid" name="id" value="<?= $user['id']?>" readonly>
    </div>
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" maxlength="12" placeholder="Pas de caractères spéciaux ni d'espace" class="form-control" id="idlogin" name="login" value="<?= $user['login']?>">
    </div>
    <div class="form-group">
        <label for="idemail">Email</label>
        <input type="email" class="form-control" id="idemail" name="email" value="<?= $user['email']?>">
    </div>
    <div class="form-group">
        <label for="idmdp">Password</label>
        <input type="password" class="form-control" id="idpassword" name="mdp">
    </div>
    <div class="form-group">
        <label for="idconfirmpassword">Confirm password</label>
        <input type="password" class="form-control" id="idconfirmpassword" name="confirmmdp">
    </div>
    <div class="form-group">
        <label for="idrue">Rue</label>
        <input type="text" class="form-control" id="idrue" name="rue" value="<?= $user['rue']?>">
    </div>
    <div class="form-group">
        <label for="idnumero">Numéro</label>
        <input type="text" class="form-control" id="idnumero" name="numero" value="<?= $user['numero']?>">
    </div>
    <div class="form-group">
        <label for="idcp">Code Postal</label>
        <input type="text" class="form-control" id="idcp" name="cp" value="<?= $user['cp']?>">
    </div>
    <div class="form-group">
        <label for="idlocalite">Localité</label>
        <input type="text" class="form-control" id="idlocalite" name="localite" value="<?= $user['localite']?>">
    </div>
    <div class="form-group">
        <label for="idpays">Pays</label>
        <input type="text" class="form-control" id="idpays" name="pays" value="<?= $user['pays']?>">
    </div>
    <div class="form-group">
        <label for="idnom">Nom</label>
        <input type="text" class="form-control" id="idnom" name="nom" value="<?= $user['nom']?>">
    </div>
    <div class="form-group">
        <label for="idprenom">Prenom</label>
        <input type="text" class="form-control" id="idprenom" name="prenom" value="<?= $user['prenom']?>">
    </div>
    <button type="submit" class="btn btn-primary">Editer</button>
</form>
<?php
$title = "Editer";
$content = ob_get_clean();
include 'includes/template.php';
?>
