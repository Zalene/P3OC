<?php

//CONNEXION A LA BDD
function getDbConnect() {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

//FUNCTION ACCUEIL
function getLastBillet() {
    $bdd = getDbConnect();
    // On récupère le dernier billet
    $lastBillet = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 1');
    return $lastBillet;
}

//FUNCTION BLOG
function getPaginationBlog() {
    $bdd = getDbConnect();

    // On récupère 5 billets par page
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;
    
    $debut = ($page - 1) * $limite;
    $query = 'SELECT SQL_CALC_FOUND_ROWS id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite';
    $query = $bdd->prepare($query);
    $query->bindValue('limite', $limite, PDO::PARAM_INT);
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    $query->execute();

    $resultFoundRows = $bdd->query('SELECT found_rows()');

    $nombredElementsTotal = $resultFoundRows->fetchColumn();
    return $query;
}

function getNbPagesBlog() {
    // Calcule du nombre de pages
    $nombreDePages = ceil($nombredElementsTotal / $limite);

    if ($page > 1):
        ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
    endif;

    // On effectue une boucle autant de fois que l'on a de pages
    for ($i = 1; $i <= $nombreDePages; $i++):
        ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
    endfor;

    if ($page < $nombreDePages):
        ?>— <a href="?page=<?php echo $page + 1; ?>">Page suivante</a><?php
    endif;
}

//FUNCTION ARTICLES ET COMMENTAIRES


//FUNCTION CONTACT



//function getRepSession() {
    //$bdd = getDb();
    //$reponseSession = $bdd->query('SELECT * FROM membres WHERE pseudo=\'' .$_SESSION['pseudo']. '\'');
    //return $reponseSession;
//}