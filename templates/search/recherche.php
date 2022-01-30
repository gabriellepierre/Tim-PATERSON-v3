<?php


require __DIR__ . '/src/Repository/ArticleRepository.php';
require_once('App/src/Repository/ArticleRepository.php');
/*require __DIR__ . '/vendor/autoload.php';
use App\Repository\ArticleRepository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);
*/



//include '../../src/Repository/ArticleRepository.php';


if(isset($_POST['inputRecherche'])) {

    $resultat = $_POST['inputRecherche'];    
    rechercheArticle($resultat);

} 
else if(isset($_GET['inputRecherche'])) {

    $resultatG = $_GET['inputRecherche'];    
    rechercheArticle($resultatG);

} 

//include __DIR__.'search/index.html.twig';


?>