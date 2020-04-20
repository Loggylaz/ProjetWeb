<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/sticky-footer-navbar.css">
         <script src="<?=ROOT_PATH?>public/js/jquery-3.4.1.slim.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/popper.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/canvasjs.min.js"></script>
        <script src="<?=ROOT_PATH?>public/js/canvasjs.react.js"></script>
        <script src="<?=ROOT_PATH?>public/js/regex.js"></script>
        
        <title><?php echo $title; ?></title>
    </head>
    <body>
    <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>

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
                    <?php if(!empty($_SESSION['id']) && $_SESSION['role'] == 2):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_article">Administration Articles</a></li>
                    <?php endif?>
                    <?php if(!empty($_SESSION['id']) && $_SESSION['role'] <= 2):?>
                    <li class="nav-item active"><a class="nav-link" href="<?=ROOT_PATH?>admin_stats">Statistiques</a></li>
                    <?php endif?>
                </ul>
                <?php if(empty($_SESSION['id'])):?>
                    <a href="<?=ROOT_PATH?>login" class="btn btn-outline-success my-2 my-sm-0">Se connecter</a>
                    <a href="<?=ROOT_PATH?>signup" class="btn btn-outline-success my-2 my-sm-0">Créer un compte</a>
                <?php else:?>
                    <a href="<?=ROOT_PATH?>user" class="btn btn-outline-info my-2 my-sm-0">Mon compte</a>
                    <a href="<?=ROOT_PATH?>logout" class="btn btn-outline-success my-2 my-sm-0">Se déconnecter</a>
                    <a href="#" class="btn btn-outline-danger my-2 my-sm-0" class="dropbtn" id="panier">Votre panier <?= $_SESSION['articleQty']?></a>
                <?php endif?>
            </div>

        </nav>
        <main role="main" class="container">
        <div class="dropdown">
  <button id="myBtn" class="dropbtn">Dropdown</button>
  <div id="monPanier" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div>

        <script>
// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("myBtn").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function myFunction() {
  document.getElementById("monPanier").classList.toggle("show");
}
</script>

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
        <footer class="footer">
            <div class="container">
                <span class="text-muted">E-Shop</span>
            </div>
        </footer>
    </body>
</html>
