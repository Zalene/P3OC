<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAdminUpdateBillet {

    private $updateBillet;
    private $session;

    public function __construct() {
        $this->updateBillet = new Billet();
        $this->session = new Membre();
    }

    public function adminUpdateBillets() {
        $id_el = $_POST['id'];

        $billetUpdate = $this->updateBillet->getUpdateBillet($id_el);
        $pushUpdateBillet = $this->updateBillet->getPushUpdateBillet($id_el);
        $session= $this->session->getMenuSession();
        $vue = new Vue("AdminUpdateBillets");
        $vue->generer(array('getUpdateBillet' => $billetUpdate, 'getPushUpdateBillet' => $pushUpdateBillet, 'getMenuSession' => $session));
    }
}