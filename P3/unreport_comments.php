<?php
include 'includes/functionsSQL.php';

$id_com = $_POST['id'];

$sth = $bdd->prepare('UPDATE commentaires SET report = 0 WHERE id = :id');
$sth->bindValue(':id', $id_com, PDO::PARAM_INT);
$sth->execute();

?>

<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />