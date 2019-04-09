<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurCreateBillet {

    private $createBillet;
    private $session;

    public function __construct() {
        $this->createBillet = new Billet();
        $this->session = new Membre();
    }

    public function adminCreateBillet() {
        $newBillet = $this->createBillet->getCreateBillet();
        $session= $this->session->getMenuSession();
        $vue = new Vue("CreateBillet");
        $vue->generer(array('getCreateBillet' => $newBillet, 'getMenuSession' => $session));
    }
}