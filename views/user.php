<?php
$title = "Mon compte";
if($user['id'] != $_SESSION['id']) {
    $title = "Utilisateur ".$user['login'];
}
$email = $user['email'];
$default = "https://blog.ramboll.com/fehmarnbelt/wp-content/themes/ramboll2/images/profile-img.jpg";
$size = 310;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

ob_start();?>
<img class="rounded-circle mx-auto d-block img-thumbnail" src="<?php echo $grav_url; ?>" alt="" />
<br>
Identifiant: <?= $user['id']?>
<br>
Login: <?= $user['login']?>
<br>
Email: <?= $user['email']?>
<br>
Rue : <?= $user['rue']?>
<br>
Numéro : <?= $user['numero']?>
<br>
Code postal : <?= $user['cp']?>
<br>
Localité : <?= $user['localite']?>
<br>
Pays : <?= $user['pays']?>
<br>
<a href="<?=ROOT_PATH?>user/<?= $user['login']?>/edit" class="btn btn-warning">Editer</a>
<a href="<?=ROOT_PATH?>user/<?= $user['login']?>/commandes" class="btn btn-warning">Mes commandes</a>
<?php
$content = ob_get_clean();
include 'includes/template.php';
?>
