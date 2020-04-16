<?php
require 'models/articles.php';
require 'models/users.php';
require 'models/book.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

$articles=array();
$articlesID=array();
$total= 0;
$quantite = 1;
$i=0;
// $_SESSION['panier'] = [1,5,9];

// array_push($_SESSION['panier'], 1);
// array_push($_SESSION['panier'], 4);
// array_push($_SESSION['panier'], 6);
function in_array_r($needle, $haystack, $strict = false) {
  foreach ($haystack as $item) {
      if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
          return true;
      }
  }

  return false;
}

foreach($_SESSION['panier'] as $articlePanier){
    
    $articleEnPanier = getArticleById($articlePanier);
    //  if(!in_array_r($articleEnPanier['id'], $articles)){
    //   $count = array_count_values($articles, $articleEnPanier['id']);
    //   $quantite += $count;
    array_push($articles, $articleEnPanier);
    // }else{
    //   $quantite++;
    // }

    // array_push($articles, $quantite);
    // foreach($articles as $article){
    //     // $quantite = array_search($article['id'], array_column($articles, 'id'));
        
    // }
}

foreach ($articles as $item) {
  // if(in_array($item['id'], $articlesID)){
  //   array_splice($articlesID, $item);
  // }
  array_push($articlesID, $item['id']);
}

$count = array_count_values($articlesID);
foreach ($articles as $article){
  if($count[$article['id']] > 1){
    $quantite = $count[$article['id']];
  }
  else
  {
    $quantite = 1;
  }
    
}


// for($i=0; $i <$articles->length; $i++);{
//       array_push($articlesID, $articles[$i]['id']);
// }


// foreach($articles as $article){
//     foreach($article['id'] == $article['id'] as $articleQuantite){
//         $quantite++;
//         array_push($articles, $quantite);
//     }
// }

foreach($articles as $article){
    $total += $article["prix"];
}



// $articles=array();
// $commandeEnCours = array();

// $books = getAllBooksByUserId($_SESSION['id']);

// foreach($books as $book){
//     $bookArticles = getAllBooksArticlesByCommandeID($book['id']);
//     foreach($bookArticles as $bookArticle){
//        array_push($articles, getArticleById($bookArticle['articleID']));
//        array_push($commandeEnCours, $commandeEnCours);
//     }
// }

include 'views/panier.php';

?>