<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurCreateBillet {

    private $createBillet;

    public function __construct() {
        $this->createBillet = new Billet();
    }

    public function adminCreateBillet() {
        $newBillet = $this->createBillet->getCreateBillet();
        $vue = new Vue("CreateBillet");
        $vue->generer(array('getCreateBillet' => $newBillet));
    }
}