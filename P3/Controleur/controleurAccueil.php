<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAccueil {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

    public function accueil() {
        // Affiche le dernier billet du blog
        $lastBillet = $this->billet->getLastBillet();
        $vue = new Vue("Accueil");
        $vue->generer(array('lastBillet' => $lastBillet));
    }
}