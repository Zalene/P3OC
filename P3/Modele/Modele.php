<?php

//CONNEXION A LA BDD
function getDbConnect() {
    $bdd = new PDO('mysql:host=localhost;dbname=db_p3_jean_f;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
function getChapters($page, $limite) {
    $bdd = getDbConnect();
    
    $debut = ($page - 1) * $limite;
    $query = 'SELECT SQL_CALC_FOUND_ROWS id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite';
    $query = $bdd->prepare($query);
    $query->bindValue('limite', $limite, PDO::PARAM_INT);
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    $query->execute();

    //$resultFoundRows = $bdd->query('SELECT found_rows()');

    //$nombredElementsTotal = $resultFoundRows->fetchColumn();
    
    // Calcule du nombre de pages
    //$nombreDePages = ceil($nombredElementsTotal / $limite);

    return $query;
}
function getPagination($page, $limite){
    //$bdd = getDbConnect();

    //$query = $bdd->query('SELECT SQL_CALC_FOUND_ROWS id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite');
    //$query = $bdd->prepare($query);
    //$query->bindValue('limite', $limite, PDO::PARAM_INT);
    //$query->bindValue('debut', $debut, PDO::PARAM_INT);
    //$query->execute();

    //$resultFoundRows = $bdd->query('SELECT found_rows()');

    //$nombredElementsTotal = $resultFoundRows->fetchColumn();
    
    // Calcule du nombre de pages
    //$nombreDePages = ceil($nombredElementsTotal / $limite);

    $pageNum = 5;
    return $pageNum;
}


//FUNCTION ARTICLES ET COMMENTAIRES
function getViewBillet($id_billet) {
    $bdd = getDbConnect();

    $req = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets WHERE id = :id_billet';
    $req = $bdd->prepare($req);
    $req->bindValue('id_billet', $id_billet, PDO::PARAM_INT);
    $req->execute();

    return $req;
}

function getDeleteBillet() {
    $bdd = getDbConnect();

    if(isset($_POST['deleteBillet'])){
        $id_el = $_POST['id'];

        $bdd->query("DELETE FROM commentaires WHERE id_billet= $id_el");

        $bdd->query("DELETE FROM billets WHERE id= $id_el");

        header('Location: index.php?action=blog');
    }
}

function getButtonBillet() {
    $bdd = getDbConnect();

    $req = $bdd->prepare('SELECT id_groupe FROM membres WHERE id_groupe = 1');
    $donneesGroupe = $req->fetch();
    return $req;
}

function getListComments($page, $limite) {
    $bdd = getDbConnect();

    // Récupération des commentaires
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

function getUpdateComment() {
    $bdd = getDbConnect();

    $id_el = $_POST['id'];

    $req = $bdd->query("SELECT id, id_billet, auteur, commentaire FROM commentaires WHERE id= $id_el");
    $donnees = $req->fetch();
    return $req;
}

function getDeleteComment($id_billet) {
    $bdd = getDbConnect();

    if(isset($_POST['deleteComment'])){
        $id_com = $_POST['id'];

        $bdd->query("DELETE FROM commentaires WHERE id= $id_com");

        header('Location: index.php?action=article&billet= '. $id_billet .' ');
    }
}

function getReportComment($id_billet) {
    $bdd = getDbConnect();

    if(isset($_POST['reportComment'])){
        $id_com = $_POST['id'];

        $sth = $bdd->prepare('UPDATE commentaires SET report = 1 WHERE id = :id');
        $sth->bindValue(':id', $id_com, PDO::PARAM_INT);
        $sth->execute();

        header('Location: index.php?action=article&billet= '. $id_billet .' ');
    }
}

function getPostComment($id_billet) {
    $bdd = getDbConnect();

    if(isset($_POST['postComment'])) {

        $req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, report, date_commentaire) VALUES(?, ?, ?, 0, NOW())');
        $req->execute(array($id_billet, $_POST['auteur'], $_POST['commentaire']));
        
        header('Location: index.php?action=article&billet= '. $id_billet .' ');
    }
}

function getUpdateCommentPost() {
    $bdd = getDbConnect();

    if(isset($_POST['updateButtonComment'])) {
        $id_el = $_POST['id'];
        $author = $_POST['auteur'];
        $comment = $_POST['commentaire'];
        $billet = $_POST['id_billet'];

        $sth = $bdd->prepare('UPDATE commentaires SET auteur = :author, commentaire = :comment WHERE id = :id'); 
        $sth->bindValue(':author', $author, PDO::PARAM_STR); 
        $sth->bindValue(':comment', $comment, PDO::PARAM_STR);
        $sth->bindValue(':id', $id_el, PDO::PARAM_INT); 
        $sth->execute();

        header('Location: index.php?action=article&billet= '. $billet .' ');
    }
}

//FUNCTION CONTACT


//FUNCTION ADMIN
function getUpdateBillet($id_el) {
    $bdd = getDbConnect();

    $req = $bdd->query("SELECT id, titre, contenu FROM billets WHERE id= $id_el");
    return $req;
}

function getPushUpdateBillet($id_el) {
    $bdd = getDbConnect();

    if(isset($_POST['button_billet'])) {
        $title = $_POST['titre'];
        $content = $_POST['contenu'];

        $sth = $bdd->prepare('UPDATE billets SET titre = :title, contenu = :content WHERE id = :id'); 
        $sth->bindValue(':title', $title, PDO::PARAM_STR); 
        $sth->bindValue(':content', $content, PDO::PARAM_STR);
        $sth->bindValue(':id', $id_el, PDO::PARAM_INT); 
        $sth->execute();

        header('Location: index.php?action=article&billet= '. $id_el .' ');
    }
}

function getAdminUnreportComment() {
    $bdd = getDbConnect();

    if(isset($_POST['unreportComment'])){
        $id_com = $_POST['id'];

        $bdd->query("UPDATE commentaires SET report = 0 WHERE id = $id_com");

        header('Location: index.php?action=adminComments');
    }
}

function getAdminDeleteComment() {
    $bdd = getDbConnect();

    if(isset($_POST['deleteComment'])){
        $id_com = $_POST['id'];

        $bdd->query("DELETE FROM commentaires WHERE id = $id_com");

        header('Location: index.php?action=adminComments');
    }
}

function getAdminReportedComments() {
    $bdd = getDbConnect();

    $req = $bdd->query('SELECT id, id_billet, auteur, commentaire, report, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE report = 1 ORDER BY date_commentaire');
    return $req;
}

function getAdminMembers() {
    $bdd = getDbConnect();

    $query = 'SELECT id, pseudo, email, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription_fr FROM membres WHERE id_groupe = 2 ORDER BY date_inscription';
    $query = $bdd->prepare($query);
    $query->execute();
    return $query;
}

function getAdminDeleteMembers() {
    $bdd = getDbConnect();

    if(isset($_POST['deleteMember'])) {
        $id_member = $_POST['id'];

        $bdd->query("DELETE FROM membres WHERE id= $id_member");

        header('Location: index.php?action=adminMembers');
    }
}

function getCreateBillet() {
    $bdd = getDbConnect();

    if(isset($_POST['button_billet'])) {
        $req = $bdd->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['titre'], $_POST['contenu']));

        header('Location: index.php?action=blog');

        return $req;
    }
}

