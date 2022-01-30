if(isset($_POST['inputRecherche'])) {
    $resultat = $_POST['inputRecherche'];
    rechercheArticle($resultat);
}