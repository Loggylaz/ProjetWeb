<?php
require 'models/articles.php';
require 'models/users.php';
if (empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3) {
    header("Location: " . ROOT_PATH);
    exit();
}
if (REQ_TYPE_ID) {
    $article = getArticleById(REQ_TYPE_ID);
    $article['nom'] = str_replace("_", " ", $article['nom']);
} else {
    header("Location: " . ROOT_PATH . "admin_article");
    exit();
}
if (!$article) {
    http_response_code(404);
    include 'views/404.php';
    exit();
}
$categories = getAllFromCategories();

$imagePath = "";
$uploadOk = 1;
if (!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['prix'])) {
    if (!empty($_FILES['image']['name'])) {
        if("public/images/".$_FILES["image"]["name"] != $article["image"]) {
            $target_dir = "public/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            //Vérifie le MIME pour voir si il ne s'agit pas d'une fausse image
            if (isset($_FILES["image"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $_SESSION['error'] = "l'image ne convient pas, choissisez en une autre";
                    $uploadOk = 0;
                }
            }
            //Vérifie si le fichier existe déjà dans le dossier
            if (file_exists($target_file)) {
                $imagePath = $target_file;
                $uploadOk = 0;
                $fileOk = 1;
            }
            //Vérifie la taille de l'image
            if ($_FILES["image"]["size"] > 5000000) {
                $_SESSION['error'] = "Le fichier est trop gros.";
                $uploadOk = 0;
            }
            //Vérifie le format de l'image
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $_SESSION['error'] = "Seuls les formats JPG, JPEG, PNG et GIF sont acceptés.";
                $uploadOk = 0;
            }
            //Vérifie si $uploadOk est à 0 = erreur
            if ($uploadOk == 0) {
                if($fileOk != 1){
                    $imagePath = $target_dir."no_image.png";
                }

                //Si tout est ok, on upload
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $imagePath = $target_file;
                } else {
                    $_SESSION['error'] = "Il y a eu une erreur lors de l'upload de l'image veuillez rééssayer avec une autre image";
                    $imagePath = $target_dir."no_image.png";
                }
            }
        }else{
            $_SESSION['error'] = "La même image à été utilisé il n'y aura pas de modification d'image";
            $imagePath = $article['image'];
        }
    }else if($article['image'] != "public/images/no_image.png"){
        $_SESSION['error'] = "La même image à été utilisé il n'y aura pas de modification d'image";
        $imagePath = $article['image'];
    }else{
        $_SESSION['error'] = "Pas d'image sélectionnée, l'image par défaut est utilisée";

        $imagePath = "public/images/no_image.png";
    }
    setArticle($article['id'], $_POST['nom'], $_POST['prix'], $_POST['stock'], $_POST['poid'], $_POST['marque'], $_POST['categorieID'], $imagePath, $_POST['description']);
    $_SESSION['message'] = 'L\'article ' . $article['nom'] . ' a bien été mis à jour';
    header("Location: " . ROOT_PATH . "admin_article");
    exit();
} else if (!empty($_POST['nom']) || !empty($_POST['prix'])) {
    $_SESSION['error'] = "Le nom et le prix sont des champs obligatoire !";
}


include 'views/article_edit.php';
