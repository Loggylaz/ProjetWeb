<?php
// La variable data est une liste contenant l'ensemble des données. 1 élément = 1 donnée.
// A terme, les données seront récupérées depuis une db et injectées dans des objets php
$data = [
    ['nom' => 'Pomme',
    'prix' => 1.2,
    'description' => 'Granny-Smith',
    'origine' => 'Australie',
    ],
    ['nom' => 'Poire',
    'prix' => 1.25,
    'description' => 'Williams',
    'origine' => 'USA',
    ],
    ['nom' => 'Peche',
    'prix' => 0.95,
    'description' => 'Classique',
    'origine' => 'Italie',
    ],
];

// La fonction getArticles retourne l'ensemble des données.
function getArticles() {
    global $data; // portée globale afin de disposer de la liste. Sans le mot clé global, la variable data sera locale et donc null
    return $data;
}

function getArticle($nom) {
    $articles = getArticles();
    foreach($articles as $article) {
        if (strtolower($nom) == strtolower($article['nom'])) {
            return $article;
        }
    }
}

<<<<<<< Updated upstream
=======
function getArticleById($id)
{
    $reponse = getDB()->prepare('SELECT * FROM ARTICLE WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $article;
}

function getArticleByName($name)
{
    $reponse = getDB()->prepare('SELECT * FROM ARTICLE WHERE nom = :nom');
    $reponse->execute([':nom' => $name]);
    $article = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $article;
}

function setArticle($id, $nom, $prix, $stock = "", $poid = "", $marque = "", $categorieID = "", $image = "", $description = "")
{
    $article = getArticleById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getDB()->prepare('UPDATE ARTICLE SET nom = :nom, prix = :prix, stock = :stock, poid = :poid, marque = :marque, categorieID = :categorieID, image = :image, description = :description WHERE id = :id');
    $reponse->execute([':id' => $id, ':nom' => $nom, ':prix' => $prix, ':stock' => $stock, ':poid' => $poid, ':marque' => $marque, ':categorieID' => $categorieID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}
>>>>>>> Stashed changes


<<<<<<< Updated upstream
?>
=======
function createArticle($nom, $prix, $stock = "", $poid = "", $marque = "", $categorieID = "", $image = "", $description = "")
{
    $reponse = getDB()->prepare('INSERT INTO ARTICLE SET nom = :nom, prix = :prix, stock = :stock, poid = :poid, marque = :marque, categorieID = :categorieID, image = :image, description = :description');
    $reponse->execute([':nom' => $nom, ':prix' => $prix, ':stock' => $stock, ':poid' => $poid, ':marque' => $marque, ':categorieID' => $categorieID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); // Termine le traitement de la requête
    
}

function deleteArticle($nom)
{
    $reponse = getDB()->prepare("DELETE FROM ARTICLE WHERE nom = :nom");
    $reponse->execute([':nom' => $nom]);
    $reponse->closeCursor();
}

function getAllFromCategories()
{
    $reponse = getDB()->query('SELECT * FROM CATEGORIE');
    $categories = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $categories;
}
function getCategorie($id)
{
    $categories = getAllFromCategories();
    foreach ($categories as $categorie) {
        if ($id == $categorie['nom']) {
            return $categorie;
        }
    }
}
function getArticleCategorie($id)
{
    $reponse = getDB()->query('SELECT categorieID FROM ARTiCLE WHERE id = :id');;
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $article;
}
>>>>>>> Stashed changes
