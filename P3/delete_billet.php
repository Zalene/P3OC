<?php
    include 'includes/functionsSQL.php';

    $id_el = $_POST['id'];

    $bdd->query("DELETE FROM commentaires WHERE id_billet= $id_el");

    $bdd->query("DELETE FROM billets WHERE id= $id_el");


    header('Location: blog.php');
    exit();


    // fermeture de la connection à la bdd
    if ($bdd) {
        $bdd = NULL;
    }
?>