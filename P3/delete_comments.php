<?php
    include 'includes/functionsSQL.php';

    $id_el = $_POST['id'];

    $bdd->query("DELETE FROM commentaires WHERE id= $id_el");

    // fermeture de la connection à la bdd
    if ($bdd) {
        $bdd = NULL;
    }
?>
<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />