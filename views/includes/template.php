<?php
require_once 'models/users.php';
require_once 'models/articles.php';
$categories = getAllFromCategories();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/sticky-footer-navbar.css">
        <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= ROOT_PATH ?>">E-Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>article">Les articles</a></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach($categories as $categorie):?>
                        <a class="dropdown-item" href="<?= ROOT_PATH?>article"><?=$categorie['nom']?></a>
                    <?php endforeach?>
                    </div>
                </li>
                    <?php if (!empty($_SESSION['id']) && checkUserRole($_SESSION['id']) == 1):?>
                        <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_user">Administration utilisateurs</a></li>
                    <?php endif?>
                    <?php if (!empty($_SESSION['id']) && checkUserRole($_SESSION['id']) <= 2):?>
                        <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_article">Administration articles</a></li>
                    <?php endif?>
                </ul>
                <?php if(empty($_SESSION['id'])):?>
                    <a href="<?=ROOT_PATH?>login" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
                    <a href="<?=ROOT_PATH?>signup" class="btn btn-outline-success my-2 my-sm-0">Créer un compte</a>
                <?php else:?>
                    <a href="<?=ROOT_PATH?>user" class="btn btn-outline-info my-2 my-sm-0">Mon compte</a>
                    <a href="<?=ROOT_PATH?>logout" class="btn btn-outline-success my-2 my-sm-0">Se déconnecter</a>
                <?php endif?>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
        <main role="main" class="container">
<?php
if(!empty($_SESSION['message'])){
    include 'message.php';
    unset($_SESSION['message']);
}
if(!empty($_SESSION['error'])){
    include 'error.php';
    unset($_SESSION['error']);
}
?>
        <div class="jumbotron">
            <h1><?php echo $title; ?></h1>
            <?php echo $content; ?>
        </div>
        <br>
        </main>
        <footer class="footer">
            <div class="container">
                <span class="text-muted">E-Shop</span>
            </div>
        </footer>
    </body>
</html>
