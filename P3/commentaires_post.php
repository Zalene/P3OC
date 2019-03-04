<?php
include 'includes/functionsSQL.php';

// Insertion du commentaire à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, report, date_commentaire) VALUES(?, ?, ?, 0, NOW())');
    $req->execute(array($_GET['post'], $_POST['auteur'], $_POST['commentaire']));
?>

<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />