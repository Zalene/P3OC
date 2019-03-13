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
    
    // Calcule du nombre de pages
    $nombreDePages = ceil($nombredElementsTotal / $limite);
    
    return $query;
}

//FUNCTION ARTICLES ET COMMENTAIRES
function getViewBillet() {
    $bdd = getDbConnect();

    // Récupération du billet
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets WHERE id = ?');
    $req->execute(array($_GET['billet']));
    $donnees = $req->fetch();
    return $req;
}

function getButtonBillet() {
    $bdd = getDbConnect();

    $req = $bdd->prepare('SELECT id_groupe FROM membres WHERE id_groupe = 1');
    $donneesGroupe = $req->fetch();
    return $req;
}

function getListComments() {
    $bdd = getDbConnect();

    // Récupération des commentaires
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;

    $debut = ($page - 1) * $limite;
    $query = 'SELECT SQL_CALC_FOUND_ROWS id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :billet ORDER BY date_commentaire DESC LIMIT :debut, :limite';
    $query = $bdd->prepare($query);
    $query->bindValue('limite', $limite, PDO::PARAM_INT);
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    $query->bindValue('billet', $_GET['billet'], PDO::PARAM_INT);
    $query->execute();

    $resultFoundRows = $bdd->query('SELECT found_rows()');

    $nombredElementsTotal = $resultFoundRows->fetchColumn();
    return $query;
}


//FUNCTION CONTACT


//FUNCTION ADMIN
function getUpdateBillet() {
    $bdd = getDbConnect();
    $id_el = $_POST['id'];

    $req = $bdd->query("SELECT id, titre, contenu FROM billets WHERE id= $id_el");
    $donnees = $req->fetch();
    return $req;
}

function getAfterUpdateBillet() {
    $bdd = getDbConnect();

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

    return $sth;
}

function getReportedComments() {
    $bdd = getDbConnect();

    $req = $bdd->query('SELECT id, id_billet, auteur, commentaire, report, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE report = 1 ORDER BY date_commentaire');
    return $req;
}

function getAdminMembers() {
    $bdd = getDbConnect();

    $query = 'SELECT id, pseudo, email, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription_fr FROM membres WHERE id ORDER BY date_inscription';
    $query = $bdd->prepare($query);
    $query->execute();
    return $query;
}

function getChangePassword() {
    $bdd = getDbConnect();

    if(isset($_SESSION['pseudo']))
    {
        if(isset($_POST['modifification_mdp']))
        {
            $password = trim($_POST['password']);
            $password2 = trim($_POST['password2']);
            $oldPassword = trim($_POST['oldPassword']);

            $passwordlength = strlen($password);
            $pseudo = $_SESSION['pseudo'];

            if(!empty($oldPassword) AND !empty($password) AND !empty($password2))
            {
                $reqId = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
                $reqId->execute(array($pseudo));
                $membersExiste = $reqId->rowcount();
                while ($row = $reqId->fetch()) { $passwordbdd=$row['pass']; $pseudoId=$row['pseudo']; }

                $pseudoMdpChange = $pseudoId;


                if($oldPassword == password_verify($oldPassword, $passwordbdd))
                {
                    if($passwordlength >= 8)
                    {
                        if($password == $password2)
                        {
                            $sth = $bdd->prepare('UPDATE membres SET pass = :pass WHERE pseudo = :pseudo');
                            $sth->bindValue(':pass', password_hash($password, PDO::PARAM_STR));
                            $sth->bindValue(':pseudo', $pseudoMdpChange, PDO::PARAM_STR);
                            $sth->execute();

                            header('Location: index.php');
                        }
                        else
                        {
                            $erreur = "Les mots de passe ne sont pas identiques";
                        }
                    }
                    else
                    {
                        $erreur = "Votre nouveau mot de passe fait moins de 8 caractères";
                    }
                }
                else
                {
                    $erreur = "Votre ancien mot de passe est incorrect";
                }
            }
            else
            {
                $erreur = "Veuillez remplir tous les champs";
            }
        }
    }
    return $bdd;
}

//function getRepSession() {
    //$bdd = getDb();
    //$reponseSession = $bdd->query('SELECT * FROM membres WHERE pseudo=\'' .$_SESSION['pseudo']. '\'');
    //return $reponseSession;
//}