//FUNCTION LOGIN
function getConnexion() {
    $bdd = getDbConnect();

    if(isset($_POST['connexion_member'])) {
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $password = trim($_POST['password']);
        
        if(!empty($pseudo) AND !empty($password))
        {
            $reqpseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
            $reqpseudo->execute(array($pseudo));
            $pseudoexiste = $reqpseudo->rowcount();
            while ($row = $reqpseudo->fetch()) { $passwordbdd=$row['pass']; }

            if($password == password_verify($password, $passwordbdd))
            {
                $_SESSION['pseudo'] = $pseudo;

                if(isset($_SESSION['pseudo']))
                {
                    header("location:index.php");
                }
            }
            else
            {
                $erreur = "Mauvais identifiant ou mot de passe !";
            }
        }
    }
}

function getInscription () {
    $bdd = getDbConnect();

    if(isset($_POST['inscription_button'])) {
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);

        $pseudolength = strlen($pseudo);
        $passwordlength = strlen($password);

        if(!empty($pseudo) AND !empty($email) AND !empty($password) AND !empty($password2))
        {
            if($pseudolength <= 25)
            {
                $reqpseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
                $reqpseudo->execute(array($pseudo));
                $pseudoexiste = $reqpseudo->rowcount();

                $reqemail = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
                $reqemail->execute(array($email));
                $emailexiste = $reqemail->rowcount();
                if($pseudoexiste == 0 AND $emailexiste == 0)
                {
                    if(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $email))
                    {
                        if($passwordlength >= 8)
                        {
                            if($password == $password2)
                            {
                                $req = $bdd->prepare('INSERT INTO membres(id_groupe, pseudo, email, pass, date_inscription) VALUES (2, :pseudo, :email, :pass, CURDATE())');
                                $req->execute(array(
                                    'pseudo' => $pseudo,
                                    'email' => $email,
                                    'pass' => password_hash($password, PASSWORD_DEFAULT)));
                            }
                            else
                            {
                                $erreur = "Les mots de passe ne sont pas identiques";
                            }
                        }
                        else
                        {
                            $erreur = "Votre mot de passe fait moins de 8 caractères";
                        }
                    }
                    else
                    {
                        $erreur = "Votre email n'est pas valide";
                    }
                }
                else
                {
                    $erreur = "Ce pseudo ou cette email est déjà utilisé";
                }
            }
            else
            {
                $erreur = "Votre pseudo fait plus de 25 caractères";
            }
        }
        else
        {
            $erreur = "Veuillez remplir tous les champs";
        }
    }
}

function getChangePassword() {
    $bdd = getDbConnect();

    if(isset($_SESSION['pseudo'])) {
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
}

function getDeconnexion() {
    session_start();
    session_destroy();

    header('Location: index.php');
}

//function getRepSession() {
    //$bdd = getDb();
    //$reponseSession = $bdd->query('SELECT * FROM membres WHERE pseudo=\'' .$_SESSION['pseudo']. '\'');
    //return $reponseSession;
//}