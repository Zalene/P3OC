<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurDeconnexion {

    private $deconnexion;

    public function __construct() {
        $this->deconnexion = new Membre();
    }

    public function deconnexion() {
        $disconect = $this->deconnexion->getDeconnexion();
        $session= $this->deconnexion->getMenuSession();
        $vue = new Vue("Deconnexion");
        $vue->generer(array('getDeconnexion' => $disconect, 'getMenuSession' => $session));
    }
}