<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurContact {

    private $billet;
    private $session;

    public function __construct() {
        $this->billet = new Billet();
        $this->session = new Membre();
    }

    public function contact() {
        // Affiche le dernier billet du blog
        $lastBillet = $this->billet->getLastBillet();
        $session= $this->session->getMenuSession();
        $vue = new Vue("Accueil");
        $vue->generer(array('lastBillet' => $lastBillet, 'getMenuSession' => $session));
    }
}