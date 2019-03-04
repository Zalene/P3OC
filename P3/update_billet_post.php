<?php
include 'includes/functionsSQL.php';

$id_el = $_POST['id'];
$title = $_POST['titre'];
$content =$_POST['contenu'];

$sth = $bdd->prepare('UPDATE billets SET titre = :title, contenu = :content WHERE id = :id'); 
$sth->bindValue(':title', $title, PDO::PARAM_STR); 
$sth->bindValue(':content', $content, PDO::PARAM_STR);
$sth->bindValue(':id', $id_el, PDO::PARAM_INT); 
$sth->execute();

// Puis rediriger vers blog.php comme ceci :
header('Location: commentaires.php?billet= '. $id_el .' ');

?>