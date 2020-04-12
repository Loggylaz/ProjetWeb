<?php
ob_start()
?>
<form method="POST">
    <div class="form-group">
        <label for="idid">Identifiant</label>
        <input type="text" class="form-control" id="idid" name="id" value="<?= $user['id']?>" readonly>
    </div>
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login" value="<?= $user['login']?>">
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
        <label for="idcode_postal">Code Postal</label>
        <input type="text" class="form-control" id="idcode_postal" name="code_postal" value="<?= $user['cp']?>">
    </div>
    <div class="form-group">
        <label for="idlocalite">Localité</label>
        <input type="text" class="form-control" id="idlocalite" name="localite" value="<?= $user['localite']?>">
    </div>
    <div class="form-group">
        <label for="idpays">Pays</label>
        <input type="text" class="form-control" id="idpays" name="pays" value="<?= $user['pays']?>">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<?php
$title = "Editer";
$content = ob_get_clean();
include 'includes/template.php';
?>
