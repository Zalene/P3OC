<?php
require 'Controleur/controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'blog') {
            blog();
        }
        elseif ($_GET['action'] == 'bio') {
            biographie();
        }
        elseif ($_GET['action'] == 'contact') {
            contact();
        }
        elseif ($_GET['action'] == 'connexion') {
            connexion();
        }
        elseif ($_GET['action'] == 'inscription') {
            inscription();
        }
        elseif ($_GET['action'] == 'article') {
            commentaires();
        }
        elseif ($_GET['action'] == 'updateBillet') {
            adminBillets();
        }
        elseif ($_GET['action'] == 'createBillet') {
            adminCreateBillet();
        }
        elseif ($_GET['action'] == 'adminComments') {
            adminComments();
        }
        elseif ($_GET['action'] == 'adminMembers') {
            adminMembers();
        }
        elseif ($_GET['action'] == 'changePassword') {
            changePassword();
        }
    }
    else {
        accueil();
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}