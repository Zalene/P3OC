<?php
    include 'includes/functionsSQL.php';

    $id_member = $_POST['id'];

    $bdd->query("DELETE FROM membres WHERE id= $id_member");

    // fermeture de la connection à la bdd
    if ($bdd) {
        $bdd = NULL;
    }
?>
<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />