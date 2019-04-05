<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAdminUpdateBillet {

    private $updateBillet;

    public function __construct() {
        $this->updateBillet = new Billet();
    }

    public function adminUpdateBillets() {
        $id_el = $_POST['id'];

        $billetUpdate = $this->updateBillet->getUpdateBillet($id_el);
        $pushUpdateBillet = $this->updateBillet->getPushUpdateBillet($id_el);
        $vue = new Vue("AdminUpdateBillets");
        $vue->generer(array('getUpdateBillet' => $billetUpdate, 'getPushUpdateBillet' => $pushUpdateBillet));
    }
}