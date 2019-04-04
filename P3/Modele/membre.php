<?php

require_once 'Modele/modele.php';

class Membre extends Modele {

    public function getAdminMembers() {    
        $sql = 'SELECT id, pseudo, email, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS date_inscription_fr FROM membres WHERE id_groupe = 2 ORDER BY date_inscription';
        $adminMember = $this->executerRequete($sql, array());
        return $adminMember;
    }
    
    public function getAdminDeleteMembers() {
        $bdd = $this->getDbConnect();
    
        if(isset($_POST['deleteMember'])) {
            $id_member = $_POST['id'];
    
            $bdd->query("DELETE FROM membres WHERE id= $id_member");
    
            header('Location: index.php?action=adminMembers');
        }
    }

    //FUNCTION BIOGRAPHIE
    public function getBio() {

    }

    //FUNCTION LOGIN
    public function getLogin() {
        if(isset($_POST['connexion_member'])) {
            $pseudo = htmlspecialchars(trim($_POST['pseudo']));
            $password = trim($_POST['password']);
            
            if(!empty($pseudo) AND !empty($password))
            {
                $sql = 'SELECT * FROM membres WHERE pseudo = ?';
                $reqpseudo = $this->executerRequete($sql, array($pseudo));
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

    public function getInscription () {
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

    public function getChangePassword() {
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

    public function getDeconnexion() {
        session_start();
        session_destroy();

        header('Location: index.php');
    }
}