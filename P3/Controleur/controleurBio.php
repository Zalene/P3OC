<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurBio {

    private $bio;

    public function __construct() {
        $this->bio = new Membre();
    }

    function biographie() {
        $viewBio = $this->bio->getBio();
        $vue = new Vue("Bio");
        $vue->generer(array('getBio' => $viewBio));
    }
}