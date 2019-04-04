<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurConnexion {

    private $login;

    public function __construct() {
        $this->login = new Membre();
    }

    public function connexion() {
        $log = $this->login->getLogin();
        $vue = new Vue("Connexion");
        $vue->generer(array('getLogin' => $log));
    }
}