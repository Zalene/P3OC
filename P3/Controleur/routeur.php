<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurBlog.php';
require_once 'Controleur/controleurBio.php';
require_once 'Controleur/controleurContact.php';
require_once 'Controleur/controleurConnexion.php';
require_once 'Controleur/controleurInscription.php';
require_once 'Controleur/controleurDeconnexion.php';
require_once 'Controleur/controleurBillet.php';
require_once 'Controleur/controleurAdminUpdateBillet.php';
require_once 'Controleur/controleurUpdateComment.php';
require_once 'Controleur/controleurCreateBillet.php';
require_once 'Controleur/controleurAdminComments.php';
require_once 'Controleur/controleurAdminMembers.php';
require_once 'Controleur/controleurChangePassword.php';
require_once 'Controleur/controleurMention.php';
require_once 'view/vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlBlog;
    private $ctrlBio;
    private $ctrlContact;
    private $ctrlConnexion;
    private $ctrlInscription;
    private $ctrlDeconnexion;
    private $ctrlBillet;
    private $ctrlAdminUpdateBillet;
    private $ctrlUpdateComment;
    private $ctrlCreateBillet;
    private $ctrlAdminComments;
    private $ctrlAdminMembers;
    private $ctrlChangePassword;
    private $ctrlMention;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBlog = new ControleurBlog();
        $this->ctrlBio = new ControleurBio();
        $this->ctrlContact = new ControleurContact();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlInscription = new ControleurInscription();
        $this->ctrlDeconnexion = new ControleurDeconnexion();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlAdminUpdateBillet = new ControleurAdminUpdateBillet();
        $this->ctrlUpdateComment = new ControleurUpdateComment();
        $this->ctrlCreateBillet = new ControleurCreateBillet();
        $this->ctrlAdminComments = new ControleurAdminComments();
        $this->ctrlAdminMembers = new ControleurAdminMembers();
        $this->ctrlChangePassword = new ControleurChangePassword();
        $this->ctrlMention = new ControleurMention();
      }

    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'blog') {
                    $this->ctrlBlog->blog();
                }
                elseif ($_GET['action'] == 'bio') {
                    $this->ctrlBio->biographie();
                }
                elseif ($_GET['action'] == 'contact') {
                    $this->ctrlContact->contact();
                }
                elseif ($_GET['action'] == 'connexion') {
                    $this->ctrlConnexion->connexion();
                }
                elseif ($_GET['action'] == 'inscription') {
                    $this->ctrlInscription->inscription();
                }
                elseif ($_GET['action'] == 'deconnexion') {
                    $this->ctrlDeconnexion->deconnexion();
                }
                elseif ($_GET['action'] == 'article') {
                    $this->ctrlBillet->billet();
                }
                elseif ($_GET['action'] == 'updateBillet') {
                    $this->ctrlAdminUpdateBillet->adminUpdateBillets();
                }
                elseif ($_GET['action'] == 'updateComment') {
                    $this->ctrlUpdateComment->updateComment();
                }
                elseif ($_GET['action'] == 'createBillet') {
                    $this->ctrlCreateBillet->adminCreateBillet();
                }
                elseif ($_GET['action'] == 'adminComments') {
                    $this->ctrlAdminComments->adminComments();
                }
                elseif ($_GET['action'] == 'adminMembers') {
                    $this->ctrlAdminMembers->adminMembers();
                }
                elseif ($_GET['action'] == 'changePassword') {
                    $this->ctrlChangePassword->changePassword();
                }
                elseif ($_GET['action'] == 'mentions') {
                    $this->ctrlMention->mentionsLegales();
                }
            }
            else {
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}