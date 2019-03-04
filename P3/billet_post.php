<?php
include 'includes/functionsSQL.php';

// Insertion du billet à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES(?, ?, NOW())');
$req->execute(array($_POST['titre'], $_POST['contenu']));

// Puis rediriger vers blog.php comme ceci :
header('Location: blog.php');
?>
