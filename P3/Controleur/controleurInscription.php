<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurInscription {

    private $inscription;

    public function __construct() {
        $this->inscription = new Membre();
    }

    public function inscription() {
        $register = $this->inscription->getInscription();
        $vue = new Vue("Inscription");
        $vue->generer(array('getInscription' => $register));
    }
}