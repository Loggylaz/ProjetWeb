<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/solar.min.css">
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/sticky-footer-navbar.css">
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/style.css">
         <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/canvasjs.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/canvasjs.react.js"></script>
        <script src="<?=ROOT_PATH?>public/js/regex2.js"></script>
        <script src="<?=ROOT_PATH?>public/js/regex.js"></script>
        <script src="<?=ROOT_PATH?>public/js/panier.js"></script>
        
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="<?=ROOT_PATH?>">E-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>article">Les articles</a></li>
                    <?php if(!empty($_SESSION['id']) && $_SESSION['role'] == 1):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_user">Administration Utilisateurs</a></li>
                    <?php endif?>
                    <?php if(!empty($_SESSION['id']) && $_SESSION['role'] <= 2):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_article">Administration Articles</a></li>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_stats">Statistiques</a></li>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_books">Commandes</a></li>
                    <?php endif?>
                </ul>
            </div>

                <?php if(empty($_SESSION['id'])):?>
                    <a href="<?=ROOT_PATH?>login" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
                    <a href="<?=ROOT_PATH?>signup" class="btn btn-outline-success my-2 my-sm-0">Créer un compte</a>
                <?php else:?>
                    <div class="dropdown">
   <button id="myBtn" class="btn btn-outline-success my-2 my-sm-0" class="dropbtn" id="panier">Votre panier <?= $_SESSION['articleQty']?></button>
  <div id="monPanier" class="dropdown-content">
  <iframe style="width:500px;height:500px" src="<?=ROOT_PATH?>panier_visu">
</iframe>
  <?php if (!empty($_SESSION['panier'])) : ?>
  <a href="<?= ROOT_PATH ?>panier" class="btn btn-warning">Vers Panier</a>
<?php endif ?>
  </div>
</div>
                    
                    <a href="<?=ROOT_PATH?>user" class="btn btn-outline-info my-2 my-sm-0">Mon compte</a>
                    <a href="<?=ROOT_PATH?>logout" class="btn btn-outline-success my-2 my-sm-0">Se déconnecter</a>
                <?php endif?>
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
        </main>
        <footer class="footer bg-dark text-white-50">
            <div class="container">
                <span class="text-muted">E-Shop</span>
            </div>
        </footer>
    </body>
</html>
