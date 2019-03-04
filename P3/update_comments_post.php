<?php
include 'includes/functionsSQL.php';

$id_el = $_POST['id'];
$author = $_POST['auteur'];
$comment = $_POST['commentaire'];
$billet = $_POST['id_billet'];

$sth = $bdd->prepare('UPDATE commentaires SET auteur = :author, commentaire = :comment WHERE id = :id'); 
$sth->bindValue(':author', $author, PDO::PARAM_STR); 
$sth->bindValue(':comment', $comment, PDO::PARAM_STR);
$sth->bindValue(':id', $id_el, PDO::PARAM_INT); 
$sth->execute();

header('Location: commentaires.php?billet= '. $billet .' ');

?>